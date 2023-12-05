@extends('templates.master')

@section('head-extras')
    <style>



        main {
            margin-top: 4rem;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        button {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
        }


        section {
            width: 60%;
        }

        .separator {
            width: 100%;
            display: flex;
            justify-content: space-between;
            gap: 5rem;
        }

        .list-tile-container {
            width: 100%;
            /*background-color: #718096;*/
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .summary-container {
            width: 60%;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .summary-container a {
            width: 100%;
            background-color: #6394F8;
            padding: .5rem 1rem;
            border-radius: 1rem;
            text-align: center;
            color: white;
        }

        .summary-container a:hover {
            cursor: pointer;
            color: #383838;
        }

        .list-tile {
            width: 100%;
            padding: 1rem;
            background-color: #b9b9b9;
            border-radius: 2rem;
        }

        .tile-separator {
            display: flex;
        }

        .list-tile img {
            min-width: 50px;
            width: 15%;
            height: 100%;
        }

        .tile-item-info {
            display: flex;
            width: 100%;
            flex-direction: row;
            justify-content: space-between;
        }

        .tile-item-info > div {
            padding: 1rem;
        }

        .tile-item-data {
            width: 75%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .options {
            width: 25%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: .5rem;
            color: black;
        }

        .list-tile a {
            color: black;
            width: fit-content;
        }

        .options a {
            background-color: #797979;
            min-width: 30px;
            width: 2rem;
            height: 2rem;
            min-height: 25px;
            color: white;
            border-radius: 1rem;
            border: 1px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        img {
            mix-blend-mode: multiply;
        }

        p > a {
            color: #6394F8;
            text-decoration: #6394F8 wavy underline;
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

    <main>
        <section>
            <div class="separator">
                <div class="list-tile-container">
                    <h2>Carro de Cotizacion</h2>
                    @if(Cart::count())
                        @foreach(Cart::content() as $item)
                            <div class="list-tile">
                                <div class="tile-separator">
                                    @if (file_exists(public_path('imagenes/P_' . $item->id . '.png')))
                                        <img src="{{asset('imagenes/P_' . $item->id . '.png')}}">
                                    @elseif(file_exists(public_path('imagenes/P_' . $item->id . '.jpg')))
                                        <img src="{{asset('imagenes/P_' . $item->id . '.jpg')}}">
                                    @elseif(file_exists(public_path('imagenes/P_' . $item->id . '.gif')))
                                        <img src="{{asset('imagenes/P_' . $item->id . '.gif')}}">
                                    @else
                                        <img src="https://th.bing.com/th/id/OIP.PbvnSZi33pv6KoKOZz-E_wHaHa?pid=ImgDet&rs=1" alt="">
                                    @endif
                                    <div class="tile-item-info">
                                        <div class="tile-item-data">
                                            <a href="">{{$item->name}}</a>
                                            <a href="">{{$productos->find($item->id)->nombre_marca}}</a>
                                        </div>

                                        <div class="options">
                                            <a href="{{route('cart.decrement', $item->rowId)}}">-</a>
                                            <p>{{$item->qty}}</p>
                                            <a href="{{route('cart.increment', $item->rowId)}}">+</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p style="color: red">❌ No hay productos en el carro de cotización</p>
                    @endif
                </div>
                <div class="summary-container">
                    <h2>Continuar con la cotización</h2>

                    @if(!empty(Auth::user()))
                        <a data-modal="solicitar-cotizacion">Solicitar cotizacion</a>

                        <div class="modal" id="solicitar-cotizacion">
                            <div class="modal-bg modal-exit"></div>
                            <div class="modal-container">
                                <form action="{{route('cart.store')}}" method="post">
                                    @csrf
                                    @method('POST')
                                    @if($errors->any())
                                        <strong>
                                            @foreach($errors->all() as $error)
                                                {{$error}}
                                            @endforeach
                                        </strong>
                                    @endif
                                    <label for="direccion">Dirección de envio</label>
                                    <input type="text" id="direccion" name="direccion">
                                    <label for="tlf">Teléfono de contacto</label>
                                    <input type="tel" id="tlf" name="tlf">
                                    <button type="submit">Solicitar cotización</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <p class="text-error"><a href="{{route('home.login')}}">Inicia sesión</a> para continuar con la solicitud</p>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection
