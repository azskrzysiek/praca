@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @foreach ($postFavorites as $postFavorite)
            <div class="col-4">
                <h1 class="text-center">{{ $postFavorite->title }}</h1>
                <a href="/p/{{ $postFavorite->id }}">
                    <img class="w-100" src="/storage/{{ $postFavorite->image }}" class="w-100" alt="">
                </a>
                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $postFavorite->user->id }}">
                                <span class="text-dark">{{ $postFavorite->user->username }}</span>
                            </a>
                        </span> {{ $postFavorite->caption }}
                    </p>
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
