@extends('templates.admin')

@section('head-extras')
    <style>
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

        .modal form {
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
            border-radius: .4rem;
            padding: .6rem;
            border: .1rem solid rgb(0, 0, 0);
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

        .modal form > button {
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

        a {
            cursor: pointer;
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
            <h1 class="text-lg font-medium">Colores</h1>
            <a data-modal="crear-color"
               class="justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-2 py-1 bg-green-800 text-white rounded-lg flex items-center space-x-2 text-sm"
               type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="1em" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                <span>Crear color</span>
            </a>

            <div class="modal" id="crear-color">
                <div class="modal-bg modal-exit"></div>
                <div class="modal-container">
                    <form action="{{route('color.store')}}" method="POST">
                        @csrf
                        @method('POST')
                        @if($errors->any())
                            <strong>
                                @foreach($errors->all() as $error)
                                    {{$error}}
                                @endforeach
                            </strong>
                        @endif
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre">
                        <button type="submit">Crear</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-full overflow-auto">
            <table class="w-full caption-bottom text-sm">
                <thead class="[&amp;_tr]:border-b">
                <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        #ID
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Nombre
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Acciones
                    </th>
                    {{--                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0"></th>--}}
                </tr>
                </thead>
                <tbody class="[&amp;_tr:last-child]:border-0">
                @foreach($colores as $color)
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$color->id}}</td>
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$color->nombre}}</td>
                        <td class="p-4 flex gap-4 align-middle [&:has([role=checkbox])]:pr-0">
                            <a href="#" data-modal="modificar-color-{{$color->id}}"
                               class="justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-1 bg-yellow-400 text-white rounded-lg flex items-center space-x-2 text-sm"
                               type="submit">
                                <svg fill="black" xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z"/></svg>
                            </a>

                            <form action="{{ route('color.destroy', $color->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button
                                    class="justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-1 bg-red-800 text-white rounded-lg flex items-center space-x-2 text-sm"
                                    type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                </button>
                            </form>

                            <div class="modal" id="modificar-color-{{$color->id}}">
                                <div class="modal-bg modal-exit"></div>
                                <div class="modal-container">
                                    <form action="{{route('color.update', $color->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        @if($errors->any())
                                            <strong>
                                                @foreach($errors->all() as $error)
                                                    {{$error}}
                                                @endforeach
                                            </strong>
                                        @endif
                                        <label for="nombre">Nombre</label>
                                        <input type="text" id="nombre" name="nombre" value="{{$color->nombre}}">
                                        <button type="submit">Actualizar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
