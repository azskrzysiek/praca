@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12" style="margin: 5vh 0;">
            <div class="card d-flex flex-row justify-content-center align-items-baseline">
                <h1>{{ $post->title }}</h1>
                <favorite-button title="Dodaj post do ulubionych" post-id="{{ $post->id }}" favorit="{{ $favorit }}"></favorite-button>
            </div>
        </div>
    </div>
   <div class="row">
       <div class="col-12 text-center">
        <img class="" style="height: 50vh; width: 70vh;" src="/storage/{{ $post->image }}" alt="">
       </div>
   </div>
    <div class="row pt-5"></div>
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
