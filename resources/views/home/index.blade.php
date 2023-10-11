@extends('templates.master')

@section('head-extras')
    <style>
        .products-grid {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100%, 1fr));
            gap: 20px;
            @media (width <= 600px) and (width >= 400px) {
                grid-template-columns: repeat(auto-fill, minmax(40%, 1fr));
            }

            @media (width <= 1024px) and (width >= 600px) {
                grid-template-columns: repeat(auto-fill, minmax(30%, 1fr));
            }

            @media (width >= 1024px) {
                grid-template-columns: repeat(auto-fill, minmax(22%, 1fr));
            }
        }

        .product-card {
            display: flex;
            flex-direction: column;
            padding: 2%;
            background-color: #d1d1e9;
            /*border: 1px rgba(0,0,0,0.5) solid;*/
            border-radius: 3px;
            margin-bottom: 20px;
            position: relative;
            max-width: 300px;
            max-height: 400px;
        }

        .product-card .cart-icon {
            display: none;
            justify-content: center;
            align-items: center;
            width: fit-content;
            padding: 0 .5rem;
            height: 5%;
            color: white;
            background-color: #3f930a;
            position: absolute;
            z-index: 1;
        }

        .product-card .cart-icon a {
            font-size: 1rem;
            color: white;
        }

        .product-card:hover {
            .cart-icon {
                display: flex;
            }
        }

        .product-card .cart-icon:hover {
            cursor: pointer;
        }

        .product-image img {
            width: 100%;
            height: 300px;
            max-width: 300px;
            object-fit: contain;
        }

        .product-info {
            /*margin-top: auto;*/
            margin: 0;
            text-align: center;
        }

        .product-info > h5 {
            padding: .4rem;
            font-size: 1rem;
            color: #2b2c34;
        }

        .product-info > h5 > a {
            text-decoration: underline;
            color: #2b2c34;
        }

        img {
            mix-blend-mode: multiply;
        }

        header {
            min-height: 91vh;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 10%;
        }

        header > div {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        header div > p {
            width: 75%;
            text-align: center;
            word-break: break-word;
        }

        header h1 {
            font-size: 2rem;
        }

        header .card {
            display: none;
            align-items: center;
            justify-content: center;
        }

        @media (width > 1024px) {

            header > div {
                display: block;
                width: 50%;
            }

            header > div p {
                text-align: left;
            }

            header .card {
                display: flex;
            }

            header h1 {
                font-size: 4rem;
            }
        }

        header .card > img {
            width: 75%;
            height: 75%;
            object-fit: contain;
            border-radius: 1rem;
        }

        section {
            background-color: #2b2c34;
        }

        main {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        main > section > h1 {
            padding: 5% 0 0 0;
            color: white;
            text-align: center;
        }


        main > section .products-grid {
            padding: 5% 10% 10% 10%;
        }
    </style>

@endsection

@section('main-content')
{{--    @if(!empty(Auth::user()->rut_cliente))--}}
{{--        Usuario logueado!--}}
{{--    @endif--}}

    <header>
        <div>
            <h1>👷<br>ARAGUN LTDA</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aperiam culpa doloremque ducimus facere illo laudantium minus natus nostrum placeat quaerat quas reiciendis reprehenderit ullam, vel voluptas voluptate voluptates voluptatibus.</p>
        </div>

        <div class="card">
            <img src="https://gtg.es/wp-content/uploads/2018/07/Imagen-Empresa-Seguridad-1000x689.jpg" alt="">
        </div>
    </header>

    <main>
        <section>
            <h1>Nuestros Productos</h1>
            <div class="products-grid">
                @foreach($productos as $producto)
                    <div class="product-card">

                        <div class="cart-icon">
                            <a href="#">🛒 Añadir al carrito de cotización</a>
                        </div>

                        <div class="product-image">
                            @if (file_exists(public_path('imagenes/P_' . $producto->cod_producto . '.png')))
                                <img src="{{asset('imagenes/P_' . $producto->cod_producto . '.png')}}">
                            @elseif(file_exists(public_path('imagenes/P_' . $producto->cod_producto . '.jpg')))
                                <img src="{{asset('imagenes/P_' . $producto->cod_producto . '.jpg')}}">
                            @elseif(file_exists(public_path('imagenes/P_' . $producto->cod_producto . '.gif')))
                                <img src="{{asset('imagenes/P_' . $producto->cod_producto . '.gif')}}">
                            @else
                                <img src="https://th.bing.com/th/id/OIP.PbvnSZi33pv6KoKOZz-E_wHaHa?pid=ImgDet&rs=1" alt="">
                            @endif
                        </div>
                        <div class="product-info">
                            <h5>{{$producto->nombre}}</h5>
                            <h5><a href="#">Acerca del producto</a></h5>
                        </div>
                    </div>
                @endforeach
            </div>
        <section>
    </main>
@endsection
