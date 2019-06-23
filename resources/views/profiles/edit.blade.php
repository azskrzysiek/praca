@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center" style="height: 80h;">
    <div class="jumbotron" style="margin-top: 4rem;">

    
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <h1>Edit Profile</h1>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label pl-0">Imię</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->profile->name }}" autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group row">
            <label for="lastname" class="col-md-4 col-form-label pl-0">Nazwisko</label>
                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') ?? $user->profile->lastname }}" autocomplete="lastname" autofocus>

                @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group row">
            <label for="position" class="col-md-4 col-form-label pl-0">Pozycja</label>
                <select id="position" type="text" rows="5" class="form-control @error('position') is-invalid @enderror" name="position">

                    @php
                        $position = ['Bramkarz', 'Lewoskrzydłowy', 'Leworozgrywający', 'Środkowy', 'Praworozgrywający', 'Prawoskrzydłowy', 'Kołowy', 'Trener', 'Kibic'];
                    @endphp

                    @foreach ($position as $item)
                        <option value="{{$loop->iteration}}" {{ ($user->profile->position == $loop->iteration) ? 'selected' : '' }}>{{$item}}
                        </option>
                    @endforeach
                
                </select>

                @error('position')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group row">
            <label for="age" class="col-md-4 col-form-label pl-0">Wiek</label>
                <input id="age" type="number" rows="5" class="form-control @error('age') is-invalid @enderror" name="age" min="5" max="110" value="{{ old('age') ?? $user->profile->age}}" autocomplete="age" autofocus>

                @error('age')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group row">
            <label for="number" class="col-md-4 col-form-label pl-0">Numer</label>
                <input id="number" type="text" rows="5" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') ?? $user->profile->number}}" autocomplete="number" autofocus>

                @error('number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group row">
            <label for="height" class="col-md-4 col-form-label pl-0">Wzrost</label>
                <input id="height" type="number" rows="5" class="form-control @error('height') is-invalid @enderror" name="height" min="80" max="300" value="{{ old('height') ?? $user->profile->height}}" autocomplete="height" autofocus>

                @error('height')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group row">
            <label for="experience" class="col-md-4 col-form-label pl-0">Doświadczenie</label>
                <input id="experience" type="number" rows="5" class="form-control @error('experience') is-invalid @enderror" name="experience" min="0" max="90" value="{{ old('experience') ?? $user->profile->experience}}" autocomplete="experience" autofocus>

                @error('experience')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group row text-center p-4" style="border: 1px dotted black;">
            <div class="col-sm-12">
                <h4 class="p-0 m-0 text-center">Social media</h4>
            </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="d-flex flex-column align-items-center">
                        <label for="urlFacebook" class="col-md-4 col-sm-12 col-form-label pl-0">Facebook</label>
                        <input id="urlFacebook" style="width: 320px" type="text" class="form-control @error('urlFacebook') is-invalid @enderror" name="urlFacebook" value="{{ old('urlFacebook') ?? $user->profile->urlFacebook }}" autocomplete="urlFacebook" autofocus>
                        
                        @error('urlFacebook')
                        <span class="invalid-feedback" role="alert">
                            <strong>{!! $message !!}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
               
                <div class="col-xl-4 col-lg-12">
                    <div class="d-flex flex-column align-items-center">
                        <label for="urlTwitter"  class="col-md-4 col-sm-12 col-form-label pl-0">Twitter</label>
                        <input  id="urlTwitter" style="width: 320px" type="text" class="form-control @error('urlTwitter') is-invalid @enderror" name="urlTwitter" value="{{ old('urlTwitter') ?? $user->profile->urlTwitter }}" autocomplete="urlTwitter" autofocus>
                        @error('urlTwitter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{!! $message !!}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="d-flex flex-column align-items-center">
                        <label for="urlInstagram"  class="col-md-4 col-sm-12 col-form-label pl-0">Instagram</label>
                        <input  id="urlInstagram"  style="width: 320px" type="text" class="form-control @error('urlInstagram') is-invalid @enderror" name="urlInstagram" value="{{ old('urlInstagram') ?? $user->profile->urlInstagram }}" autocomplete="urlInstagram" autofocus>
                        
                        @error('urlInstagram')
                        <span class="invalid-feedback" role="alert">
                            <strong>{!! $message !!}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label pl-0">Osiągnięcia(Oddzielaj enterem)</label>
                <textarea id="description" type="text" rows="5" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description')}}" autocomplete="description" autofocus>{{ $user->profile->description }}</textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="row">
            <label for="image" class="col-md-4 col-form-label pl-0">Zdjęcie profilowe</label>
            <input type="file" class="form-control-file" id="image" name="image">

            @error('image')
                    <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="row pt-3">
            <button class="btn btn-outline-primary">Zapisz profil</button>
            <a href="javascript:history.back()" class="btn btn-outline-primary ml-3">Powrót</a>
        </div>
    </form>
</div>
</div>
@endsection
