@extends('templates.master')

@section('head-extras')
    <style>
        main {
            width: 100%;
            height: calc(100vh - 9vh);
            display: grid;
            place-items: center;
        }

        section {
            position: relative;
            width: 100%;
            height: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 1vh;
            @media (width <= 1024px) and (width >= 650px) {
                width: 50%;
            }
            @media (width >= 1024px) {
                width: 30%;
            }
        }

        section > h1 {
            font-size: 2rem;
        }

        form {
            width: 100%;
            height: 100%;
            @media (height > 700px) {
                height: 50%;
            }
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: .5rem;
        }

        label {
            width: 80%;
            font-size: 1.2rem;
            font-weight: normal;
            color: black;
            text-align: left;
        }

        input {
            width: 80%;
            height: 15%;
            border: .1rem solid rgb(0, 0, 0);
            border-radius: .4rem;
            padding: 0 .5rem;
        }

        hr {
            width: 80%;
            height: 1%;
            background-color: #383838;
            border: 0;
            border-radius: 10px;
        }

        ::placeholder {
            font-size: 1rem;
            color: black;

        }

        #button {
            margin-top: .5rem;
            width: 80%;
            padding: 0.6rem 0.5rem;
            border: 0;
            border-radius: 1rem;
            font-weight: bold;
            font-size: 1rem;
            background-color: #2b2c34;
            color: white;
        }

        section > a {
            text-decoration: underline;
            color: #3f930a;
            font-size: 1rem;
        }

        ::selection {
            background: rgba(1,1,1,0.5);
            color: white;
        }

        #error {
            position: absolute;
            height: fit-content;
            top: 0;
            width: 50%;
            border-radius: 1rem;
            color: white;
            font-size: .9rem;
            padding: .4rem;
            background-color: #a10000;
        }
    </style>
@endsection

@section('main-content')
    <main>
        <section>
            <h1>🔓 Inicio de sesión</h1>
            <hr>
            @if($errors->any())
                <div id="error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{route('cliente.login')}}">
                @method('POST')
                @csrf
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" placeholder="Ingrese su correo electrónico" required readonly onfocus="this.removeAttribute('readonly')">

                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" required readonly onfocus="this.removeAttribute('readonly')">

                <!-- Button -->
                <button type="submit" id="button">🔑 Iniciar sesión</button>

            </form>
            <a href="{{route('home.register')}}">No tienes cuenta? <span>Regístrate☝️</span></a>
        </section>
    </main>
@endsection
