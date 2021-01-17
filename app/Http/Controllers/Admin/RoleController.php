<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    // Roles Listing Page
    public function index()
    {
        $roles = Role::paginate(10);

        $params = [
            'title' => 'Roles Listing',
            'roles' => $roles,
        ];

        return view('admin.roles.roles_list')->with($params);
    }

    // Roles Creation Page
    public function create()
    {
        //
        $permissions = Permission::all();

        $params = [
            'title' => 'Create Roles',
            'permissions' => $permissions,
        ];

        return view('admin.roles.roles_create')->with($params);
    }

    // Roles Store to DB
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:roles',
            'display_name' => 'required',
            'description' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.roles.index')->with('success', "The role <strong>$role->name</strong> has successfully been created.");
    }

    // Roles Delete Confirmation Page
    public function show(Role $role)
    {
        //
        try {
            $params = [
                'title' => 'Delete Role',
                'role' => $role,
            ];

            return view('admin.roles.roles_delete')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Roles Editing Page
    public function edit(Role $role)
    {
        try {

            $permissions = Permission::all();
            $role_permissions = $role->permissions()->get()->pluck('id');

            $params = [
                'title' => 'Edit Role',
                'role' => $role,
                'permissions' => $permissions,
                'role_permissions' => $role_permissions,
            ];
            return view('admin.roles.roles_edit')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Roles Update to DB
    public function update(Request $request, Role $role)
    {
        try {
            $this->validate($request, [
                'display_name' => 'required',
                'description' => 'required',
            ]);

            // $role->name = $request->input('name');
            $role->display_name = $request->input('display_name');
            $role->description = $request->input('description');

            $role->save();

            DB::table("permission_role")->where("permission_role.role_id", $role->id)->delete();
            // Attach permission to role
            foreach ($request->input('permission_id') as $key => $value) {
                $role->attachPermission($value);
            }

            return redirect()->route('admin.roles.index')->with('success', "The role <strong>$role->name</strong> has successfully been updated.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Delete Roles from DB
    public function destroy(Role $role)
    {
        try {
            // Force Delete
            $role->users()->sync([]); // Delete relationship data
            $role->permissions()->sync([]); // Delete relationship data

            $role->forceDelete(); // Now force delete will work regardless of whether the pivot table has cascading delete

            return redirect()->route('admin.roles.index');
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }
}
