@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @foreach ($postFavorites as $postFavorite)
    <div class="col-4 py-4">
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
                <img src="/storage/{{ $postFavorite->image }}" class="card-img-top" alt="...">
            </a>
            <div class="card-body">
                <p class="card-text text-center">
                     
                    <span>{{ $postFavorite->title }}</span>
                </p>
            </div>
            </div>
    </div>
    @endforeach
            </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $postFavorites->links() }}
        </div>
    </div>
</div>
@endsection
