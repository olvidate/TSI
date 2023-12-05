@extends('templates.admin')

@section('head-extras')
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
        /*font-weight: bold;*/
    }

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
</style>
@endsection

@section('main-content')
    <main>
        <section>
            <h1>🆕 Nuevo producto</h1>
            <hr>
            <form method="POST" enctype="multipart/form-data" action="{{route('productos.store')}}">
                @method('POST')
                @csrf
                @if($errors->any())
                    <div id="error">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label for="cod_producto">Código de producto</label>
                <input type="text" class="border border-gray-300" id="cod_producto" name="cod_producto" placeholder="Ingrese el código de producto" disabled>

                <label for="cod_categoria">Categoria</label>
                <select id="cod_categoria" name="cod_categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    @foreach($categorias as $categoria)
                        <option value="{{$categoria->cod_categoria}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>

                <label for="nombre">Nombre del producto</label>
                <input type="text" class="border border-gray-300" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto" required>

                <label for="message">Descripción del producto</label>
                <textarea id="message" rows="4" name="descripcion" class="block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Ingresa la descripción del producto"></textarea>

                <label for="marca">Nombre de la marca</label>
                <input type="text" class="border border-gray-300" id="marca" name="marca" placeholder="Ingrese el nombre de la marca" required>

                <label for="id_talla">Talla del producto</label>
                <select id="id_talla" name="id_talla" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    @foreach($tallas as $talla)
                        <option value="{{$talla->id}}">{{$talla->nombre}}</option>
                    @endforeach
                </select>

                <label for="id_color">Color del producto</label>
                <select id="id_color" name="id_color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    @foreach($colores as $color)
                        <option value="{{$color->id}}">{{$color->nombre}}</option>
                    @endforeach
                </select>


                <label for="file_input">Imagen del producto</label>
                <input class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="file_input" name="foto" type="file">

                <!-- Button -->
                <button type="submit">Crear producto</button>

            </form>
            <a href="{{route('admin.productos.index')}}">o regresar a la página anterior</a>
        </section>
    </main>
@endsection
