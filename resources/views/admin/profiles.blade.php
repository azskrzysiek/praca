@extends('layouts.app')

@section('style')
<style>
.jumbotron {
    padding: 3vh 2vh 3vh 2vh;
    margin-top: 8vh;
}

i.green {
    color: #42f44b;
}
i.green:hover {
    color: #43f441;
}
i.red {
    color: #f4415b;
}
i.red:hover {
    color: #f44641;
}

   
img {
    height: 50px;
}
.table > tbody > tr > td {
     vertical-align: middle;
}
.table > tbody > tr > th {
     vertical-align: middle;
}

.fa-arrow-circle-right {
    color: #42f44b;
}
.flex-grow-1 {
    width: 86px;
}
.less {
    max-width: 130px;
}

a.show {
    color: black;
}
a.show:hover {
    color: #4248f4;
    text-decoration: none;
}
a.none {
    text-decoration: none;
}
a.none:hover {
    
    text-decoration: none;
}

.top {
    margin-top: 50px;
    height: 40px;
}


</style>

@endsection

@section('content')


<div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-12">
                    <div class="card text-center"><h4 class="pt-2">Transfery</h4></div>    
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
                                        {{-- <th scope="col"></th> --}}
                                        <th scope="col">#</th>
                                        <th scope="col">Imię</th>
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
                                            {{-- <th scope="row"><a href="/profile/{{ $profile->id }}">Pokaż</a></th> --}}
                                            <th scope="row">{{ $profile->id }}</th>
                                            <td class="less">
                                                <a class="show" href="/profile/{{ $profile->id }}" >
                                                    {{ $profile->user->name }}
                                                </a>
                                                
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
                                            
                                            <td class="d-flex flex-row align-items-center">
                                                <div class="pr-2 flex-grow-1">{{ $profile->club->name ?? 'Brak' }}</div>
                                                <i class="fas fa-arrow-circle-right flex-grow-1"></i>
                                                <div class="pl-2 flex-grow-1">{{ $profile->Clube ?? 'Brak' }}</div>
                                            </td>

                                            <td class="">
                                                <div class="d-inline top">
                                                    <a title="Akceptuj transfer"
                                                    class="pl-1 none"
                                                    onclick="event.preventDefault(); 
                                                    var r = confirm('Jestes pewien ?'); 
                                                    if (r === true)
                                                    {
                                                        document.getElementById('accept-transfer-{{ $profile->id }}').submit();
                                                    } else {
                                                        return false;
                                                    }">
                                                    <i class="fas fa-check-circle green"></i>
                                                    </a>
                                                    <form class="d-none" id="accept-transfer-{{ $profile->id }}" action="{{ route('admin.accept.transfer', $profile->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                    </form> 
                                                </div>
                                                
                                                <div class="d-inline">
                                                    <a title="Anuluj transfer"
                                                    class="pl-1 none"
                                                    onclick="event.preventDefault(); 
                                                    var r = confirm('Jestes pewien ?'); 
                                                    if (r === true)
                                                    {
                                                        document.getElementById('decline-transfer-{{ $profile->id }}').submit();
                                                    } else {
                                                        return false;
                                                    }">
                                                    <i class="fas fa-times red"></i>
                                                    </a>
                                                    <form class="d-none" id="decline-transfer-{{ $profile->id }}" action="{{ route('admin.decline.transfer', $profile->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                    </form> 
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                            </div>
                            @else
                            <div class="text-center">
                                <h1>Żadnych transferów do zaakceptowania</h1>
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


