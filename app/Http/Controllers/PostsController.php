<?php

namespace App\Http\Controllers;

use App\Club;
use App\User;
use App\Post;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
         

        $posts = Post::with('user')->latest()->where('approved',1)->paginate(6);

        return view('posts.index', compact('posts'));
    }

    public function search(Request $request)
    {
        // if ($request->ajax())

        if(empty($request->search))
        {
            return back();
        }

        $search = $request->search;
        // {
            $clubs = Club::where('name','LIKE','%'.$request->search."%")->get();

            if($clubs)
            {
                foreach($clubs as $club)
                {
                    $posts=Post:: where('approved', 1)
                    ->where(function($q) use ($club) {
                        $q->where('club_id_home', $club->id)
                            ->orWhere('club_id_away', $club->id);
                    })
                    ->paginate(6);
                }

                
            }
            if (!empty($posts))
            {
                return view('posts.index', compact('posts','search'));
            } else {
                return back();
            }
            
        // }
    }


    public function create()
    {
        $user = auth()->user();


        if ($user->isAdmin() || $user->isTrainer())
        {
            $clubs = Club::all();
            return view('posts.create',compact('clubs'));
        } else {
            return back();
        }
        
    }

    public function get_by_club($id)
    {
        $profile = Profile::where('club_id', $id)->get();

        return response()->json($profile);
    }

    public function store()
    {
        $user = auth()->user();
        
        if( $user->isAdmin() || $user->isTrainer())
        {

        
        
         $data = request()->validate([
            'club_id_home' => 'required',
            'id_home_player' => 'required',
            'club_id_away' => 'required',
            'id_away_player' => 'required',
            'scoreFull' => 'required',
            'scoreHalf' => 'required',
            'penalty_home' => 'required',
            'penalty_away' => 'required',
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
                'penalty_home.required' => 'Dodaj ilość kar dla gospodarzy',
                'penalty_away.required' => 'Dodaj ilość kar dla gości',
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
             'penalty_home' => $data['penalty_home'],
             'penalty_away' => $data['penalty_away'],
             'description' => $data['description'],
             'video' => $fileNameToStore,
             'approved' => 0,
         ]);

         return redirect('/profile/' . auth()->user()->id);
        }
        else {
            return back();
        }

    }

    public function acceptPost(Post $post)
    {
        if ($post->approved === 0)
        {
            $post->update([
                'approved' => 1,
            ]
            );
            return back();
        } else {
            $post->update([
                'approved' => 0,
            ]
            );
            return back();
        }
    }

    public function show(Post $post)
    {

        if ($post->approved === 0)
        {
            return abort(404);
        }

        $favorit = (auth()->user()) ? auth()->user()->favoriting->contains($post->id) : false;

        $clubHome = Club::findOrFail($post->club_id_home);
        $clubAway = Club::findOrFail($post->club_id_away);

        $player_home = Profile::with('user')->where('id',$post->id_home_player)->first();
        $player_away = Profile::with('user')->where('id',$post->id_away_player)->first();

        $count = Club::count();

        return view('posts.show', compact('post', 'favorit', 'clubHome','clubAway','count','player_home','player_away'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $clubs = Club::all();

        return view('posts.edit', compact('post','clubs'));
    }

    public function update(Post $post)
    {
        $this->authorize('update', $post);

        $data = request()->validate([
            'club_id_home' => 'required',
            'id_home_player' => 'required',
            'club_id_away' => 'required',
            'id_away_player' => 'required',
            'scoreFull' => 'required',
            'scoreHalf' => 'required',
            'penalty_home' => 'required',
            'penalty_away' => 'required',
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
                'penalty_home.required' => 'Dodaj ilość kar dla gospodarzy',
                'penalty_away.required' => 'Dodaj ilość kar dla gości',
                'description.required' => 'Dodaj opis meczu',
            ]);


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
                
                $videoArray = ['video' => $fileNameToStore];
            } 


        

        $post->update(array_merge(
            $data,
            $videoArray ?? []
        ));

        $user = auth()->user();

        if ($user->isAdmin())
        {
            return redirect('/admin');
        }

        return redirect("/home");
    }

    public function destroy(Post $post)
    {

        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
