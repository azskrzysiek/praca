@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center" style="height: 90vh; margin-top: 10rem; margin-bottom: 10rem;">
    <div class="jumbotron">
        <div class="row">

            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edytuj drużynę</h1>
                </div>

                <form action="/clubs/{{ $club->id }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')
        
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label pl-0">Nazwa drużyny</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $club->name }}" autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="row">
                        <label for="logo" class="col-md-4 col-form-label pl-0">Logo drużyny</label>
                        <input type="file" class="form-control-file" id="logo" name="logo">

                        @error('logo')
                                <strong>{{ $message }}</strong>
                        @enderror

                    </div>

                    <div class="row pt-3 d-flex">
                        <button class="btn btn-outline-primary mr-3">Modyfikuj drużynę</button>
                        <a href="javascript:history.back()" class="btn btn-outline-secondary ml-3">Wróć</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')

@endsection




