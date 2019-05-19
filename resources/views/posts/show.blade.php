@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>{{ $post->title }}</h1>
        </div>
    </div>
   <div class="row">
       <div class="col-8">
        <img class="w-100" src="/storage/{{ $post->image }}" class="w-100" alt="">
       </div>
       <div class="col-4">
           <div>
               <div class="d-flex align-items-center">
                   <div class="pr-3">
                    <img style="max-width: 40px;" src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" alt="">
                   </div>
                   <div>
                       <div class="font-weight-bold d-flex align-items-center">
                           <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                            <favorite-button post-id="{{ $post->id }}" favorit="{{ $favorit }}"></favorite-button>
                        </div>
                   </div>
               </div>
               <hr>

               <p>
                   <span class="font-weight-bold">
                       <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span> {{ $post->caption }}</p>
           </div>
       </div>
   </div>
</div>
@endsection
