<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @notifyCss
    <title>🛠️ Aragun LTDA</title>
    <style>


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #fff;
            overflow-x: hidden;
            font-family: Inter, sans-serif;
            font-weight: bold;
        }

        nav {
            width: 100% ;
            height: 8vh ;
            display: flex ;
            position: sticky ;
            justify-content: space-between ;
            align-items: center ;
            padding: 0 10% ;
            color: white ;
            margin-bottom: 1vh ;
            z-index: 2 ;
        }

        nav > h1 > a {
            color: #2b2c34 ;
        }

        nav > ul {
            display: flex ;
            text-align: end ;
            list-style: none;
            align-items: center;
        }

        nav > ul > li {
            padding: .8vw;
        }

        nav > ul > li a {
            font-size: 1.2rem;
        }

        a {
            text-decoration: none;
            color: #2b2c34;
        }

        a:hover {
            text-decoration: none;
        }

        h1 {
            font-size: 1.6rem;
        }

        .dropdown {
            display: block;
            position: relative;
        }

        .dropdown-content {
            display: none;
            width: 100%;
            height: fit-content;
            position: absolute;
            background-color: black;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: white;
        }

        .dropdown-content a:hover {
            color: #0094e8;
        }

        .dropdown-content ul {
            list-style: none;
        }

        nav a {
            text-transform: uppercase;
        }

        .badge {
            background-color: #6394F8;
            border-radius: 10px;
            color: white;
            display: inline-block;
            font-size: 12px;
            line-height: 1;
            padding: .2rem .5rem;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
        }

        div .pointer-events-auto {
            margin-top: 4rem;
        }
    </style>


    @yield('head-extras')
</head>
<body>
    <nav>
        <h1><a href="{{route('home.index')}}">🛠️ARAGUN</a></h1>

        <ul>
            <li><a href="{{route('cart.index')}}" id="cart"><i class="fa fa-shopping-cart"></i> <span class="badge">{{Cart::content()->count()}}</span></a></li>
            @if(!empty(Auth::user()))
                <li>
                    <div class="dropdown">
                        <a href="#">PANEL DE CONTROL</a>
                        <ul class="dropdown-content">
                            @if(Auth::user()->rol_id == 2)
                                <li>
                                    <a href="{{route('admin.productos.index')}}">Administración</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{route('cotizaciones.index')}}">Mis cotizaciones</a>
                            </li>
                            <li>
                                <a href="{{route('cliente.logout')}}">Cerrar sesión</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @else
                <li><a href="{{route('home.login')}}">ÚNETE</a></li>
            @endif
        </ul>
    </nav>


    @include('notify::components.notify')
    @yield('main-content')

    @yield('script-ref')
    @yield('script-extras')
    @notifyJs
</body>
</html>
