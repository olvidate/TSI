<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Aragun LTDA</title>
    @yield('head-extras')
</head>
<body>
    <main class="container-fluid" style="padding-top: 0;">
        <nav>
            <ul>
                <li><strong>Aragun LTDA</strong></li>
            </ul>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#" role="button">Iniciar sesión</a></li>
            </ul>
        </nav>
        @yield('main-content')
    </main>

    @yield('script-ref')
    @yield('script-extras')
</body>
</html>
