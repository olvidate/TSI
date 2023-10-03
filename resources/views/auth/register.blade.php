@extends('templates.master')

@section('head-extras')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .disable {
            display: none !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formSwitch = document.getElementById('formSwitch');
            const personData = document.getElementById('datos-persona');
            const enterpriseData = document.getElementById('datos-empresa');

            formSwitch.addEventListener('change', function () {
                if (formSwitch.checked) {
                    personData.classList.add('disable');
                    enterpriseData.classList.remove('disable');
                } else {
                    personData.classList.remove('disable');
                    enterpriseData.classList.add('disable');
                }
            });
        });
    </script>
@endsection

@section('main-content')
    <form class="container" method="POST" action="{{route('cliente.store')}}">
        @method('POST')
        @csrf
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" placeholder="Ingrese su correo electrónico" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" required>

        <label for="rut">RUT Persona/Empresa</label>
        <input type="number" id="rut" name="rut" placeholder="Ingrese su RUT" required>
        <small>Ingrese el R.U.T sin guión</small>


        <fieldset>
            <label for="formSwitch">
                <input type="checkbox" id="formSwitch" name="switch" role="switch">
                Soy una empresa
            </label>
        </fieldset>

        <div class="grid" id="datos-persona">
            <label for="nombre">
                Nombre
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre">
            </label>
            <label for="apellido">
                Apellido
                <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido">
            </label>
        </div>

        <div class="grid disable" id="datos-empresa">
            <label for="nombreEmpresa">
                Nombre Empresa
                <input type="text" id="nombreEmpresa" name="nombreEmpresa" placeholder="Ingrese el nombre de la empresa">
            </label>
            <label for="holding">
                Holding Empresa
                <input type="text" id="holding" name="holding" placeholder="Ingrese el holding de la empresa">
            </label>
        </div>

        <button type="submit">Registrar</button>

    </form>
@endsection
