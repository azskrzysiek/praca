@extends('layouts.app')

@section('style')
<style>
    .jumbotron {
        margin-top: 10vh;
    }
</style>
@endsection

@section('content')
<div class="container d-flex flex-column justify-content-center">
    <div class="jumbotron">

        <div class="row">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card"><h4 class="pt-1">Najlepszy zawodnik w meczu</h4></div>
                </div>
            </div>
        </div>
        <div class="row">
    @if ($posts->count() > 0)
    @foreach ($posts as $post)
    <div class=" col-md-6 col-xl-4 py-4">
        <div class="card" style="min-height: 280px;">
            <div class="card-header d-flex align-items-baseline justify-content-between">
                <div>
                    <i class="fas fa-clock pr-2"></i>
                    <span>{{ $post->created_date}}</span>
                </div>
                <span class="font-weight-bold">
                    <a href="/profile/{{ $post->user->id }}">
                        <span class="text-dark">{{ $post->user->username }}</span>
                    </a>
                </span>
            </div>
            <a href="/p/{{ $post->id }}">
                @if ( $post->video !== 'noimage.jpg')
                    <video src="/storage/video/{{ $post->video }}" class="card-img-top" style="padding-bottom:0; margin-bottom: 0;" alt="">
                @else
                    <img src="/storage/video/{{ $post->video }}" class="card-img-top" style="padding-bottom: 6px;" alt="">
                @endif
            </a>
            <div class="card-body">
                <p class="card-text d-flex text-center">
                     
                    <span class="flex-grow-1">{{ $post->clubHome() }}</span>
                    <span class="flex-grow-1">vs</span>
                    <span class="flex-grow-1">{{ $post->clubAway() }}</span>
                </p>
            </div>
            </div>
    </div>
    @endforeach
    @endif
            </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
