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
                        <label for="image" class="col-md-4 col-form-label pl-0">Post image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        @error('image')
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
