@extends('templates.admin')

@section('head-extras')
    <style>

        main span {
            margin-left: .5rem;
            color: white;
            padding: .5rem;
            font-size: 1rem;
            background-color: #3f930a;
            border-radius: 2rem;
        }

        .modal {
            position: fixed;
            width: 100vw;
            height: 100vh;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-bg {
            position: absolute;
            background: rgba(0, 0, 0, 0.7);
            width: 100%;
            height: 100%;
        }

        .modal-container {
            border-radius: 10px;
            background: #fff;
            position: relative;
            width: 20%;
            padding: 2rem;
        }

        .modal-close {
            position: absolute;
            right: 15px;
            top: 15px;
            outline: none;
            appearance: none;
            color: red;
            background: none;
            border: 0px;
            font-weight: bold;
            cursor: pointer;
        }

        .open {
            visibility: visible;
            opacity: 1;
            transition-delay: 0s;
        }

        form {
            width: 100%;
            height: fit-content;
            /*@media (height > 700px) {*/
            /*    height: 90%;*/
            /*}*/
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
            border: .1rem solid rgb(0, 0, 0);
            border-radius: .4rem;
            padding: .6rem;
            font-weight: normal !important;
        }

        form > select {
            width: 80%;
            font-weight: normal !important;
        }

        form > textarea {
            width: 80%;
            font-weight: normal !important;
        }

        hr {
            width: 80%;
            height: .5vh;
            background-color: #383838;
            border: 0;
            border-radius: 10px;
        }

        ::placeholder {
            font-size: .9rem;
            color: black;
        }

        button {
            margin-top: .5rem;
            width: 80%;
            padding: 0.6rem 0.5rem;
            border: 0;
            border-radius: 1rem;
            font-weight: bold;
            font-size: 1rem;
            background-color: #3f930a !important;
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

        form > strong {
            width: 100%;
            background-color: #f8d7da;
            color: #782736;
            border: .1rem solid #f6d1d5;
            border-radius: 1rem;
            padding: 1rem;
            margin-bottom: 1rem;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            console.log("DOM fully loaded and parsed");
            const modals = document.querySelectorAll("[data-modal]");

            modals.forEach(function (trigger) {
                trigger.addEventListener("click", function (event) {
                    event.preventDefault();
                    console.log('a')
                    const modal = document.getElementById(trigger.dataset.modal);
                    modal.classList.add("open");
                    const exits = modal.querySelectorAll(".modal-exit");
                    exits.forEach(function (exit) {
                        exit.addEventListener("click", function (event) {
                            event.preventDefault();
                            modal.classList.remove("open");
                        });
                    });
                });
            });
        });
    </script>
@endsection

@section('main-content')
    <main class="flex-grow p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-lg font-medium">Cotizacion - N{{$cotizacion->id}} <span><a href="#" data-modal="modificar-envio-{{$cotizacion->id}}">Establecer precio de envio</a></span></h1>
            <div class="modal" id="modificar-envio-{{$cotizacion->id}}">
                <div class="modal-bg modal-exit"></div>
                <div class="modal-container">
                    <form action="{{route('cotizaciones.update', $cotizacion->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        @if($errors->any())
                            <strong>
                                @foreach($errors->all() as $error)
                                    {{$error}}
                                @endforeach
                            </strong>
                        @endif
                        <label for="precio_envio">Establecer precio de envio</label>
                        <input type="number" id="precio_envio" name="precio_envio">
                        <button type="submit">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-full overflow-auto">
            <table class="w-full caption-bottom text-sm">
                <thead class="[&amp;_tr]:border-b">
                <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Imagen
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Nombre
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Cantidad
                    </th>

                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Precio
                    </th>

                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Acciones
                    </th>

                </tr>
                </thead>
                <tbody class="[&amp;_tr:last-child]:border-0">
                @foreach($detalles as $detalle)
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 w-20">
                            @if (file_exists(public_path('imagenes/P_' . $detalle->cod_producto . '.png')))
                                <img src="{{asset('imagenes/P_' . $detalle->cod_producto . '.png')}}">
                            @elseif(file_exists(public_path('imagenes/P_' . $detalle->cod_producto . '.jpg')))
                                <img src="{{asset('imagenes/P_' . $detalle->cod_producto . '.jpg')}}">
                            @elseif(file_exists(public_path('imagenes/P_' . $detalle->cod_producto . '.gif')))
                                <img src="{{asset('imagenes/P_' . $detalle->cod_producto . '.gif')}}">
                            @endif
                        </td>
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$detalle->producto->nombre}}</td>
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                            @if($detalle->precio_producto)
                                {{$detalle->precio_producto}}
                            @else
                                <a href="#" data-modal="modificar-producto-{{$detalle->producto->cod_producto}}">Modificar Precio</a>
                                <div class="modal" id="modificar-producto-{{$detalle->producto->cod_producto}}">
                                    <div class="modal-bg modal-exit"></div>
                                    <div class="modal-container">
                                        <form action="{{route('cotizaciones.updateDetalle', ['id'=>$cotizacion->id, 'cod_producto'=> $detalle->cod_producto])}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            @if($errors->any())
                                                <strong>
                                                    @foreach($errors->all() as $error)
                                                        {{$error}}
                                                    @endforeach
                                                </strong>
                                            @endif
                                            <label for="precio">Establecer precio de producto {{$detalle->producto->nombre}}</label>
                                            <input type="number" id="precio" name="precio">
                                            <button type="submit">Establecer</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
