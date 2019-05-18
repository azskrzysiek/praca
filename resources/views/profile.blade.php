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
           <div class="pt-5">
               <h1>{{ $user->username }}</h1>
           </div>
           <div>
               <div><strong class="mr-3">Imię</strong>{{ $user->profile->name }}</div>
               <div><strong class="mr-3">Nazwisko:</strong>{{ $user->profile->lastname }}</div>
               <div><strong class="mr-3">Pozycja:</strong>{{ $user->profile->positione }}</div>
               <div><strong class="mr-3">Wiek:</strong>{{ $user->profile->age }}</div>
               <div><strong class="mr-3">Doświadczenie:</strong>{{ $user->profile->experience }}</div>
               <div><strong class="mr-3">Wzrost:</strong>{{ $user->profile->height }}</div>
               <div><strong class="mr-3">Aktualny klub:</strong>{{ $user->profile->club }}</div>
           </div>
           <div class="pt-5 font-weight-bold">Parę słów o sobie:</div>
           <div class="text-justify">{{ $user->profile->description }}</div>

       </div>

       <div class="row pt-4 justify-content-center">
           <div class="col-6 text-center font-weight-bold">Moje filmy</div>
           <div class="w-100"></div>
           <div class="text-center col-sm-12 col-md-4">
                <iframe class="p-4" width="400" height="320" src="https://www.youtube.com/embed/p-x8m1sJegw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
           </div>
           <div class="text-center col-sm-12 col-md-4">
                <iframe class="p-4" width="400" height="320" src="https://www.youtube.com/embed/p-x8m1sJegw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
           </div>
           <div class="text-center col-sm-12 col-md-4">
                <iframe class="p-4" width="400" height="320" src="https://www.youtube.com/embed/p-x8m1sJegw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
           </div>
       </div>
</div>
@endsection
