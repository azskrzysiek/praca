<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = auth()->user();

        if ($user->isAdmin() || $user->isTrainer())
        {
            $posts = Post::where('user_id', $user->id)->latest()->paginate(10);
    
            return view('dashboard.home', compact('posts'));
        } else {
            return back();
        }

    }

}
