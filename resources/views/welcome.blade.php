@extends('layouts.app')

@section('style')
<style>
#section-a,
{
    color: #926239;
    height: 100vh;
}

#section-a {
    padding: 20px;
    background: #fff;
    text-align: center;
}

#section-a h1 {
    padding: 15px;
    font-weight: 700;
    text-shadow: 1px 1px #000;
}
#section-a img {
    padding: 15px;
    box-shadow: 5px 10px 8px #888888;
    margin-bottom: 20px;
}

.games {
    width: 80%;
}
.end {
    height: 30vh;
    border: 1px solid #000;
    box-shadow: 5px 10px 8px #888888;
    width: 78vw;
    margin: 10px auto;
}

</style>


@endsection

@section('content')

{{-- <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif --}}

        <header id="showcase">
            <div class="bg-shadow">
                <h1>Witam w ReczVod</h1>
                <p>Pierwszej ogólnodostępnej platformie dla osób zainteresowanych 1 ligą piłki ręcznej w Polsce!</p>
                <a class="button" type="button" href="#section-a">Dowiedz się więcej</a>
                <div class="scrollDown"></div>
            </div>
        </header>
        <section id="section-a">
                <div class="row">
                    <div class="col-12">
                        <h1>Oglądaj mecze I ligi</h1>
                        <img class="img-fluid games" src="/jpg/mecze.jpg" alt="">
                    </div>
                    <div class="col-12">
                        <h1>Edytuj swój profil zawodnika</h1>
                        <img class="img-fluid games" src="/jpg/profil.jpg" alt="">
                    </div>
                    <div class="col-12">
                        <h1>Dodawaj mecze swojej drużyny</h1>
                        <img class="img-fluid games" src="/jpg/add.jpg" alt="">
                    </div>
                    <div class="col-12">
                        <h1>Dodaj profil do drużyny</h1>
                        <img class="img-fluid games" src="/jpg/join.jpg" alt="">
                    </div>
                    <div class="col-12 text-center">
                        <div class="end">
                            <h1>Dołącz już dzisiaj</h1>
                            <div class="my-5">
                                <a class="btn btn-block btn-outline-primary"  
                                    href="#" data-toggle="modal" 
                                    data-target="#loginModal">
                                    Zaloguj się
                                </a>
                                <a class="btn btn-block btn-outline-secondary" 
                                    href="#" data-toggle="modal" data-target="#registerModal">
                                    Zarejestruj się
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        

        
@endsection

@section('script')

    
@endsection


