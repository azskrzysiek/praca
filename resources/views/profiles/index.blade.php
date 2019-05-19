@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-12 col-md-7 text-center">
            <img src="{{ $user->profile->profileImage() }}" style="max-height: 400px; max-width: 400px;" class=" rounded-circle w-100" alt="">
            <div class="row justify-content-center">
                <div class="col-6 offset-4"><a class="d-flex" href="#"><i class="fab fa-instagram pt-1 mr-2"></i><div>Instagram</div></a></div>
                <div class="col-6 offset-4"><a class="d-flex" href="#"><i class="fab fa-facebook pt-1 mr-2"></i><div>Facebook</div></a></div>
                <div class="col-6 offset-4"><a class="d-flex" href="#"><i class="fab fa-twitter pt-1 mr-2"></i><div>Twitter</div></a></div>
            </div>
       </div>
       <div class="col-12 col-md-5 text-center">
           <div class="pt-5 d-flex justify-content-between align-items-center">
               <h1>{{ $user->username }}</h1>

               @can('update', $user->profile)
                <a href="/p/create">Add new post</a>
               @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            @endcan
           <div>
               <div><strong class="mr-3">Imię</strong>{{ $user->profile->name }}</div>
               <div><strong class="mr-3">Nazwisko:</strong>{{ $user->profile->lastname }}</div>
               <div><strong class="mr-3">Pozycja:</strong>{{ $user->profile->positione }}</div>
               <div><strong class="mr-3">Wiek:</strong>{{ $user->profile->age }}</div>
               <div><strong class="mr-3">Doświadczenie:</strong>{{ $user->profile->experience }}</div>
               <div><strong class="mr-3">Wzrost:</strong>{{ $user->profile->height }}</div>
               <div><strong class="mr-3">Aktualny klub:</strong>{{ $user->profile->club }}</div>
               <div><strong class="mr-3">Dodanych filmów:</strong>{{ $user->posts->count() }}</div>
           </div>
           <div class="pt-5 font-weight-bold">Parę słów o sobie:</div>
           <div class="text-justify">{{ $user->profile->description }}</div>

       </div>
    </div>
       
        <div class="row">
            <div class="col-12 text-center">Moje filmy</div>
        </div>

       <div class="row pt-4">
           @foreach($posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100" alt="">
                </a>
            </div>
           @endforeach
       </div>

       <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>

       <div class="row">
            <div class="col-12 text-center">Moje ulubione filmy</div>
        </div>
        <div class="row">
            @foreach ($postFavorites as $postFavorite)
            <div class="col-4 pb-4">
                 <a href="/p/{{ $postFavorite->id }}">
                     <img src="/storage/{{ $postFavorite->image }}" class="w-100" alt="">
                 </a>
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
