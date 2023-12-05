<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>🛠️ Aragun LTDA</title>
    <script src='https://cdn.tailwindcss.com'></script>

    <style>
        body {
            font-family: Inter, sans-serif;
        }
    </style>
</head>
<body>
    @yield('head-extras')
    <div class="flex">
        <aside class="sticky top-0 h-screen w-56 bg-gray-100 text-gray-800 p-4">
            <div class="flex items-center mb-4 space-x-1">
                <a href="{{route('home.index')}}"><h1 class="text-lg font-medium"><span><👷></span> ARAGUN</h1></a>
            </div>
            <nav class="space-y-2">
                <a href="{{route('admin.productos.index')}}"
                   class="w-full flex items-center space-x-2
                    @if(Route::current()->getName()=='admin.productos.index')
                        bg-gray-200 active:bg-gray-300 text-gray-800
                    @else
                        hover:bg-gray-200 active:bg-gray-300 text-gray-500
                    @endif
                    py-2 px-2 rounded-lg"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class=" w-4 h-4">
                        <path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"></path>
                        <path d="M3 5v14a2 2 0 0 0 2 2h16v-5"></path>
                        <path d="M18 12a2 2 0 0 0 0 4h4v-4Z"></path>
                    </svg>
                    <span class="text-sm font-medium">Productos</span>
                </a>
                <a href="{{route('admin.clientes.index')}}"
                   class="w-full flex items-center space-x-2
                    @if(Route::current()->getName()=='admin.clientes.index')
                        bg-gray-200 active:bg-gray-300 text-gray-800
                    @else
                        hover:bg-gray-200 active:bg-gray-300 text-gray-500
                    @endif
                    py-2 px-2 rounded-lg"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class=" w-4 h-4">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span class="text-sm font-medium">Clientes</span></a>
                <a href="{{route('admin.cotizaciones.index')}}"
                   class="w-full flex items-center space-x-2
                    @if(Route::current()->getName()=='admin.cotizaciones.index')
                        bg-gray-200 active:bg-gray-300 text-gray-800
                    @else
                        hover:bg-gray-200 active:bg-gray-300 text-gray-500
                    @endif
                    py-2 px-2 rounded-lg"
                >
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

                <a href="{{route('admin.categorias.index')}}"
                   class="w-full flex items-center space-x-2
                    @if(Route::current()->getName()=='admin.categorias.index')
                        bg-gray-200 active:bg-gray-300 text-gray-800
                    @else
                        hover:bg-gray-200 active:bg-gray-300 text-gray-500
                    @endif
                    py-2 px-2 rounded-lg"
                >
                    <svg fill="#6b7280" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class=" w-4 h-4">
                        <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>
                    <span class="text-sm font-medium">Categorias</span>
                </a>
            </nav>
        </aside>
        @yield('main-content')
    </div>
    @yield('script-ref')
    @yield('script-extras')
</body>
</html>
