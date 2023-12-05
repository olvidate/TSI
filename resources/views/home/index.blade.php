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
            padding: 1rem;
            background-color: white;
            /*border: 1px rgba(0,0,0,0.5) solid;*/
            border-radius: 1rem;
            margin-bottom: 20px;
            position: relative;
            max-width: 300px;
            max-height: 450px;
            box-shadow: 0 14px 30px rgba(0, 0, 0, .2);
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
            padding: 1rem;
            font-size: 1rem;
            color: #2b2c34;
        }

        .product-info > h5 > a {
            color: white;
            background-color: black;
            padding: .5rem;
            border-radius: 1rem;
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

        header div > div {
            margin-top: 1rem;
        }

        header div > div a {
            font-size: 1.5rem;
            background-color: #0094e8;
            color: white;
            padding: .5rem;
            border-radius: 1rem;
        }

        header div > div a:hover {
            background-color: #00507e;
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
            background-color: #eee;
        }

        main {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-info-grid {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
        }

        .product-info-grid form {
            width:100%;
        }

        /* .product-info-grid a {
            background-color: #2d3748;
            color: white;
            padding: .2rem;
            border-radius: 1rem;
        } */

        .product-info-grid button {
            width: 100%;
            background-color: #3f930a;
            color: white;
            padding: .2rem;
            border-radius: 1rem;
        }

        .product-footer {
            width: 100%;
            display: flex;
            justify-content: center;
            text-align: center;
            background-color: white;
            padding: 0 2rem;
        }

        .product-footer a {
            background-color: #eee;
            box-shadow: 0 14px 30px rgba(0, 0, 0, .2);
            border-radius: 1rem;
            padding: 1rem;
            margin-top: 10%;
            font-size: 2rem;
            margin-bottom: 10%;
        }

        .product-footer a:hover {
            color: #0094e8;
        }

        main > section > h1 {
            padding: 5% 0 0 0;
            color: black;
            text-align: center;
        }


        main > section .products-grid {
            padding: 5% 10% 5% 10%;
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
    </style>
@endsection

@section('main-content')
    <header>
        <div>
            <h1>👷<br>ARAGUN LTDA</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aperiam culpa doloremque ducimus facere illo laudantium minus natus nostrum placeat quaerat quas reiciendis reprehenderit ullam, vel voluptas voluptate voluptates voluptatibus.</p>
            <div>
                <a href="{{route('productos.index')}}">Nuestros productos</a>
            </div>
        </div>

        <div class="card">
            <img src="https://gtg.es/wp-content/uploads/2018/07/Imagen-Empresa-Seguridad-1000x689.jpg" alt="">
        </div>
    </header>

    <main>
        <section>
            <h1>Algunos de nuestros productos</h1>
            <div class="products-grid">
                @foreach($productos as $producto)
                    <div class="product-card">
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
                            <h5>{{$producto->nombre}} @if($producto->tallas->nombre != 'No posee') - {{$producto->tallas->nombre}} @endif</h5>
                            <div class="product-info-grid">
                                <!-- <a href="#">Acerca del producto</a> -->
                                <form action="{{route('cart.add')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$producto->cod_producto}}">
                                    <button type="submit" name="btn">Añadir al carro</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="product-footer">
                <a href="{{route('productos.index')}}">Presiona para ver más productos</a>
            </div>
        <section>
    </main>
@endsection
