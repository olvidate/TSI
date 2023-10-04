@extends('templates.master')

@section('head-extras')
    <style>
        .products-grid {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(22%, 1fr));
            gap: 20px;
            @media (max-width: 600px) {
                grid-template-columns: repeat(auto-fill, minmax(100%, 1fr)); /* Ocupar todo el ancho en dispositivos móviles */
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

        .product-card .asd {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 10%;
            height: 5%;
            color: white;
            background-color: darkgreen;
            position: absolute;
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
            color: forestgreen;
        }

        img {
            mix-blend-mode: multiply;
        }
    </style>
@endsection

@section('main-content')
    @if(!empty(Auth::user()->rut_cliente))
        {{Auth::user()->rut_cliente}}
    @endif

    <main>
        <section class="products-grid">
            @foreach($productos as $producto)
                <div class="product-card">

                    <div class="asd">
                        <small>+</small>
                    </div>

                    <div class="product-image">
                        <img src="https://www.terra-ws.cl/26-home_default/cono-de-senalizacion-vial-28-base-negra.jpg">
                    </div>
                    <div class="product-info">
                        <h5>Cono de Vial de Seguridad 28 base negra</h5>
                        <h5><a href="#">Cotizar</a></h5>
                    </div>
                </div>
            @endforeach
        <section>
    </main>
@endsection
