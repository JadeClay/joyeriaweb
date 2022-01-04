<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lilita+One&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />
    <title>Joyerias Brador</title>
</head>
<body>
    <div class="container">
        <nav class="nav-menu">
            <li class="logo"><a href="">Joyerias Brador</a></li>
            <div class="menu">
                <li class="hvr-underline-from-center"><a href="/"><span class="inline-icon material-icons">home</span> Inicio</a></li>
                <li class="hvr-underline-from-center"><a href="/users"><span class="inline-icon material-icons">people</span> Usuarios</a></li>
                <li class="hvr-underline-from-center"><a href=""><span class="inline-icon material-icons">admin_panel_settings</span> Clientes</a></li>
                <li class="hvr-underline-from-center"><a href=""><span class="inline-icon material-icons">sell</span> Ventas</a></li>
                @guest
                    @if (Route::has('login'))
                        <li class="login">
                            <a  href="{{ route('login') }}">
                                <span class="inline-icon material-icons">logout</span> {{ __('Login') }}
                            </a>
                        </li>
                    @endif
                @endguest
                
                @auth
                    <li class="logout hvr-underline-from-center">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="inline-icon material-icons">logout</span> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endauth
            </div>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

        </nav>

        <div class="center">
            <form method="POST" action="{{ route('register') }}" class="form-structor">
                <div class="form-title">
                    <p><span class="inline-icon material-icons">people</span><br> Usuarios</p>
                </div>
                
                <div class="form-content">
                    @csrf
                    
                    <div>
                        <label for="name">{{ __('Nombre') }}</label>
                        <br>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <br>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="email">{{ __('Correo Electrónico') }}</label>
                        <br>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <br>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password">{{ __('Contraseña') }}</label>
                        <br>
                        <input id="password" type="password" name="password" required autocomplete="new-password">
                        <br>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password-confirm">{{ __('Confirmar contraseña') }}</label>
                        <br>
                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                        <br>
                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-submit">
                            {{ __('Crear usuario') }}
                        </button>

                        <a class="btn btn-index" href="/">
                            {{ __('Revisar usuarios') }}
                        </a>
                    </div>
                </div>

            </form>

            <form method="POST" action="{{ route('register') }}" class="form-structor">
                <div class="form-title">
                    <p><span class="inline-icon material-icons">people</span><br> Usuarios</p>
                </div>
                
                <div class="form-content">
                    @csrf
                    
                    <div>
                        <label for="name">{{ __('Nombre') }}</label>
                        <br>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <br>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="email">{{ __('Correo Electrónico') }}</label>
                        <br>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <br>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password">{{ __('Contraseña') }}</label>
                        <br>
                        <input id="password" type="password" name="password" required autocomplete="new-password">
                        <br>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password-confirm">{{ __('Confirmar contraseña') }}</label>
                        <br>
                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                        <br>
                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-submit">
                            {{ __('Crear usuario') }}
                        </button>

                        <a class="btn btn-index" href="/">
                            {{ __('Revisar usuarios') }}
                        </a>
                    </div>
                </div>

            </form>
        </div>

        <footer>
            <div class="copyright">
                <p>&copy 2021 - Oscar Piña y Arturo Rodríguez</p>
            </div>
            <div class="social">
                <a href="#" class="support">Soporte técnico</a>
                <a href="#" class="face">f</a>
            </div>
        </footer>

        <script src="{{ asset('js/index.js') }}"></script>
    </div>
</body>
</html>