@extends('templates.master')

@section('head-extras')
    <style>
        .products-grid {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(25%, 1fr));
            gap: 20px;
            @media (width <= 600px) {
                grid-template-columns: repeat(auto-fill, minmax(100%, 1fr));
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
            min-height: 92vh;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 10%;
        }

        header > div {
            width: 50%;
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

        header div > p {
            width: 75%;
            text-align: left;
            word-break: break-word;
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
    @if(!empty(Auth::user()->rut_cliente))
        {{Auth::user()->rut_cliente}}
    @endif

    <header>
        <div>
            <h1>👷ARAGUN LTDA</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aperiam culpa doloremque ducimus facere illo laudantium minus natus nostrum placeat quaerat quas reiciendis reprehenderit ullam, vel voluptas voluptate voluptates voluptatibus.</p>
        </div>

        <div class="card">
            <img src="https://gtg.es/wp-content/uploads/2018/07/Imagen-Empresa-Seguridad-1000x689.jpg" alt="">
        </div>
    </header>

    <main>
        <section>
            <h1>Nuestros productos</h1>
            <div class="products-grid">
                @foreach($productos as $producto)
                    <div class="product-card">

                        <div class="cart-icon">
                            <a href="#">🛒 Añadir al carrito de cotización</a>
                        </div>

                        <div class="product-image">
                            <img src="https://www.terra-ws.cl/26-home_default/cono-de-senalizacion-vial-28-base-negra.jpg">
                        </div>
                        <div class="product-info">
                            <h5>Cono de Vial de Seguridad 28 base negra</h5>
                            <h5><a href="#">Acerca del producto</a></h5>
                        </div>
                    </div>
                @endforeach
            </div>
        <section>
    </main>
@endsection
