<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Movie;
use App\Page;
use App\Permission;
use App\Role;
use App\User;
use Laravelista\Comments\Comment;
use Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = (object) ['text_color' => 'text-primary', 'icon' => 'fa-user', 'name' => 'users', 'count' => User::count()];
        $movies = (object) ['text_color' => 'text-danger', 'icon' => 'fa-film', 'name' => 'movies', 'count' => Movie::count()];
        $roles = (object) ['text_color' => 'text-warning', 'icon' => 'fa-chess', 'name' => 'roles', 'count' => Role::count()];
        $permissions = (object) ['text_color' => 'text-success', 'icon' => 'fa-window-restore', 'name' => 'permissions', 'count' => Permission::count()];
        $comments = Comment::all()->count();

        $premium_users = User::whereRoleIs(['premium_user'])->count();
        $general = [
            'users' => $users,
            'movies' => $movies,
            'permissions' => $permissions,
            'roles' => $roles,
        ];

        $latest_movies = Movie::latest()->get()->take(10);
        $latest_users = User::latest()->get()->take(10);
        $latest_comments = Comment::latest()->get()->take(10);

        $latest = (object) [
            'movies' => $latest_movies,
            'users' => $latest_users,
            'comments' => $latest_comments,
        ];
        return view('admin.index')
            ->with('general', $general)
            ->with('comments', $comments)
            ->with('premium_users', $premium_users)
            ->with('latest', $latest);
    }

    public function edit()
    {
        return view('admin.edit');
    }
    public function pages()
    {
        $_pages = Page::all();
        return view('admin.pages.index', ['pages' => $_pages]);
    }
    public function page(Page $page)
    {
        $type = request()->input('type');
        $page->update([
            'title' => request()->input('title'),
            'body' => request()->input($type)
        ]);
        return redirect(route('admin.pages.index'));
    }
}
