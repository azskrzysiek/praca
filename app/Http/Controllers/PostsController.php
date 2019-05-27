<?php

namespace App\Http\Controllers;

use App\Club;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Post $post)
    {
        //  $users = auth()->user()->favoriting()->pluck('post_user.user_id');

        //  $posts = Post::whereIn('user_id', $users)->latest()->get();
         

        $posts = Post::with('user')->latest()->paginate(6);

        return view('posts.index', compact('posts'));
    }


    public function create()
    {
         $clubs = Club::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');;
         return view('posts.create',compact('clubs'));
    }

    public function store()
    {
        
         $data = request()->validate([
            'club_id_home' => 'required',
            'club_id_away' => 'required',
            'video' => '',
            ],
            [
                'club_id_home.required' => 'Wybierz drużynę',
                'club_id_away.required' => 'Wybierz drużynę',
            ]);

        //  $imagePath = request('image')->store('uploads', 'public');

        //  $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
        //  $image->save();

                if (request('video'))
                {
                    //Get filename with the extension
                    $filenameWithExt = request()->file('video')->getClientOriginalName();
                    //Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just extension
                    $extension = request()->file('video')->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;
                    // Upload
                    $path = request('video')->storeAs('public/video', $fileNameToStore);
                } else {
                    $fileNameToStore = 'noimage.jpg';
                }

         auth()->user()->posts()->create([
             'title' => $data['title'],
             'caption' => $data['caption'],
             'video' => $fileNameToStore
         ]);

         return redirect('/profile/' . auth()->user()->id);

    }

    public function show(Post $post)
    {
        $favorit = (auth()->user()) ? auth()->user()->favoriting->contains($post->id) : false;

        return view('posts.show', compact('post', 'favorit'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $this->authorize('update', $post);

        $data = request()->validate([
            'title' => 'required',
            'caption' => 'required',
            'image' => ['image'],
         ]);

        if (request('image')) {
            $imagePath = request('image')->store('posts', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(800, 800);
            $image->save();

            $imageArray = ['image' => $imagePath];

        }

        $post->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/home");
    }

    public function destroy(Post $post)
    {

        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
