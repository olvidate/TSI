<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src='https://cdn.tailwindcss.com'></script>
</head>
<body>

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
        background-color: #ada300 !important;
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

<div class="flex">
    <aside class="sticky top-0 h-screen w-56 bg-gray-100 text-gray-800 p-4">
        <div class="flex items-center mb-4 space-x-1">
            <a href="{{route('home.index')}}"><h1 class="text-lg font-medium"><span><👷></span> ARAGUN</h1></a>
        </div>
        <nav class="space-y-2">
            <a href="#"
               class="w-full flex items-center space-x-2 bg-gray-200 active:bg-gray-300 py-2 px-2 rounded-lg text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class=" w-4 h-4">
                    <path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"></path>
                    <path d="M3 5v14a2 2 0 0 0 2 2h16v-5"></path>
                    <path d="M18 12a2 2 0 0 0 0 4h4v-4Z"></path>
                </svg>
                <span class="text-sm font-medium">Productos</span>
            </a>
            <a href="#"
               class="w-full flex items-center space-x-2 hover:bg-gray-200 active:bg-gray-300 py-2 px-2 rounded-lg text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class=" w-4 h-4">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span class="text-sm font-medium">Clientes</span></a>
            <a href="#"
               class="w-full flex items-center space-x-2 hover:bg-gray-200 active:bg-gray-300 py-2 px-2 rounded-lg text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class=" w-4 h-4">
                    <path
                        d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"></path>
                    <path d="M13 5v2"></path>
                    <path d="M13 17v2"></path>
                    <path d="M13 11v2"></path>
                </svg>
                <span class="text-sm font-medium">Cotizaciones</span>
            </a>
        </nav>
    </aside>

    <main>
        <section>
            <h1>✍️ Editar producto</h1>
            <hr>
            <form method="POST" enctype="multipart/form-data" action="{{route('productos.update', $producto)}}">
                @method('PUT')
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
                <input type="text" class="border border-gray-300" id="cod_producto" name="cod_producto" value="{{$producto->cod_producto}}" placeholder="Ingrese el código de producto" required>

                <label for="cod_categoria">Categoria</label>
                <select id="cod_categoria" name="cod_categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    @foreach($categorias as $categoria)
                        <option value="{{$categoria->cod_categoria}}" @if($categoria->cod_categoria === $producto->cod_categoria) selected @endif>{{$categoria->nombre}}</option>
                    @endforeach
                </select>

                <label for="nombre">Nombre del producto</label>
                <input type="text" class="border border-gray-300" id="nombre" name="nombre" value="{{$producto->nombre}}" placeholder="Ingrese el nombre del producto" required>

                <label for="message">Descripción del producto</label>
                <textarea id="message" rows="4" name="descripcion" class="block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Ingresa la descripción del producto">{{$producto->descripcion}}</textarea>

                <label for="marca">Nombre de la marca</label>
                <input type="text" class="border border-gray-300" id="marca" name="marca" value="{{$producto->nombre_marca}}" placeholder="Ingrese el nombre de la marca" required>

                <label for="id_talla">Talla del producto</label>
                <select id="id_talla" name="id_talla" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    @foreach($tallas as $talla)
                        <option value="{{$talla->id}}" @if($talla->id === $producto->id_talla) selected @endif>{{$talla->nombre}}</option>
                    @endforeach
                </select>

                <label for="id_color">Color del producto</label>
                <select id="id_color" name="id_color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    @foreach($colores as $color)
                        <option value="{{$color->id}}" @if($color->id === $producto->id_color) selected @endif>{{$color->nombre}}</option>
                    @endforeach
                </select>


                <label for="file_input">Imagen del producto</label>
                <input class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="file_input" name="foto" type="file">

                <!-- Button -->
                <button type="submit">Editar producto</button>

            </form>
            <a href="{{route('productos.index')}}">o regresar a la página anterior</a>
        </section>
    </main>
</div>
</body>
</html>
