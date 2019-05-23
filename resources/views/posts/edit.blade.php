@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center" style="height: 100vh;">
    <div class="jumbotron">

    
    <form action="/p/{{ $post->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <h1>Edit Profile</h1>
        </div>
        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label pl-0">Post title</label>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $post->title }}" autocomplete="title" autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group row">
            <label for="caption" class="col-md-4 col-form-label pl-0">Post caption</label>
                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') ?? $post->title }}" autocomplete="caption" autofocus>

                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
       
        <div class="row">
            <label for="image" class="col-md-4 col-form-label pl-0">Post image</label>
            <input type="file" class="form-control-file" id="image" name="image">

            @error('image')
                    <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="row pt-3">
            <button class="btn btn-outline-primary">Save Post</button>
            <a href="javascript:history.back()" class="btn btn-outline-primary ml-3">Back</a>
        </div>
    </form>
</div>
</div>
@endsection
