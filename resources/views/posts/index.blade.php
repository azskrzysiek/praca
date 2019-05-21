@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @foreach ($posts as $post)
            <div class="col-4">
                <h1 class="text-center">{{ $post->title }}</h1>
                <a href="/p/{{ $post->id }}">
                    <img class="w-100" src="/storage/{{ $post->image }}" class="w-100" alt="">
                </a>
                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </span> {{ $post->caption }}
                    </p>
                </div>
                @endforeach
            </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
