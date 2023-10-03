@extends('templates.master')

@section('main-content')
    <form class="container" method="POST" action="{{route('cliente.login')}}">
        @method('POST')
        @csrf
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" placeholder="Ingrese su correo electrónico" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" required>

        <!-- Button -->
        <button type="submit">Iniciar sesión</button>

    </form>
@endsection
