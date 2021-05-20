<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserGeoLogin;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    // Index Page for Users
    public function index()
    {
        $users = User::all();
        $params = [
            'title' => 'Users Listing',
            'users' => $users,
        ];
        return view('admin.users.users_list')->with($params);
    }

    // Create User Page
    public function create()
    {
        $roles = Role::all();

        $params = [
            'title' => 'Create User',
            'roles' => $roles,
        ];

        return view('admin.users.users_create')->with($params);
    }

    // Store New User
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'profile_image' => 'avatar.png',
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $role = Role::find($request->role_id);

        $user->attachRole($role);

        return redirect()->route('admin.users.index');
    }


    public function updateprofile()
    {
        $user = auth()->user();
        return view('admin.users.profile')->with(['user' => $user]);
    }



    public function update_role(Request $request, User $user)
    {
        $user->username = $request->input('username');
        $user->email = $request->input('email');

        $user->banned_until =  empty(!$request->banned_until) ? $request->banned_until : null;

        $user->save();

        // Update role of the user
        if (isset($user->roles))
        {
            $roles = $user->roles;

            foreach ($roles as $value)
            {
                $user->detachRole($value);
            }
        }
        $role = Role::find($request->role_id);

        $user->attachRole($role);

        return redirect()->route('admin.users.index');
    }

    public function update(Request $request, User $user)
    {
        if ($user == auth()->user())
        {
            if ($request->hasFile('profile_image'))
            {
                $file = $request->file('profile_image');
                $ext  = $file->extension();
                $is_valid_image = Str::contains($ext, ['png', 'jpg', 'jpeg']);
                if ($is_valid_image)
                {
                    $file->store('users/' . $user->id . '/images', 'public');
                    $image_name =  $file->hashName();
                    if (isset($user->profile_image) && $user->profile_image != 'avatar.png')
                    {
                        $image_path = '/public/users/' . $user->id . '/images/' . $user->profile_image;
                        Storage::delete($image_path);
                    }
                }
            }

            $user->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'profile_image' => isset($image_name) ? $image_name :  $user->profile_image,
                'bio' => $request->bio,
                'email' => $request->email
            ]);

            if ($user->hasRole('super_admin'))
            {
                return redirect()->route('admin.edit');
            }
            return redirect()->route('admin.user.updateprofile');
        }
        abort(403);
    }

    public function edit(User $user)
    {
        try
        {
            $roles = Role::with('permissions')->get();
            $permissions = Permission::all();

            $params = [
                'title' => 'Edit User',
                'user' => $user,
                'roles' => $roles,
                'permissions' => $permissions,
            ];

            return view('admin.users.users_edit')->with($params);
        }
        catch (ModelNotFoundException $ex)
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Roles Delete Confirmation Page
    public function show(User $user)
    {
        //
        try
        {
            $params = [
                'title' => 'Delete User',
                'user' => $user,
            ];

            return view('admin.users.users_delete')->with($params);
        }
        catch (ModelNotFoundException $ex)
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Remove User from DB with detaching Role
    public function destroy(User $user)
    {
        try
        {
            // Detach from Role
            $roles = $user->roles;

            foreach ($roles as $value)
            {
                $user->detachRole($value);
            }

            $user->delete();

            return redirect()->route('admin.users.index');
        }
        catch (ModelNotFoundException $ex)
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.' . '404');
            }
        }
    }

    public function users_logs()
    {
        $user_logins_history =  UserGeoLogin::all();
        return view('admin.users.users_logs', compact('user_logins_history'));
    }

    public function destroy_users_logs(UserGeoLogin $logs)
    {
        $logs->delete();
        return redirect(route('admin.users.userslogs'));
    }
    public function change_password(Request $request, User $user)
    {
        if (!(Hash::check($request->get('current-password'), $user->password)))
        {
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0)
        {
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        $request->validate([
            'current-password' => 'required',
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        //Change Password
        $user->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->back()->with("success", "Password changed successfully !");
    }
}
