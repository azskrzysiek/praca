
<nav id="navbar" style="max-height:60px" class="{{ Auth::guest() ? 'visible' : ''}} navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container" style="max-height: 60px;">
            <a title="strona główna" class="navbar-brand d-flex" href="{{ url('/') }}">
                <div><img src="/svg/logo.svg" class="pr-1 hov" style="" alt=""></div>
                <div class="pl-2 pt-1 hov">ReczVod</div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">
                                Admin
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item d-flex align-items-baseline" href="{{ route('posts.index') }}">
                                    <i class="fas fa-home"></i>
                                    <div class="ml-3">Strona główna</div>
                                </a>
                                <a class="dropdown-item d-flex align-items-baseline" href="{{ route('home') }}">
                                        <i class="fas fa-columns"></i>
                                    <div class="ml-3">Zarządzaj filmami</div>
                                </a>
                                <a class="dropdown-item d-flex align-items-baseline" href="{{ route('clubs.index') }}">
                                        <i class="fas fa-futbol"></i>
                                    <div class="ml-3">Drużyny</div>
                                </a>
                                <a class="dropdown-item d-flex align-items-baseline" href="{{ route('profile.show', $user->id) }}">
                                    <i class="fa fa-user-circle pt-1"></i>
                                    <div class="ml-3">Profil</div>
                                </a>
                                <a class="dropdown-item d-flex align-items-baseline" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off pt-1"></i>
                                    <div class="ml-3">{{ __('Wyloguj') }}</div>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @guest
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Zaloguj się</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row loginText">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                            <div class="col-md-12 d-flex align-items-baseline">
                                <i class="fas fa-envelope-square pr-2"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="example@example.com" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row loginText">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-md-12 d-flex align-items-baseline">
                                <i class="fas fa-lock pr-2"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Hasło" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 ml-3 d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Pamiętaj mnie') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-outline-success">
                                    {{ __('Zaloguj się') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex flex-column justify-content-center">
                    <div>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Zapomniałeś hasła ?') }}
                            </a>
                        @endif
                    </div>
                    
                </div>
                </div>
            </div>
            </div> {{-- Modal Login --}}

           <!-- Modal -->
            <div class="modal fade" id="registerModal" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Zarejestruj się</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
        
                                <div class="form-group row loginText">
                                    {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}
        
                                    <div class="col-md-12 d-flex align-items-baseline">
                                        <i class="fas fa-signature"></i>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Imię i nazwisko" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row loginText">
                                    {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
        
                                    <div class="col-md-12 d-flex align-items-baseline">
                                        <i class="fas fa-envelope-square pr-2"></i>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="example@example.com">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row loginText">
                                    {{-- <label for="username" class="col-md-4 col-form-label text-md-right">Username</label> --}}
        
                                    <div class="col-md-12 d-flex align-items-baseline">
                                        <i class="fas fa-user pr-2"></i>
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" placeholder="Nazwa użytkownika">
        
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row loginText">
                                    {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
        
                                    <div class="col-md-12 d-flex align-items-baseline">
                                        <i class="fas fa-lock pr-2"></i>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Hasło">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row loginText">
                                    {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}
        
                                    <div class="col-md-12 d-flex align-items-baseline">
                                        <i class="fas fa-lock pr-2"></i>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Potwierdź hasło">
                                    </div>
                                </div>
        
                                <div class="form-group row pt-4">
                                    <div class="col-md-8 offset-md-2">
                                        <button type="submit" class="btn btn-outline-success">
                                            {{ __('Zarejestruj się') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                    </div>
                </div> {{-- Modal register --}}
        @endguest

    