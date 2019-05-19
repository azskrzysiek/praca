@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-12 col-md-7 text-center">
            <img src="/jpg/avatar-test.jpg" class=" rounded-circle img-fluid" alt="">
            <div class="row justify-content-center">
                <div class="col-6 offset-4"><a class="d-flex" href="#"><i class="fab fa-instagram pt-1 mr-2"></i><div>Instagram</div></a></div>
                <div class="col-6 offset-4"><a class="d-flex" href="#"><i class="fab fa-facebook pt-1 mr-2"></i><div>Facebook</div></a></div>
                <div class="col-6 offset-4"><a class="d-flex" href="#"><i class="fab fa-twitter pt-1 mr-2"></i><div>Twitter</div></a></div>
            </div>
       </div>
       <div class="col-12 col-md-5 text-center">
           <div class="pt-5 d-flex justify-content-between align-items-center">
               <h1>{{ $user->username }}</h1>
               <a href="/p/create">Add new post</a>
           </div>
           <div>
               <div><strong class="mr-3">Imię</strong>{{ $user->profile->name }}</div>
               <div><strong class="mr-3">Nazwisko:</strong>{{ $user->profile->lastname }}</div>
               <div><strong class="mr-3">Pozycja:</strong>{{ $user->profile->positione }}</div>
               <div><strong class="mr-3">Wiek:</strong>{{ $user->profile->age }}</div>
               <div><strong class="mr-3">Doświadczenie:</strong>{{ $user->profile->experience }}</div>
               <div><strong class="mr-3">Wzrost:</strong>{{ $user->profile->height }}</div>
               <div><strong class="mr-3">Aktualny klub:</strong>{{ $user->profile->club }}</div>
               <div><strong class="mr-3">Dodanych filmów:</strong>{{ $user->posts->count() }}</div>
           </div>
           <div class="pt-5 font-weight-bold">Parę słów o sobie:</div>
           <div class="text-justify">{{ $user->profile->description }}</div>

       </div>
       

       <div class="row pt-4">
            <div class="col-6 offset-3 text-center font-weight-bold pb-2">Moje filmy</div>
            <div class="w-100"></div>
           @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <img src="/storage/{{ $post->image }}" class="w-100" alt="">
            </div>
           @endforeach
       </div>
</div>
@endsection
