@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <h1>Edit Profile</h1>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label pl-0">Profile name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->profile->name }}" autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group row">
            <label for="lastname" class="col-md-4 col-form-label pl-0">Profile lastname</label>
                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') ?? $user->profile->lastname }}" autocomplete="lastname" autofocus>

                @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label pl-0">Profile description</label>
                <textarea id="description" type="text" rows="5" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description')}}" autocomplete="description" autofocus>{{ $user->profile->description }}</textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="row">
            <label for="image" class="col-md-4 col-form-label pl-0">Profile image</label>
            <input type="file" class="form-control-file" id="image" name="image">

            @error('image')
                    <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="row pt-3">
            <button class="btn btn-outline-primary">Save Profile</button>
        </div>
    </form>
</div>
@endsection
