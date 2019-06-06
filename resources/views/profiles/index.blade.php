@extends('layouts.app')

@section('style')
<style>

.jumbotron {
    font-size: 1.2rem;
    margin: 10vh auto;
}
.profile {
    max-height: 400px; 
    max-width: 400px;
}

.green {
    color: #00ff00;
}
.red {
    color: #e60000;
}

</style>

@endsection

@section('content')
<div class="container">
<div class="jumbotron">
   <div class="row">
       <div class="col-12 col-md-7 text-center">
            <img src="{{ $user->profile->profileImage() }}" class=" rounded-circle w-100 mb-3 profile" alt="">
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
               <h1 class="">{{ $user->profile->name }} {{ $user->profile->lastname }}</h1>
               @if ($user->isAdmin())
               <small><i class="fas fa-user-shield red"></i> Admin </small>
               @elseif ($user->isTrainer())
               <small><i class="fas fa-certificate green"></i> Trener </small>
               @endif

               <div class="row pb-4">
                   @can('view', $user->profile)
                   <div class="col">
                        <a class="d-block badge badge-pill badge-success" href="/p/create">
                            <i class="fas fa-2x fa-plus-circle pb-1"></i>
                            <div>Dodaj mecz</div>
                        </a>
                    </div>
                    @endcan
                    <div class="col">
                        @can('update', $user->profile)
                        <a class="d-block badge badge-pill badge-info" href="/profile/{{ $user->id }}/edit">
                            <i class="fas fa-2x fa-pen-square pb-1"></i>
                            <div>Edytuj profil</div>
                        </a>
                        @endcan
                    </div>
                        @can('update', $user->profile)
                   <div class="col">
                        <a class="d-block badge badge-pill badge-warning red" href="/favorite">
                            <i class="fas fa-2x fa-heart pb-1"></i>
                            <div>Ulubione</div>
                        </a>
                    </div>
                        @endcan
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
                <div><strong class="mr-3">Numer:</strong>{{ $user->profile->number }}</div>
                <div>
                    <strong class="mr-3">MVP:</strong>{{ $count_mvp }}
                    @if ($count_mvp > 0)
                        <a class="pl-3" style="text-decoration: none;" href="/profile/{{ $user->id }}/mvp"> Zobacz mecze</a>
                    @endif
                </div>
                @if ($user->isTrainer() || $user->isAdmin())
                    <div><strong class="mr-3">Zatwierdzonych meczy:</strong>{{ $posts->count() ?? '0' }}</div>
                    <div><strong class="mr-3">Czekających na zatwierdzenie:</strong>{{ $unaproved->count() ?? '0' }}</div>
                @endif
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

@if ($user->isTrainer() || $user->isAdmin())
    <div class="row">
        <div class="col-12 text-center">
            @if($posts->count() > 0)
                <div class="card"><h4 class="pt-1">Dodane filmy</h4></div>
            @endif
        </div>
    </div>
    
       <div class="row pt-4">
        <div class="card-deck">
           @foreach($posts as $post)
            <div class="col-4 col-md-4 pb-4">
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
@endif

</div>


@endsection
