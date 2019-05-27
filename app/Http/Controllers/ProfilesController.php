<?php

namespace App\Http\Controllers;

use App\Club;
use App\Post;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user, Post $post)
    {

         $users = $user->posts()->pluck('posts.user_id');

         $posts = Post::whereIn('user_id', $users)->latest()->paginate(3, ['*'], 'posts');

        //  $postFavorites = Auth::user()->favoriting()->paginate(3, ['*'], 'postFavorites');

        return view('profiles.index', compact('user','posts'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        $clubs = Club::all();

        return view('profiles.edit', compact('user','clubs'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'name' => '',
            'lastname' => '',
            'description' => '',
            'position' => '',
            'age' => '',
            'height' => '',
            'experience' => '',
            'club_id' => '',
            'urlFacebook' => 'domain:facebook.com',
            'urlTwitter' => 'domain:twitter.com',
            'urlInstagram' => 'domain:www.instagram',
            'image' => '',
        ],
        [
            'urlFacebook.domain' => 'Podaj pasujący URL: <br> https://www.facebook.com/twojanazwakonta',
            'urlTwitter.domain' => 'Podaj pasujący URL: <br> https://twitter.com/twojanazwakonta',
            'urlInstagram.domain' => 'Podaj pasujący URL: <br> https://www.instagram.com/twojanazwakonta',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(800, 800);
            $image->save();

            $imageArray = ['image' => $imagePath];

        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
