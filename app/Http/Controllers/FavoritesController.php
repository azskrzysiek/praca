<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $postFavorites = Auth::user()->favoriting()->paginate(3, ['*'], 'postFavorites');

        return view('favorites.index', compact('postFavorites'));
    }

    public function store(Post $post)
    {

        return auth()->user()->favoriting()->toggle($post);
    }
}
