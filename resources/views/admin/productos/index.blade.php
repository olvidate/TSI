@extends('templates.admin')

@section('main-content')
    <main class="flex-grow p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-lg font-medium">Productos</h1>
            <a href="{{route('admin.productos.create')}}"
               class="justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-2 py-1 bg-green-800 text-white rounded-lg flex items-center space-x-2 text-sm"
               type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="1em" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                <span>Crear producto</span>
            </a>
        </div>
        <div class="w-full overflow-auto">
            <table class="w-full caption-bottom text-sm">
                <thead class="[&amp;_tr]:border-b">
                <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Codigo
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Imagen
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Nombre
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Descripción
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Categoria
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Talla
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Color
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Acciones
                    </th>
                    {{--                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0"></th>--}}
                </tr>
                </thead>
                <tbody class="[&amp;_tr:last-child]:border-0">
                @foreach($productos as $producto)
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$producto->cod_producto}}</td>
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 w-20">
                            @if (file_exists(public_path('imagenes/P_' . $producto->cod_producto . '.png')))
                                <img src="{{asset('imagenes/P_' . $producto->cod_producto . '.png')}}">
                            @elseif(file_exists(public_path('imagenes/P_' . $producto->cod_producto . '.jpg')))
                                <img src="{{asset('imagenes/P_' . $producto->cod_producto . '.jpg')}}">
                            @elseif(file_exists(public_path('imagenes/P_' . $producto->cod_producto . '.gif')))
                                <img src="{{asset('imagenes/P_' . $producto->cod_producto . '.gif')}}">
                            @endif
                        </td>
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$producto->nombre}}</td>
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$producto->descripcion}}</td>
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$producto->categoria->nombre}}</td>
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$producto->tallas->nombre}}</td>
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$producto->colores->nombre}}</td>
                        <td class="p-4 flex gap-2 align-middle [&amp;:has([role=checkbox])]:pr-0">
                            <a href="{{route('admin.productos.edit', $producto)}}"
                               class="justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-1 bg-yellow-600 text-white rounded-lg flex items-center space-x-2 text-sm"
                               type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="1em" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                            </a>

                            <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button
                                    class="justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-1 bg-red-800 text-white rounded-lg flex items-center space-x-2 text-sm"
                                    type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
