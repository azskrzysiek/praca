@extends('layouts.app')

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
            <h1>Welcome to the beach</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque aspernatur eveniet unde reiciendis repellendus vitae!</p>
            <a class="button">Read more</a>
        </header>
        <section id="section-a">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, voluptatum quisquam consequuntur ullam natus saepe placeat tempora aut dolore doloremque dicta, quia consectetur quaerat aspernatur voluptas ducimus ab! Esse sequi laborum obcaecati accusantium praesentium iste sapiente quia doloribus magni veniam sunt blanditiis, quos eveniet dignissimos qui fuga excepturi non. Voluptates ex, adipisci veniam voluptatem fugiat illo impedit nisi nobis! Saepe ipsum vitae ipsa laudantium harum cupiditate molestias recusandae velit, odio, doloremque placeat architecto odit, totam aliquam? Est blanditiis similique doloribus debitis sapiente nam numquam repudiandae illum, iusto eligendi voluptatum laborum quisquam facere. Ratione rerum cum odit veniam aperiam, commodi eveniet?</p>
        </section>

        
@endsection


