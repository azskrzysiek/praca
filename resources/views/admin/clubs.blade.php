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

img {
    height: 50px;
}
</style>

@endsection

@section('content')


<div class="container d-flex flex-column justify-content-center">
        <div class="jumbotron">
            <div class="row">
                <div class="col-12">
                    <div class="card text-center"><h4 class="pt-2">Drużyny</h4></div>    
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
                            @if($clubs->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Logo</th>
                                        <th scope="col">Edytuj</th>
                                        <th scope="col">Usuń</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                
                                    @foreach ($clubs as $club)
                                        <tr>
                                            <th scope="row"><a href="{{route('clubs.show', $club->id) }}">Pokaż</a></th>
                                            <th scope="row">{{ $club->id }}</th>
                                            <td>{{ $club->name}}</td> 
                                            <td><img src="/storage/logos/{{ $club->logo }}" alt=""></td> 
                                        <td>
                                            <a title="Edytuj ten post" href="{{ route('clubs.edit', $club->id) }}"><i class="fas fa-lg fa-pen-square"></i></a> 
                                        </td>
                                        <td>
                                            <a title="Usuń ten post"
                                            class="pl-1"
                                            onclick="event.preventDefault(); 
                                            var r = confirm('Jestes pewien ?'); 
                                            if (r === true)
                                            {
                                                document.getElementById('delete-club-{{ $club->id }}').submit();
                                            } else {
                                                return false;
                                            }">
                                            <i class="fas fa-trash"></i>
                                            </a>
                                            <form class="d-none" id="delete-club-{{ $club->id }}" action="{{ route('clubs.delete', $club->id) }}" method="POST">
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
                                    {{ $clubs->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


