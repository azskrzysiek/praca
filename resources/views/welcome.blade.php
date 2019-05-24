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
            <div class="bg-shadow">
                <h1>Witam w ReczVod</h1>
                <p>Pierwszej ogólnodostępnej platformie dla osób zainteresowanych 1 ligą piłki ręcznej w Polsce!</p>
                <a class="button" type="button" href="#section-a">Dowiedz się więcej</a>
                <div class="scrollDown"></div>
            </div>
        </header>
        <section id="section-a">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, voluptatum quisquam consequuntur ullam natus saepe placeat tempora aut dolore doloremque dicta, quia consectetur quaerat aspernatur voluptas ducimus ab! Esse sequi laborum obcaecati accusantium praesentium iste sapiente quia doloribus magni veniam sunt blanditiis, quos eveniet dignissimos qui fuga excepturi non. Voluptates ex, adipisci veniam voluptatem fugiat illo impedit nisi nobis! Saepe ipsum vitae ipsa laudantium harum cupiditate molestias recusandae velit, odio, doloremque placeat architecto odit, totam aliquam? Est blanditiis similique doloribus debitis sapiente nam numquam repudiandae illum, iusto eligendi voluptatum laborum quisquam facere. Ratione rerum cum odit veniam aperiam, commodi eveniet?</p>
        </section>
        <section id="section-b">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, voluptatum quisquam consequuntur ullam natus saepe placeat tempora aut dolore doloremque dicta, quia consectetur quaerat aspernatur voluptas ducimus ab! Esse sequi laborum obcaecati accusantium praesentium iste sapiente quia doloribus magni veniam sunt blanditiis, quos eveniet dignissimos qui fuga excepturi non. Voluptates ex, adipisci veniam voluptatem fugiat illo impedit nisi nobis! Saepe ipsum vitae ipsa laudantium harum cupiditate molestias recusandae velit, odio, doloremque placeat architecto odit, totam aliquam? Est blanditiis similique doloribus debitis sapiente nam numquam repudiandae illum, iusto eligendi voluptatum laborum quisquam facere. Ratione rerum cum odit veniam aperiam, commodi eveniet?</p>
        </section>
        <section id="section-c">
            <div class="box-1">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, exercitationem ipsam fugiat dignissimos at modi repellendus natus nihil quia distinctio?
            </div>
            <div class="box-2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, exercitationem ipsam fugiat dignissimos at modi repellendus natus nihil quia distinctio?
            </div>
            <div class="box-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, exercitationem ipsam fugiat dignissimos at modi repellendus natus nihil quia distinctio?
            </div>
        </section>

        
@endsection


