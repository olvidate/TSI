<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">--}}
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
            width: 100%;
            height: 8vh;
            display: flex;
            position: sticky;
            justify-content: space-between;
            align-items: center;
            padding: 0 10%;
            color: white;
            margin-bottom: 1vh;
            z-index: 2;
        }

        nav > h1 > a {
            color: #2b2c34;
        }

        nav > ul {
            display: flex;
            text-align: end;
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

    </style>

    @yield('head-extras')
</head>
<body>
    <nav>
        <h1><a href="{{route('home.index')}}">🛠️ARAGUN</a></h1>

        <ul>
            <li><a href="{{route('home.login')}}">ÚNETE</a></li>
        </ul>
    </nav>

    @yield('main-content')

    @yield('script-ref')
    @yield('script-extras')
</body>
</html>
