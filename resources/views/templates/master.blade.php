<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">--}}
    <title>Aragun LTDA</title>

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

        header {
            width: 100%;
            height: 8vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10%;
            color: white;
            margin-bottom: 1vw;
        }

        header > h1 > a {
            color: #2b2c34;
        }

        header > ul {
            display: flex;
            text-align: end;
            list-style: none;
            align-items: center;
        }

        header > ul > li {
            padding: .8vw;
        }

        header > ul > li a {
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

        main {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 0 10%;
        }
    </style>

    @yield('head-extras')
</head>
<body>
    <header>
        <h1><a href="{{route('home.index')}}">ARAGUN</a></h1>

        <ul>
            <li><a href="{{route('home.login')}}">INICIA SESIÓN</a></li>
        </ul>
    </header>

    <main>
        @yield('main-content')
    </main>

    @yield('script-ref')
    @yield('script-extras')
</body>
</html>
