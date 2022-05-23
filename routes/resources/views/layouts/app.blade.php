<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lilita+One&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/auth/style.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div id="app">
    <div class="container-body">
        <nav class="nav-menu">
                <li class="logo"><a href="">Joyerias Brador</a></li>
                <div class="menu">
                <li class="hvr-underline-from-center"><a href="/"><span class="inline-icon material-icons">home</span> Inicio</a></li>
                    <li class="hvr-underline-from-center"><a href="/users"><span class="inline-icon material-icons">people</span> Usuarios</a></li>
                    <li class="hvr-underline-from-center"><a href=""><span class="inline-icon material-icons">admin_panel_settings</span> Clientes</a></li>
                    <li class="hvr-underline-from-center"><a href=""><span class="inline-icon material-icons">sell</span> Ventas</a></li>
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

        <main>
            @yield('content')
        </main>

        <script src="{{ asset('js/index.js') }}"></script>
        <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

        <!-- Alerts Code -->
        @if (session()->has('success'))
            <script>
                window.onload = Swal.fire({
                    title: 'Éxito!',
                    text: '{{ session("success") }}',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })
            </script>
        @endif

        @if (session()->has('error'))
            <script>
                window.onload = Swal.fire({
                    title: 'Error!',
                    text: '{{ session("error") }}',
                    icon: 'Error',
                    confirmButtonText: 'Cool'
                })
            </script>
        @endif
    </div>


</body>
</html>
