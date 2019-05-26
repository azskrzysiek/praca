@extends('layouts.app')

@section('content')
<div class="container">
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
               <div>
                   <h1 class="pb-5">{{ $post->title }}</h1>
               </div>
               @if ($post->video !== 'noimage.jpg')
                    <video class="" style="width: auto; height: auto; max-width: 1000px; margin: 0 auto;" src="/storage/video/{{ $post->video }}" controls>
                @else
                    <img class="" style="width: auto; height: auto; max-width: 1000px; margin: 0 auto;" src="/storage/video/{{ $post->video }}">
                @endif
           </div>
       </div>
   </div>
    <div class="row pt-5">
       <div class="col-12">
           <div class="card">
               <div class="card-header d-flex justify-content-center">
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img style="max-width: 40px;" src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" alt="">
                    </div>
                    <div>
                        <div class="font-weight-bold d-flex align-items-center">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                                
                            </div>
                    </div>
                </div>
               </div> {{-- card head --}}
               <div class="card-body">
                    <div>
                        <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                            </span> {{ $post->caption }}
                        </p>
                    </div>
               </div>
           </div>
           
       </div>
   </div>
</div>
@endsection
