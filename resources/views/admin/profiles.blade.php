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
                            @if($profiles->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">#</th>
                                        <th scope="col">Imię</th>
                                        <th scope="col">Nazwisko</th>
                                        <th scope="col">Zdjęcie</th>
                                        <th scope="col">Pozycja</th>
                                        <th scope="col">Wiek</th>
                                        <th scope="col">Doświadczenie</th>
                                        <th scope="col">Wzrost</th>
                                        <th scope="col">Klub</th>
                                        <th scope="col">Transfer</th>
                                        <th scope="col">Akceptuj</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                
                                    @foreach ($profiles as $profile)
                                        <tr>
                                            <th scope="row"><a href="/profile/{{ $profile->id }}">Pokaż</a></th>
                                            <th scope="row">{{ $profile->id }}</th>
                                            <td>
                                                {{ $profile->name }}
                                            </td>
                                            <td>
                                                {{ $profile->lastname }}
                                            </td>
                                            <td>
                                                <img src="{{ $profile->profileImage() }}" alt="">
                                            </td>
                                            <td>
                                                {{ $profile->positione }}
                                            </td>
                                            <td>
                                                {{ $profile->age ?? 'Brak' }}
                                            </td>
                                            <td>
                                                {{ $profile->experience ?? 'Brak' }}
                                            </td>
                                            <td>
                                                {{ $profile->height ?? 'Brak' }}
                                            </td>
                                            <td>
                                                {{ $profile->club->name ?? 'Brak' }}
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
                                    {{ $profiles->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


