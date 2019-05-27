@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center" style="height: 100vh;">
    <div class="jumbotron">
        <div class="row">

            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Add New Post</h1>
                </div>
                <form action="/p" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="club_id_home" class="col-md-4 col-form-label pl-0">Drużyna Gospodarzy</label>
                            <select id="club_id_home" type="text" rows="5" class="form-control @error('club_id_home') is-invalid @enderror" name="club_id_home">
                                
                                @foreach($clubs as $id => $club)
                                    <option value="{{ $id }}">
                                        {{ $club }}
                                    </option>
                                @endforeach
                            
                            </select>
            
                            @error('club_id_home')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group row">
                        <label for="club_id_away" class="col-md-4 col-form-label pl-0">Drużyna Gości</label>
                            <select id="club_id_away" type="text" rows="5" class="form-control @error('club_id_away') is-invalid @enderror" name="club_id_away">
                                
                                    @foreach($clubs as $id => $club)
                                        <option value="{{ $id }}">
                                            {{ $club }}
                                        </option>
                                    @endforeach
                            
                            </select>
            
                            @error('club_id_away')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group row">
                        <label for="id_home_player" class="col-md-4 col-form-label pl-0">Zawodnik gospodarzy</label>
                            <select id="id_home_player" type="text" rows="5" class="form-control @error('id_home_player') is-invalid @enderror" name="id_home_player">
                                
                                {{-- <option value="">Wybierz drużynę</option> --}}
                                {{-- @foreach ($clubs as $club)
                                    <option value="{{$club->id}}">{{$club->name}}
                                    </option>
                                @endforeach --}}
                            
                            </select>
            
                            @error('club_id_away')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group row">
                        <label for="scoreFull" class="col-md-4 col-form-label pl-0">Wynik meczu</label>
                            <input id="scoreFull" type="text" class="form-control @error('scoreFull') is-invalid @enderror" name="scoreFull" value="{{ old('scoreFull') }}" autocomplete="scoreFull" autofocus>

                            @error('scoreFull')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group row">
                        <label for="scoreHalf" class="col-md-4 col-form-label pl-0">Do przerwy</label>
                            <input id="scoreHalf" type="text" class="form-control @error('scoreHalf') is-invalid @enderror" name="scoreHalf" value="{{ old('scoreHalf') }}" autocomplete="scoreHalf" autofocus>

                            @error('scoreHalf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label pl-0">Post title</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label pl-0">Post Caption</label>
                            <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                            @error('caption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="row">
                        <label for="video" class="col-md-4 col-form-label pl-0">Post video</label>
                        <input type="file" class="form-control-file" id="video" name="video">

                        @error('video')
                                <strong>{{ $message }}</strong>
                        @enderror

                    </div>

                    <div class="row pt-3 d-flex">
                        <button class="btn btn-outline-primary mr-3">Add New Post</button>
                        <a href="javascript:history.back()" class="btn btn-outline-primary ml-3">Back</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection




