@extends('layouts.app')

@section('content')


<div class="container d-flex flex-column justify-content-center" style="height:80vh;">
    <div class="row" style="padding-top: 15rem;">
            <form action="/search" method="get">
                <input type="search" name="search">
                <button type="submit">Search</button>
            </form>
        <div class="card-deck">
    @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 col-12 py-4">
                <div class="card" style="height: 300px; min-width: 350px;">
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
                    <div class="card-body py-2">
                        <p class="card-text text-center d-flex justify-content-center">
                            <span class="pr-2"><strong>{{ $post->clubHome() }}</strong></span>
                            vs
                            <span class="pl-2"><strong>{{ $post->clubAway() }}</strong></span>
                        </p>
                    </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
{{-- <div class="" style="position:absolute; left: 47%; bottom: 0;">
    {{ $posts->links() }}
</div> --}}

<div class="row">
    <div class="col-12 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
    
</div>


@endsection


