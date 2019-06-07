@extends('layouts.app')

@section('style')
<style>
.top {
    min-height: 100vh;
}
.top-row {
    margin-top: 8vh;
    margin-bottom: 5vh;
}
.row-bottom {
    margin-bottom: 5vh;
}
</style>

@endsection

@section('content')
<div class="container top">
    <div class="row text-center top-row">
        <div class="col-12">
            <div class="card d-flex flex-row align-items-center">
                <div class="col-2">
                    <i class="fas fa-clock pr-2"></i>
                    <strong>{{ $post->CreatedDate }}</strong>
                </div>
                <div class="col-8">
                    <div class="pr-3 d-flex flex-column align-items-center">
                        <img style="max-width: 40px;" src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" alt="">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </div>
                </div>
                <div class="col-2 mb-3">
                    <favorite-button title="Dodaj post do ulubionych" post-id="{{ $post->id }}" favorit="{{ $favorit }}"></favorite-button>
                </div>
            </div>
        </div>
    </div>
   <div class="row">
       <div class="col-12 text-center">
           <div class="jumbotron">
               <div class="row">
                    <div class="col-lg-4 h2 
                        {{ (($post->scoreHomeFull() > $post->scoreAwayFull()) ? 'winner-home' : (($post->scoreHomeFull() < $post->scoreAwayFull()) ? 'loser-home' : '')) }}">
                        {{ (($post->scoreHomeFull() > $post->scoreAwayFull()) ? 'Zwycięzca' : (($post->scoreHomeFull() < $post->scoreAwayFull()) ? 'Przegrany' : '' )) }}
                        <div>
                            <img class="my-2" src="/storage/logos/{{ $clubHome->logo }}" style="height:50px;" class="img-fluid"  alt="">
                                <h1>{{ $clubHome->name }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-4 h2 d">
                    <h1 class="d-sm-none">{{ (($post->scoreHomeFull() === $post->scoreAwayFull()) ? 'Remis' : 'Wynik') }}</h1>
                        <div class="p-3">
                            <div>{{ $post->scoreHomeFull() }} : {{ $post->scoreAwayFull() }} </div>
                            <div>({{$post->scoreHomeHalf()}}) ({{$post->scoreAwayHalf()}})</div>
                        </div>
                    </div>
                    <div class="col-lg-4 h2 
                        {{ (($post->scoreHomeFull() < $post->scoreAwayFull()) ? 'winner-home' : (($post->scoreHomeFull() > $post->scoreAwayFull()) ? 'loser-home' : '')) }}">
                        {{ (($post->scoreHomeFull() < $post->scoreAwayFull()) ? 'Zwycięzca' : (($post->scoreHomeFull() > $post->scoreAwayFull()) ? 'Przegrany' : '' )) }}
                        <div>
                            <img class="my-2" src="/storage/logos/{{ $clubAway->logo }}" style="height: 50px;" class="img-fluid" alt="">
                            <h1>{{ $clubAway->name }}</h1>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        @if ($post->video !== 'noimage.jpg')
                             <video class="img-fluid"  src="/storage/video/{{ $post->video }}" controls>
                         @else
                             <img class="img-fluid" src="/storage/video/{{ $post->video }}">
                         @endif
                    </div>
                </div>
           </div>
       </div>
   </div>
    <div class="row row-bottom">
       <div class="col-12">
        <show :post="{{ $post }}" :player_home="{{ $player_home }}" :player_away="{{ $player_away }}"></show>
       </div>
   </div>
</div>
@endsection

