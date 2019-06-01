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
.size{
    min-height: 450px;
}

.card-body a {
    position: absolute;
    top: 90%;
    right: 0%;
    width: 100%;
}
.card-img-top {
    height: 245px;
}
</style>

@endsection

@section('content')


<div class="container d-flex flex-column justify-content-center">
        <div class="jumbotron">
            <div class="row">
                <div class="col-12">
                    <div class="card text-center"><h4 class="pt-2">Akcje</h4></div>    
                </div>
            </div>
            <div class="row size pt-1">
                    <div class="col-3">
                        <div class="card size">
                            <img class="card-img-top" src="http://www.kokoschkarevival.com/files/2016-11/generic-image-missing-profile.jpg" alt="Card image cap">
                            <div class="card-body d-flex flex-column align-items-stretch">
                                <h5 class="card-title">Użytkownicy</h5>
                                <p class="card-text">Zarządzaj rolami użytkowników, usuwaj oraz dodawaj użytkowników</p>
                                <a href="{{ route('admin.users') }}" class="btn btn-primary">Użytkownicy</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card size">
                            <img class="card-img-top" src="/storage/admin/team.jpg" alt="Card image cap">
                            <div class="card-body d-flex flex-column align-items-stretch">
                                <h5 class="card-title">Drużyny</h5>
                                <p class="card-text">Aktualizuj drużyny, zarządzaj ich zasobami</p>
                                <a href="{{ route('admin.clubs') }}" class="btn btn-primary">Drużyny</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card size" >
                            <img class="card-img-top" src="https://www.learndash.com/wp-content/uploads/trianing-video.png" alt="Card image cap">
                            <div class="card-body d-flex flex-column align-items-stretch">
                                <h5 class="card-title">Posty</h5>
                                <p class="card-text">Zatwierdzaj oraz zarządzaj postami wszystkich użytkowników</p>
                                <a href="{{ route('admin.posts') }}" class="btn btn-primary">Posty</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card size" >
                            <img class="card-img-top" src="/storage/admin/jurecki.jpg" alt="Card image cap">
                            <div class="card-body d-flex flex-column align-items-stretch">
                                <h5 class="card-title">Zawodnicy</h5>
                                <p class="card-text">Przypisuj zawodników do drużyn</p>
                                <a href="{{ route('admin.profiles') }}" class="btn btn-primary">Profile</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>


@endsection


