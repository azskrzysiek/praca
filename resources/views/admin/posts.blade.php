@extends('layouts.app')

@section('style')
<style>
    .jumbotron {
        padding: 3vh 2vh 3vh 2vh;
        margin-top: 8vh;
    }

    i.fa-trash {
    color: #ff0000; 
    font-size: 130%;
}
    i.fa-trash:hover {
    color: #cc0000; 
    font-size: 130%;
    }
    i {
        font-size: 130%;
    }

    .fa-check-square {
        color: #000;
    }

    .accepted {
        color: #59f442;
    }
</style>

@endsection

@section('content')


<div class="container d-flex flex-column justify-content-center">
        <div class="jumbotron">
            <div class="row">
                <div class="col-12">
                    <div class="card text-center"><h4 class="pt-2">Mecze</h4></div>    
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
                                <table class="table table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">#</th>
                                        <th scope="col">Gospdodarze</th>
                                        <th scope="col">Goście</th>
                                        <th scope="col">Wynik meczu</th>
                                        <th scope="col">Wynik do połowy</th>
                                        <th scope="col">Dodał</th>
                                        <th scope="col">Video</th>
                                        <th scope="col">Zatwierdź</th>
                                        <th scope="col">Usuń</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th scope="row">
                                                @if ($post->approved === 1)
                                                    <a href="/p/{{ $post->id }}">Pokaż</a>
                                                @endif
                                            </th>
                                            <th scope="row">{{ $post->id }}</th>
                                            <td 
                                            class="{{ $post->scoreHomeFull() > $post->scoreAwayFull() ? 'winner-home' : 'loser-home' }}">
                                                {{ $post->clubHome() }}
                                            </td>
                                            <td 
                                            class="{{ $post->scoreHomeFull() < $post->scoreAwayFull() ? 'winner-home' : 'loser-home' }}">
                                                {{ $post->clubAway()}}
                                            </td>
                                        <td>{{ $post->scoreFull}}</td>
                                        <td>{{ $post->scoreHalf}}</td>
                                        <td><a class="text-dark" style="text-decoration: none;" href="/profile/{{ $post->user->id }}">{{ $post->user->username}}</a></td>
                                        <td>
                                            @if (  $post->video  !== 'noimage.jpg' )
                                                <video src="/storage/video/{{ $post->video}}" width="50px" height="50px" alt="">
                                            @else
                                                <img src="/storage/video/{{ $post->video}}" width="50px" height="50px" alt="">
                                            @endif
                                        </td>

                                        <td class="">
                                            <a title="{{ $post->approved === 1 ? 'Nieakceptuj post' : 'Zaakceptuj post'}}"
                                            class="pl-1"
                                            onclick="event.preventDefault(); 
                                            var r = confirm('Jestes pewien ?'); 
                                            if (r === true)
                                            {
                                                document.getElementById('update-post-{{ $post->id }}').submit();
                                            } else {
                                                return false;
                                            }">
                                            <i class="fa fa-check-square {{ $post->approved === 1 ? 'accepted' : '' }}"></i>
                                            </a>
                                            <form class="d-none" id="update-post-{{ $post->id }}" action="{{ route('posts.accept', $post->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                            </form> 
                                        </td>

                                        <td>
                                            <a title="Usuń ten mecz"
                                            class="pl-1"
                                            onclick="event.preventDefault(); 
                                            var r = confirm('Jestes pewien ?'); 
                                            if (r === true)
                                            {
                                                document.getElementById('delete-post-{{ $post->id }}').submit();
                                            } else {
                                                return false;
                                            }">
                                            <i class="fas fa-trash"></i>
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
    
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


