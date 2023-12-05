@extends('templates.admin')

@section('main-content')
    <main class="flex-grow p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-lg font-medium">Cotizaciones</h1>
        </div>
        <div class="w-full overflow-auto">
            <table class="w-full caption-bottom text-sm">
                <thead class="[&amp;_tr]:border-b">
                <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        ID
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        RUT Cliente
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Cantidad de productos
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Fecha de solicitud
                    </th>
                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Acciones
                    </th>
                    {{--                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0"></th>--}}
                </tr>
                </thead>
                <tbody class="[&amp;_tr:last-child]:border-0">
                @foreach($cotizaciones as $cotizacion)
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$cotizacion->id}}</td>
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$cotizacion->rut_cliente}}</td>
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$cotizacion->detallesCotizacion->count()}}</td>
                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$cotizacion->created_at}}</td>
                        <td class="p-4 flex gap-2 align-middle [&amp;:has([role=checkbox])]:pr-0">
                            <a href="{{route('admin.cotizaciones.reply', $cotizacion)}}"
                               class="justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-1 bg-yellow-600 text-white rounded-lg flex items-center space-x-2 text-sm"
                               type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M205 34.8c11.5 5.1 19 16.6 19 29.2v64H336c97.2 0 176 78.8 176 176c0 113.3-81.5 163.9-100.2 174.1c-2.5 1.4-5.3 1.9-8.1 1.9c-10.9 0-19.7-8.9-19.7-19.7c0-7.5 4.3-14.4 9.8-19.5c9.4-8.8 22.2-26.4 22.2-56.7c0-53-43-96-96-96H224v64c0 12.6-7.4 24.1-19 29.2s-25 3-34.4-5.4l-160-144C3.9 225.7 0 217.1 0 208s3.9-17.7 10.6-23.8l160-144c9.4-8.5 22.9-10.6 34.4-5.4z"/></svg>
                            </a>

{{--                            <form action="{{ route('productos.destroy', $cotizacion) }}" method="POST">--}}
{{--                                @method('DELETE')--}}
{{--                                @csrf--}}
{{--                                <button--}}
{{--                                    class="justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-1 bg-red-800 text-white rounded-lg flex items-center space-x-2 text-sm"--}}
{{--                                    type="submit">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>--}}
{{--                                </button>--}}
{{--                            </form>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
