<?php

namespace App\Http\Controllers;

use App\Club;
use App\Post;
use App\Profile;
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
         $clubs = Club::all();
         return view('posts.create',compact('clubs'));
    }

    public function get_by_club($id)
    {
        $profile = Profile::where('club_id', $id)->get();

        return response()->json($profile);
    }

    public function store()
    {
        
         $data = request()->validate([
            'club_id_home' => 'required',
            'id_home_player' => 'required',
            'club_id_away' => 'required',
            'id_away_player' => 'required',
            'scoreFull' => 'required',
            'scoreHalf' => 'required',
            'description' => 'required',
            'video' => '',
            ],
            [
                'club_id_home.required' => 'Wybierz drużynę z listy',
                'id_home_player.required' => 'Wybierz gracza z listy',
                'club_id_away.required' => 'Wybierz drużynę z listy',
                'id_away_player.required' => 'Wybierz gracza z listy',
                'scoreFull.required' => 'Dodaj wynik po zakończeniu meczu',
                'scoreHalf.required' => 'Dodaj wynik po połowie meczu',
                'description.required' => 'Dodaj opis meczu',
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
             'club_id_home' => $data['club_id_home'],
             'id_home_player' => $data['id_home_player'],
             'club_id_away' => $data['club_id_away'],
             'id_away_player' => $data['id_away_player'],
             'scoreFull' => $data['scoreFull'],
             'scoreHalf' => $data['scoreHalf'],
             'description' => $data['description'],
             'video' => $fileNameToStore
         ]);

         return redirect('/profile/' . auth()->user()->id);

    }

    public function show(Post $post)
    {
        $favorit = (auth()->user()) ? auth()->user()->favoriting->contains($post->id) : false;

        $clubHome = Club::findOrFail($post->club_id_home);
        $clubAway = Club::findOrFail($post->club_id_away);

        $count = Club::count();

        return view('posts.show', compact('post', 'favorit', 'clubHome','clubAway','count'));
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
