@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron ">

    
   <div class="row">
       <div class="col-12 col-md-7 text-center">
            <img src="{{ $user->profile->profileImage() }}" style="max-height: 400px; max-width: 400px;" class=" rounded-circle w-100 mb-3" alt="">
            <div class="row justify-content-center">
                <div class="col-6 offset-4">
                    <a class="d-flex text-dark" target="_blank" href="https://www.instagram.com/">
                        <i class="fab fa-instagram pt-1 mr-2"></i>
                        <div>Instagram</div>
                    </a>
                </div>
                <div class="col-6 offset-4">
                    <a class="d-flex text-dark" target="_blank" href="https://www.facebook.com/">
                        <i class="fab fa-facebook pt-1 mr-2"></i>
                        <div>Facebook</div>
                    </a>
                </div>
                <div class="col-6 offset-4">
                    <a class="d-flex text-dark" target="_blank" href="https://twitter.com/?lang=pl">
                        <i class="fab fa-twitter pt-1 mr-2"></i>
                        <div>Twitter</div>
                    </a>
                </div>
            </div>
       </div>
       <div class="col-12 col-md-5 text-center">
           <div class="pt-5 d-block">
               <h1 class="pb-2">{{ $user->profile->name }} {{ $user->profile->lastname }}</h1>

               <div class="row pb-4">
                   <div class="col-4">
                       @can('update', $user->profile)
                        <a class="d-block badge badge-pill badge-success" style="color: black;" href="/p/create">
                            <i class="fas fa-2x fa-plus-circle pb-1"></i>
                            <div>Add new post</div>
                        </a>
                       @endcan
                   </div>
                   <div class="col-4">
                        @can('update', $user->profile)
                            <a class="d-block badge badge-pill badge-info" href="/profile/{{ $user->id }}/edit">
                                <i class="fas fa-2x fa-pen-square pb-1"></i>
                                <div>Edit profile</div>
                            </a>
                        @endcan
                   </div>
                   <div class="col-4">
                        @can('update', $user->profile)
                            <a class="d-block badge badge-pill badge-warning" href="/favorite">
                                <i class="fas fa-2x fa-heart pb-1"></i>
                                <div>Show favorites</div>
                            </a>
                        @endcan
                   </div>
               </div>
            </div>
           <div>
               <div><strong class="mr-3">Pozycja:</strong>{{ $user->profile->positione ?? 'Brak' }}</div>
               <div><strong class="mr-3">Wiek:</strong>{{ $user->profile->age ?? 'Brak' }}</div>
               <div><strong class="mr-3">Doświadczenie:</strong>{{ $user->profile->experience ?? 'Brak' }}</div>
               <div><strong class="mr-3">Wzrost:</strong>{{ $user->profile->height ?? 'Brak' }}</div>
               <div><strong class="mr-3">Aktualny klub:</strong>{{ $user->profile->club ?? 'Brak' }}</div>
               <div><strong class="mr-3">Dodanych filmów:</strong>{{ $user->posts->count() }}</div>
           </div>
           <div class="pt-5 font-weight-bold">Parę słów o sobie:</div>
           <div class="text-justify">
            <ul>
                <li>{{ $user->profile->description ?? 'Brak' }}</li>
            </ul>   
            </div>

       </div>
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

       {{-- <div class="row">
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
        </div>        --}}
</div>


@endsection
