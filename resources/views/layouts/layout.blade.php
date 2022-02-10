<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lilita+One&display=swap" rel="stylesheet">
    @stack('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <title>Joyerias Brador</title>
</head>
<body>
    <div class="container">
        <nav class="nav-menu">
            <li class="logo"><a href="">Joyerias Brador</a></li>
            <div class="menu">
            <li class="hvr-underline-from-center"><a href="/"><span class="inline-icon material-icons">home</span> Inicio</a></li>
                <li class="hvr-underline-from-center"><a href="{{ route('user.create') }}"><span class="inline-icon material-icons">people</span> Usuarios</a></li>
                <li class="hvr-underline-from-center"><a href=""><span class="inline-icon material-icons">admin_panel_settings</span> Clientes</a></li>
                <li class="hvr-underline-from-center"><a href="{{ route('sell.create') }}"><span class="inline-icon material-icons">sell</span> Ventas</a></li>
                <li class="hvr-underline-from-center"><a href=""><span class="inline-icon material-icons">percent</span> Productos</a></li>
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

        @yield('content')

        <footer>
            <div class="copyright">
                <p>&copy 2021 - Oscar Piña y Arturo Rodríguez</p>
            </div>
            <div class="social">
                <a href="#" class="support">Soporte técnico</a>
                <a href="#" class="face">f</a>
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/index.js') }}" defer></script>
</body>
</html>