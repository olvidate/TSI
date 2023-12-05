@extends('templates.master')

@section('head-extras')
    <style>

        main {
            width: 100%;
            display: flex;
            justify-content: center;
            padding-top: 5%;
        }

        main > aside {
            width: 20%;
            margin-left: 1rem;
            @media (width <= 1024px) {
               display: none;
            }
        }

        main > aside > hr {
            width: 50%;
            margin-top: 1rem;
        }

        main > aside > h2 {
            font-size: 2rem;
        }

        main > aside > ul {
            margin-top: 1rem;
            display: flex;
            flex-direction: column;
            list-style: none;
            gap: .5rem;
            align-items: start;
        }


        .products-grid {
            width: 80%;
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
                grid-template-columns: repeat(auto-fill, minmax(18%, 1fr));
            }
        }

        .product-card {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            padding: 1rem;
            background-color: white;
            /*border: 1px rgba(0,0,0,0.5) solid;*/
            border-radius: 1rem;
            margin-bottom: 20px;
            position: relative;
            max-width: 300px;
            max-height: 500px;
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
            word-break: break-word;
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

        .product-info-grid {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
        }

        .product-info-grid a {
            background-color: #2d3748;
            color: white;
            padding: .2rem;
            border-radius: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-info-grid button {
            background-color: #3f930a;
            color: white;
            padding: .5rem;
            border-radius: 1rem;
            text-align: center;
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

        .current {
            color: #2f4d81;
        }
    </style>
@endsection

@section('main-content')
    <main>
        <aside>
            <h2>Categorias</h2>
            <hr>
            <ul>
                @foreach($categorias as $c)
                    <li><a @if($c->cod_categoria == last(request()->segments())) class="current" @endif href="{{route('category', $c->cod_categoria)}}">{{$c->nombre}}</a></li>
                @endforeach
            </ul>
        </aside>

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
                        <h5>{{$producto->nombre}}</h5>
                        <div class="product-info-grid">
                            <a href="#">Acerca del producto</a>
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
    </main>
@endsection
