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
}
