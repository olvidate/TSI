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
            height: 100%;
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
            font-size: 1.1rem;
            font-weight: normal;
            color: black;
            text-align: left;
        }

        form > input {
            width: 80%;
            height: 50px;
            border: .1rem solid rgb(0, 0, 0);
            border-radius: .4rem;
            padding: 0 .5rem;
            font-weight: normal !important;
        }

        hr {
            width: 80%;
            height: .5%;
            background-color: #383838;
            border: 0;
            border-radius: 10px;
        }

        ::placeholder {
            font-size: .9rem;
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
            background-color: #3f930a;
            color: white;
        }

        section > a {
            text-decoration: underline;
            color: #2b2c34;
            font-size: 1rem;
        }

        ::selection {
            background: rgba(1,1,1,0.5);
            color: white;
        }

        [type=checkbox], [type=radio] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 1.25em;
            height: 1.25em;
            margin-top: -.125em;
            margin-right: .375em;
            margin-left: 0;
            -webkit-margin-start: 0;
            margin-inline-start: 0;
            -webkit-margin-end: .375em;
            margin-inline-end: .375em;
            border-width: var(--border-width);
            font-size: inherit;
            vertical-align: middle;
            cursor: pointer;
        }

        [type=checkbox][role=switch] {
            --border-width: 3px;
        }

        [type=checkbox][role=switch] {
            --background-color: #4f4f4f;
            --border-color: black;
            width: 2.25em;
            height: 1.25em;
            border: 1px solid var(--border-color);
            border-radius: 1.25em;
            background-color: var(--background-color);
            line-height: 1.25em;
        }

        [type=checkbox], [type=radio], [type=range], progress {
            accent-color: blue;
        }

        [type=checkbox][role=switch]:checked {
            --background-color: #004170;
            --border-color: black;
            border: 1px solid var(--border-color);
        }

        [type=checkbox][role=switch]:checked {
            background-image: none;
        }

        [type=checkbox][role=switch]:before {
            display: block;
            width: 1.25em;
            height: 100%;
            border-radius: 50%;
            background-color: white;
            content: "";
            transition: margin .1s ease-in-out;
        }

        [type=checkbox][role=switch]:checked::before {
            margin-left: calc(1.125em - 4px);
            -webkit-margin-start: calc(1.125em - 4px);
            margin-inline-start: calc(1.125em - 4px);
        }

        form > div {
            width: 100%;
            height: 30%;
            display: flex;
            justify-content: start;
            align-items: center;
            flex-direction: column;
            gap: .5rem;
        }

        form > div input {
            width: 80%;
            height: 50px;
            border: .1rem solid rgb(0, 0, 0);
            border-radius: .4rem;
            padding: 0 .5rem;
            font-weight: normal !important;
        }

        .disable {
            display: none !important;
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

        strong {
            width: 50%;
            background-color: #f8d7da;
            color: #782736;
            border: .1rem solid #f6d1d5;
            border-radius: 1rem;
            padding: 1rem;
            margin-bottom: 1rem;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formSwitch = document.getElementById('switch');
            const personData = document.getElementById('datos-persona');
            const enterpriseData = document.getElementById('datos-empresa');
            const rutLabel = document.getElementById('labelRut');

            formSwitch.addEventListener('change', function () {
                if (formSwitch.checked) {
                    personData.classList.add('disable');
                    enterpriseData.classList.remove('disable');
                    rutLabel.innerText = 'R.U.T Empresa (11223344-K)';
                } else {
                    rutLabel.innerText = 'R.U.T Persona (11223344-K)';
                    personData.classList.remove('disable');
                    enterpriseData.classList.add('disable');
                }
            });
        });
    </script>
@endsection

@section('main-content')
    <main>
        <section>
            @if($errors->any())
                <strong>
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </strong>
            @endif
            <h1>🔒 Registrarse</h1>
            <hr>
            <form method="POST" action="{{route('cliente.store')}}">
                @method('POST')
                @csrf
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="Ingrese su correo electrónico" required readonly onfocus="this.removeAttribute('readonly')">

                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" required readonly onfocus="this.removeAttribute('readonly')">

                <label for="rut" id="labelRut">R.U.T Persona (11223344-K)</label>
                <input type="text" id="rut" name="rut" value="{{old('rut')}}" placeholder="Ingrese su R.U.T" required >

                <label for="switch"><input type="checkbox" id="switch" name="switch" role="switch">Soy empresa</label>
                <div id="datos-persona">
                    <label for="firstname">Nombre</label>
                    <input type="text" id="firstname" name="firstname" value="{{old('firstname')}}" placeholder="Ingrese su nombre">

                    <label for="lastname">Apellido</label>
                    <input type="text" id="lastname" name="lastname" value="{{old('lastname')}}" placeholder="Ingrese su apellido">
                </div>

                <div id="datos-empresa" class="disable">
                    <label for="nombre_empresa">Nombre Empresa</label>
                    <input type="text" id="nombre_empresa" name="nombre_empresa" placeholder="Ingrese el nombre de la empresa">

                    <label for="holding_empresa">Holding Empresa</label>
                    <input type="text" id="holding_empresa" name="holding_empresa" placeholder="Ingrese el holding de la empresa">
                </div>
                <!-- Button -->
                <button type="submit" id="button">Registrarse</button>

            </form>
            <a href="{{route('home.login')}}">Tienes cuenta? <span>Inicia sesión🔑🔓</span></a>
        </section>
    </main>
@endsection
