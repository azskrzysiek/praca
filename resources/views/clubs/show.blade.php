@extends('layouts.app')

@section('style')
<style>
    .container {
        height: 100vh;

    }
</style>
@endsection

@section('content')
<div class="container d-flex flex-column justify-content-center">
    <div class="card text-center">
        <div class="card-header">{{ $club->name }}</div>
    </div>
    <div class="row">
        @foreach ($players as $player)
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        {{ $player->user->name }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

