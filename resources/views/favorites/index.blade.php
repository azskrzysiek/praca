@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center" style="height: 100vh;">
    <div class="jumbotron">

    
    <div class="row">
        <div class="col-12">
            <div class="card text-center">
                <div class="card"><h4 class="pt-1">Moje ulubione filmy</h4></div>
            </div>
        </div>
    </div>
    <div class="row">
    @foreach ($postFavorites as $postFavorite)
    <div class=" col-12 col-md-4 py-4">
        <div class="card" style="min-height: 280px;">
            <div class="card-header d-flex align-items-baseline justify-content-between">
                <div>
                    <i class="fas fa-clock pr-2"></i>
                    <span>{{ $postFavorite->created_date}}</span>
                </div>
                <span class="font-weight-bold">
                    <a href="/profile/{{ $postFavorite->user->id }}">
                        <span class="text-dark">{{ $postFavorite->user->username }}</span>
                    </a>
                </span>
            </div>
            <a href="/p/{{ $postFavorite->id }}">
                @if ( $postFavorite->video !== 'noimage.jpg')
                    <video src="/storage/video/{{ $postFavorite->video }}" class="card-img-top" style="padding-bottom:0; margin-bottom: 0;" alt="">
                @else
                    <img src="/storage/video/{{ $postFavorite->video }}" class="card-img-top" style="padding-bottom: 6px;" alt="">
                @endif
            </a>
            <div class="card-body">
                <p class="card-text text-center d-flex">
                     
                    <span class="flex-grow-1">{{ $postFavorite->clubHome() }}</span>
                    <span class="flex-grow-1">vs</span>
                    <span class="flex-grow-1">{{ $postFavorite->clubAway() }}</span>
                </p>
            </div>
            </div>
    </div>
    @endforeach
            </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $postFavorites->links() }}
        </div>
    </div>
</div>
@endsection
