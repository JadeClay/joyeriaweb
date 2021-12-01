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
    
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/landing-page.css') }}" />
    <title>Joyerias Brador</title>
</head>
<body>
    <div class="container">
        <nav class= "nav-menu">
            <li><a href="">Joyerias Brador</a></li>
            <li class="active"><a href=""><span class="inline-icon material-icons">home</span> Inicio</a></li>
            <li class="hvr-underline-from-center"><a href=""><span class="inline-icon material-icons">people</span> Usuarios</a></li>
            <li class="hvr-underline-from-center"><a href=""><span class="inline-icon material-icons">admin_panel_settings</span> Clientes</a></li>
            <li class="hvr-underline-from-center"><a href=""><span class="inline-icon material-icons">sell</span> Ventas</a></li>
        </nav>

        <div class="landing-text">
            <p>Joyerias Brador</p>
            <p>Bienvenido, {{ Auth::user()->name }}</p>
        </div>

        <footer>

        </footer>
    </div>
</body>
</html>
