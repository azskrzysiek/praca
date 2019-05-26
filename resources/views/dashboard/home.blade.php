@extends('layouts.app')


@section('content')
<div class="container d-flex flex-column justify-content-center" style="height: 96vh;">
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
                        @if($posts->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tytuł</th>
                                    <th scope="col">Opis</th>
                                    <th scope="col">Video</th>
                                    <th scope="col">Akcje</th>
                                </tr>
                                </thead>
                                <tbody>
                            
                                @foreach ($posts as $post)
                                    <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td><a href="/p/{{ $post->id }}">{{ $post->title }}</a></td>
                                    <td>{{ $post->caption}}</td>
                                    <td>
                                        @if (  $post->video  !== 'noimage.jpg' )
                                            <video src="/storage/video/{{ $post->video}}" width="50px" height="50px" alt="">
                                        @else
                                            <img src="/storage/video/{{ $post->video}}" width="50px" height="50px" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <a title="Edytuj ten post" href="/p/{{$post->id}}/edit"><i class="fas fa-lg fa-pen-square pr-1" style="font-size: 150%;"></i></a> 
                                        &#8260; 
                                        <a title="Usuń ten post"
                                        class="pl-1"
                                        onclick="event.preventDefault(); 
                                        var r = confirm('Jestes pewien ?'); 
                                        if (r === true)
                                        {
                                            document.getElementById('delete-post-{{ $post->id }}').submit();
                                        } else {
                                            return false;
                                        }">
                                        <i class="fas fa-trash" style="color: red; font-size: 130%;"></i>
                                        </a>
                                        <form class="d-none" id="delete-post-{{ $post->id }}" action="{{ route('posts.delete', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                </table>
                        </div>
                        @else
                        <div class="text-center">
                            <h1>Nie ma żadnych filmów do wyświetlenia</h1>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

