<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    public function index(Post $post)
    {
        //  $users = auth()->user()->favoriting()->pluck('post_user.user_id');

        //  $posts = Post::whereIn('user_id', $users)->latest()->get();
         

        $posts = Post::latest()->paginate(3);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
         return view('posts.create');
    }

    public function store()
    {
         $data = request()->validate([
            'title' => 'required',
            'caption' => 'required',
            'image' => ['required','image'],
         ]);

         $imagePath = request('image')->store('uploads', 'public');

         $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
         $image->save();

         auth()->user()->posts()->create([
             'title' => $data['title'],
             'caption' => $data['caption'],
             'image' => $imagePath
         ]);

         return redirect('/profile/' . auth()->user()->id);

    }

    public function show(Post $post)
    {
        $favorit = (auth()->user()) ? auth()->user()->favoriting->contains($post->id) : false;

        return view('posts.show', compact('post', 'favorit'));
    }
}
