@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="card-deck">
    @foreach ($posts as $post)
            <div class="col-4 py-4">
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
                        <img src="/storage/{{ $post->image }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <p class="card-text text-center">
                             
                            <span>{{ $post->title }}</span>
                        </p>
                    </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>

    

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>


@endsection


