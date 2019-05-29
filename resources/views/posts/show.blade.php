@extends('layouts.app')

@section('content')
<div class="container" style="margin-bottom: 20px">
    <div class="row text-center">
        <div class="col-12" style="margin: 5vh 0;">
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
                <div class="col-2">
                    <favorite-button title="Dodaj post do ulubionych" post-id="{{ $post->id }}" favorit="{{ $favorit }}"></favorite-button>
                    <p>Ulubiony</p>
                </div>
            </div>
        </div>
    </div>
   <div class="row">
       <div class="col-12 text-center">
           <div class="jumbotron">
               <div class="pt-0">
                   <h1>Wynik</h1>
               </div>
               <div class="d-flex justify-content-between pb-5">
                   <div 
                   class="flex-grow-1
                   {{ ($post->scoreHomeFull() > $post->scoreAwayFull()) ? 'winner' : 'loser' }}" 
                   style="padding: 10px 0;">
                       <img src="/storage/logos/{{ $clubHome->logo }}" style="height:50px;" class="img-fluid"  alt="">
                       <h1>{{ $clubHome->name }}</h1>
                   </div>
                   <div class="d-flex align-items-end"
                   style="padding: 10px 2rem;">
                    <h1>({{$post->scoreHomeHalf()}}) {{ $post->scoreHomeFull() }} </h1>
                    <h1>:</h1>
                    <h1>{{ $post->scoreAwayFull() }} ({{$post->scoreAwayHalf()}})</h1>
                   </div>
                   <div class="flex-grow-1
                   {{ ($post->scoreHomeFull() < $post->scoreAwayFull()) ? 'winner' : 'loser' }}"
                   style="padding: 10px 0;">
                        <img src="/storage/logos/{{ $clubAway->logo }}" style="height: 50px;" class="img-fluid" alt="">
                        <h1>{{ $clubAway->name }}</h1>
                    </div>
               </div>
               @if ($post->video !== 'noimage.jpg')
                    <video class="" style="width: auto; height: auto; max-width: 1000px; margin: 0 auto;" src="/storage/video/{{ $post->video }}" controls>
                @else
                    <img class="" style="width: auto; height: auto; max-width: 1000px; margin: 0 auto;" src="/storage/video/{{ $post->video }}">
                @endif
           </div>
       </div>
   </div>
    <div class="row">
       <div class="col-12">
           <show :post="{{ $post }}"></show>
       </div>
   </div>
</div>
@endsection

