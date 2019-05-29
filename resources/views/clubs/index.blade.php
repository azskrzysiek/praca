@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="row pt-4">
        <div class="col-12">
            <div class="card text-center align-content-center">
                <div class="cardheader h2 pt-2">Drużyny 1 ligi piłki ręcznej</div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($clubs as $club)
            <div class="col-6">
                <div id="f1_container">
                <div id="f1_card" class="shadow">
                    <div class="front face">
                        <img class="" src="/storage/logos/{{ $club->logo }}"/>
                    </div>
                    <div class="back face center">
                        <p class="h2">{{ $club->name }}</p>
                        <hr>
                        <div class="row text-left">
                            <div class="col-6">
                                <div class="text-center">Bramkarze</div>
                                <br>
                                @foreach ($club->profiles as $profile)
                                    @if ($profile->position === 1)
                                    <a class="text-dark" href="/profile/{{ $profile->user->id }}">
                                        {{ $profile->user->name }} <br>
                                    </a>
                                    @endif
                                @endforeach
                                <hr>
                            </div>
                            <div class="col-6">
                                    <div class="text-center">Rozgrywający</div>
                                    <br>
                                @foreach ($club->profiles as $profile)
                                    @if ($profile->position === 3 || $profile->position === 4 || $profile->position === 5 )
                                    <a class="text-dark" href="/profile/{{ $profile->user->id }}">
                                        {{ $profile->user->name }} <br>
                                    </a>
                                    @endif
                                @endforeach
                                <hr>
                            </div>
                        
                        
                            <div class="col-6">
                                    <div class="text-center">Skrzydłowi</div>
                                    <br>
                                @foreach ($club->profiles as $profile)
                                    @if ($profile->position === 2 || $profile->position === 6 )
                                    <a class="text-dark" href="/profile/{{ $profile->user->id }}">
                                        {{ $profile->user->name }} <br>
                                    </a>
                                    @endif
                                @endforeach
                                <hr>
                            </div>
                            <div class="col-6">
                                    <div class="text-center">Kołowi</div>
                                    <br>
                                @foreach ($club->profiles as $profile)
                                    @if ($profile->position === 7)
                                    <a class="text-dark" href="/profile/{{ $profile->user->id }}">
                                        {{ $profile->user->name }} <br>
                                    </a>
                                    @endif
                                @endforeach
                                <hr>
                            </div>
                        
                            <div class="col-12 text-center">
                                    <div class="text-center">Trenerzy</div>
                                    <br>
                                @foreach ($club->profiles as $profile)
                                    @if ($profile->position === 8)
                                    <a class="text-dark" href="/profile/{{ $profile->user->id }}">
                                        {{ $profile->user->name }} <br>
                                    </a>
                                    @endif
                                @endforeach
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


