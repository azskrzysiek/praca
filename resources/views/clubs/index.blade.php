@extends('layouts.app')

@section('style')
<style>
    .btn {
        width: 80%;
    }
    .card-top {
        margin: 20px 0;
    }
</style>

@endsection

@section('content')

<div class="container pt-4">
    <div class="row pt-4">
        <div class="col-12">
            <div class="card card-top text-center align-content-center">
                <div class="cardheader h2 pt-2 text-uppercase">Drużyny - I liga</div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($clubs as $club)
            <div class="col-lg-6 col-sm-12">
                <div id="f1_container">
                <div id="f1_card" class="shadow">
                    <div class="front face">
                        <img class="" src="/storage/logos/{{ $club->logo }}"/>
                    </div>
                    <div class="back face center d-flex flex-column">
                        <p class="h1">{{ $club->name }}</p>
                        <br>
                        <div class="row" style="font-size: 1.1rem;">

                            <div class="col-6 text-center">
                                <div class="text-center text-uppercase">Skrzydłowi</div>
                                @foreach ($club->profiles as $profile)
                                    @if ($profile->position === 2 || $profile->position === 6 )
                                    <a style="text-decoration: none;" class="pr-2" href="/profile/{{ $profile->user->id }}">
                                        {{ $profile->user->name }}
                                    </a>
                                    {{ $profile->number}} <br>
                                    @endif
                                @endforeach
                            </div>

                            <div class="col-6 text-center ">
                                    <div class="text-center text-uppercase">Rozgrywający</div>
                                @foreach ($club->profiles as $profile)
                                    @if ($profile->position === 3 || $profile->position === 4 || $profile->position === 5 )
                                    <a style="text-decoration: none;" class="pr-2" href="/profile/{{ $profile->user->id }}">
                                        {{ $profile->user->name }}
                                    </a>
                                    {{ $profile->number}} <br>
                                    @endif
                                @endforeach
                                <br>
                            </div>
                        
                            <div class="col-6 text-center">
                                <div class="text-center text-uppercase">Bramkarze</div>
                                @foreach ($club->profiles as $profile)
                                    @if ($profile->position === 1)
                                    <a style="text-decoration: none;" class="pr-2" href="/profile/{{ $profile->user->id }}">
                                        {{ $profile->user->name }}
                                    </a>
                                    {{ $profile->number}} <br>
                                    @endif
                                @endforeach
                            </div>
                            

                            <div class="col-6 text-center">
                                    <div class="text-center text-uppercase">Kołowi</div>
                                @foreach ($club->profiles as $profile)
                                    @if ($profile->position === 7)
                                    <a style="text-decoration: none;" class="pr2" href="/profile/{{ $profile->user->id }}">
                                        {{ $profile->user->name }}
                                    </a>
                                    {{ $profile->number}} <br>
                                    @endif
                                @endforeach
    
                            </div>
                        
                            <div class="col-12 text-center pt-4">
                                    <div class="text-center text-uppercase">Trenerzy</div>
                                @foreach ($club->profiles as $profile)
                                    @if ($profile->position === 8)
                                    <a style="text-decoration: none;" class="pr-2" href="/profile/{{ $profile->user->id }}">
                                        {{ $profile->user->name }} <br>
                                    </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-12">
                                <a href="{{ route('clubs.show',$club->id) }}" class="btn btn-primary">Sprawdź drużynę</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    


@endsection


