<?php

namespace App\Http\Controllers;

use App\Post;
use App\Role;
use App\User;
use App\Profile;
use App\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        
        
        return view('admin.index');
    }

    public function posts()
    {
        $posts = Post::latest()->paginate(10);
        
        return view('admin.posts', compact('posts'));
    }
    public function clubs()
    {
        $clubs = Club::latest()->paginate(12);
        
        return view('admin.clubs', compact('clubs'));
    }
    public function profiles()
    {
        $profiles = Profile::latest()->paginate(10);
        
        return view('admin.profiles', compact('profiles'));
    }
    public function users()
    {
        $users = User::latest()->paginate(10);
        
        return view('admin.users', compact('users'));
    }
    public function usersroleuser(User $user)
    {
        if ($user->isUser()) 
        {
            $user->roles()->detach(Role::where('name','User')->first());
            return back();
        } else {
            $user->roles()->attach(Role::where('name','User')->first());
            return back();
        }
    }
    public function usersroletrainer(User $user)
    {
        if ($user->isTrainer()) 
        {
            $user->roles()->detach(Role::where('name','Trainer')->first());
            return back();
        } else {
            $user->roles()->attach(Role::where('name','Trainer')->first());
            return back();
        }
    }
    public function usersroleadmin(User $user)
    {
        if ($user->isAdmin()) 
        {
            $user->roles()->detach(Role::where('name','Admin')->first());
            return back();
        } else {
            $user->roles()->attach(Role::where('name','Admin')->first());
            return back();
        }
    }
}
