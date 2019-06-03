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

.green {
    color: #5cf442;
}

a {
    text-decoration: none;
}
</style>

@endsection

@section('content')


<div class="container d-flex flex-column justify-content-center">
        <div class="jumbotron">
            <div class="row">
                <div class="col-12">
                    <div class="card text-center"><h4 class="pt-2">Użytkownicy i role</h4></div>    
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
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nazwa</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Nazwa użytkownika</th>
                                        <th scope="col">Role</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                
                                    @foreach ($users as $user)
                                        <tr>
                                                <th scope="row">{{ $user->id }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td class="d-flex justify-content-around">

                                                <div class="d-flex flex-column">
                                                    <a
                                                    onclick="event.preventDefault(); 
                                                        document.getElementById('update-user-{{ $user->id }}').submit();
                                                    ">
                                                    <i class="fa fa-check-square {{ $user->isUser() ? 'green' : '' }}"></i>
                                                    </a>
                                                    User
                                                </div>
                                                <form class="d-none" id="update-user-{{ $user->id }}" action="{{ route('admin.role.user', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                </form> 

                                                <div class="d-flex flex-column">
                                                    <a
                                                    onclick="event.preventDefault(); 
                                                        document.getElementById('update-trainer-{{ $user->id }}').submit();
                                                    ">
                                                    <i class="fa fa-check-square {{ $user->isTrainer() ? 'green' : '' }}"></i>
                                                    </a>
                                                    Trener
                                                </div>
                                                <form class="d-none" id="update-trainer-{{ $user->id }}" action="{{ route('admin.role.trainer', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                </form> 
    

                                                <div class="d-flex flex-column">
                                                    <a
                                                    onclick="event.preventDefault(); 
                                                        document.getElementById('update-admin-{{ $user->id }}').submit();
                                                    ">
                                                    <i class="fa fa-check-square {{ $user->isAdmin() ? 'green' : '' }}"></i>
                                                    </a>
                                                    Admin
                                                </div>
                                                <form class="d-none" id="update-admin-{{ $user->id }}" action="{{ route('admin.role.admin', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                </form> 
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


