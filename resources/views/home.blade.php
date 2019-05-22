@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center" style="height: 100vh;">
    <div class="jumbotron">
        <div class="row">
            <div class="col-12">
                <div class="card text-center"><h4 class="pt-2">Moje filmy</h4></div>    
            </div>
        </div>
        <div class="row pt-1">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tytuł</th>
                                    <th scope="col">Opis</th>
                                    <th scope="col">Zdjęcie</th>
                                    <th scope="col">Akcje</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td><a href="/p/{{ $post->user->id }}">{{ $post->title }}</a></td>
                                    <td>{{ $post->caption}}</td>
                                    <td><img src="/storage/{{ $post->image}}" width="50px" height="50px" alt=""></td>
                                    <td><i class="fas fa-lg fa-pen-square" style="font-size: 150%;"></i> &#8260; <i class="fas fa-trash" style="color: red; font-size: 130%;"></i></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
