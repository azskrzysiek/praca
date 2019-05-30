@extends('layouts.app')

@section('content')
<div class="container pt-3">
    <div class="jumbotron mt-5">
   <div class="row">
       <div class="col-12 col-md-7 text-center">
            <img src="{{ $user->profile->profileImage() }}" style="max-height: 400px; max-width: 400px;" class=" rounded-circle w-100 mb-3" alt="">
            <div class="row d-flex flex-column justify-content-center">
                <div class="col-6 offset-3">
                    @if (isset($user->profile->urlInstagram))
                        <a class="d-flex text-dark mx-auto" style="width: 30%;" target="_blank" href="{{ $user->profile->urlInstagram}}">
                            <i class="fab fa-instagram pt-1 mr-2"></i>
                            <div>Instagram</div>
                        </a>
                    @else
                        <div class="d-flex text-dark mx-auto" style="width: 30%;">
                            <i class="fab fa-instagram pt-1 mr-2"></i>
                            <div>Brak</div>
                        </div>
                    @endif
                </div>
                <div class="col-6 offset-3">
                        @if (isset($user->profile->urlFacebook))
                            <a class="d-flex text-dark mx-auto" style="width: 30%;" target="_blank" href="{{ $user->profile->urlFacebook}}">
                                <i class="fab fa-facebook pt-1 mr-2"></i>
                                <div>Facebook</div>
                            </a>
                        @else
                            <div class="d-flex text-dark mx-auto" style="width: 30%;">
                                <i class="fab fa-facebook pt-1 mr-2"></i>
                                <div>Brak</div>
                            </div>
                        @endif
                </div>
                <div class="col-6 offset-3">
                        @if (isset($user->profile->urlTwitter))
                            <a class="d-flex text-dark mx-auto" style="width: 30%;" target="_blank" href="{{ $user->profile->urlTwitter}}">
                                <i class="fab fa-twitter pt-1 mr-2"></i>
                                <div>Twitter</div>
                            </a>
                        @else
                            <div class="d-flex text-dark mx-auto" style="width: 30%;">
                                <i class="fab fa-twitter pt-1 mr-2"></i>
                                <div>Brak</div>
                            </div>
                        @endif
                </div>
            </div>
       </div>
       <div class="col-12 col-md-5">
           <div class="pt-5 text-center d-block">
               <h1 class="pb-2">{{ $user->profile->name }} {{ $user->profile->lastname }}</h1>

               <div class="row pb-4">
                   <div class="col-4">
                       @can('update', $user->profile)
                        <a class="d-block badge badge-pill badge-success" href="/p/create">
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
                            <a class="d-block badge badge-pill badge-warning red" href="/favorite">
                                <i class="fas fa-2x fa-heart pb-1"></i>
                                <div>Ulubione</div>
                            </a>
                        @endcan
                   </div>
               </div>
            </div>
           <div class="d-flex flex-column justify-content-start">
               <div><strong class="mr-3">Pozycja:</strong>{{ $user->profile->positione }}</div>
               <div><strong class="mr-3">Wiek:</strong>{{ $user->profile->age ?? 'Brak' }}</div>
           <div><strong class="mr-3">Doświadczenie:</strong>
                {{ $user->profile->experience ?? 'Brak' }} 
                {{ ($user->profile->experience == 0) ? '': 
                (($user->profile->experience) < 2 ? 'rok' : 
                (($user->profile->experience < 5) ? 'lata' : 'lat')) }}
            </div>
        <div><strong class="mr-3">Wzrost:</strong>{{ $user->profile->height ?? 'Brak' }} {{ $user->profile->height == null ? '' : 'cm' }}</div>
               <div>
                   <strong class="mr-3">Aktualny klub:</strong>
                   @if ($user->profile->club_id !== 0)
                    <img src="/storage/logos/{{ $user->profile->club->logo }}" style="height: 25px;" alt="">
                   @endif
                   {{ $user->profile->club->name ?? 'Brak' }}
                </div>
               <div><strong class="mr-3">Dodanych filmów:</strong>{{ $user->posts->count() }}</div>
           </div>
           <div class="pt-5 font-weight-bold">Osiągnięcia:</div>
           <div class="text-justify">
            <ul>
                    @foreach($user->profile->descriptione as $item) 
                      <li>{{$item == null ? 'Brak': $item}}</li>
                    @endforeach    
            </ul>   
            </div>
            </div>
    </div>

</div>
       
        <div class="row">
            <div class="col-12 text-center">
                <div class="card"><h4 class="pt-1">Moje filmy</h4></div>
            </div>
        </div>

       <div class="row pt-4">
        <div class="card-deck">
           @foreach($posts as $post)
            <div class="col-12 col-md-4 pb-4">
                <div class="card" style="min-height: 220px; max-height: 220px padding: 10px;">
                    <div class="card-header d-flex justify-content-center">
                        <div class="flex-grow-1">{{ $post->clubHome() }}</div> 
                        <div class="flex-grow-1">vs</div>
                        <div class="flex-grow-1">{{ $post->clubAway() }}</div> 
                    </div>
                    <a href="/p/{{ $post->id }}">
                        @if ( $post->video !== 'noimage.jpg')
                            <video src="/storage/video/{{ $post->video }}" class="card-img-top" alt="">
                        @else
                            <img src="/storage/video/{{ $post->video }}" class="card-img-top" style="padding-bottom: 6px;" alt="">
                        @endif
                    </a>
                    <div class="card-body d-flex align-items-baseline">
                            <i class="fas fa-calendar-week pr-2"></i>
                            <div>{{ $post->created_at }}</div>
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
