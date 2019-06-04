@extends('layouts.app')

@section('style')
<style>
    .one {
        min-height: 100vh;

    }

    .card {
        margin-top: 5vh;
        height: 400px;
    }
    .love img {
        height: 25px;
        padding-right: 5px;
    }

    .love {
        padding: 6px 2px 2px 2px;
    }

    .card-body {
        padding: 0;
    }

    .top {
        margin-top: 10vh;
    }
    
</style>
@endsection

@section('content')
<div class="container one d-flex flex-column justify-content-center">
    <div class="top text-center">
        <a href="" class="btn btn-primary">Aplikuj do tej drużyny</a>
    </div>
    <div class="row">
            @foreach ($players as $player)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card mx-auto" style="width: 18rem;">
                            <div class="love d-flex justify-content-around">
                                <div>
                                    <img src="/storage/logos/{{ $club->logo }}" alt="">{{ $club->name }}
                                </div>
                                <div>
                                    {{ $player->positione }}
                                </div>
                            </div>
                            <a href="/profile/{{ $player->id }}">
                                <img class="card-img-top" src="{{ $player->profileImage() }}" alt="Card image cap">
                            </a>
                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                              <div>{{ $player->user->name }}</div>
                              <div>{{ $player->number }}</div>
                            </div>
                          </div>
                    </div>
                    @endforeach
                    
    </div>
</div>
@endsection

