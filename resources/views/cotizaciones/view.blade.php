@extends('templates.master')

@section('head-extras')
    <style>
        main {
            width: 100vw;
            display: flex;
            margin-top: 10vh;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 1rem;
        }

        .list {
            width: 60%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            margin-left: 2rem;
        }

        .info {
            width: 40%;
            margin-right: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: start;
        }

        .list-container {
            width: 100%;
            background-color: #bdbdbd;
            color: white;
            padding: 1rem;
            border-radius: 1rem;
            max-width: 800px;
        }

        .list-item {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 1rem;
        }

        .list-item-figure img {
            width: 100px;
            height: 100px;
            max-width: 100px;
            object-fit: contain;
            mix-blend-mode: multiply;
        }

        .list-item-info {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .list-item-info h2 {
            color: black;
        }

        .list-item-info p {
            color: #5e4a00;
            text-align: left;
        }

        .price-info p {
            color: #2b2c34;
        }

        #available {
            color: #317700;

        }

        #no-available {
            color: red;
        }

        .info-card {
            width: 60%;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            background-color: #383838;
            color: white;
            border-radius: .75rem;
            gap: .25rem;
        }

        @media (max-width: 800px) {
            .info-card {
                width: 100%;
            }
        }

        .info-card h1 {
            text-decoration: underline #6394F8;
            margin-bottom: 1rem;
        }

        .info-card > form {
            margin-top: 1rem;
            width: 100%;
            display: flex;
            justify-content: center;
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

        .info-card > form > button {
            width: 100%;
            padding: .5rem;
            border-radius: 1rem;
            background-color: #6394F8;
        }

        .info-card > form > button:hover {
            color: #383838;
        }
    </style>
@endsection

@section('main-content')
    <main>
        <div class="list">
            @foreach($detalle_cotizacion as $detalle)
                <div class="list-container">
                    <div class="list-item">
                        <div class="list-item-figure">
                            @if (file_exists(public_path('imagenes/P_' . $detalle->cod_producto . '.png')))
                                <img src="{{asset('imagenes/P_' . $detalle->cod_producto . '.png')}}">
                            @elseif(file_exists(public_path('imagenes/P_' . $detalle->cod_producto . '.jpg')))
                                <img src="{{asset('imagenes/P_' . $detalle->cod_producto . '.jpg')}}">
                            @elseif(file_exists(public_path('imagenes/P_' . $detalle->cod_producto . '.gif')))
                                <img src="{{asset('imagenes/P_' . $detalle->cod_producto . '.gif')}}">
                            @else
                                <img src="https://th.bing.com/th/id/OIP.PbvnSZi33pv6KoKOZz-E_wHaHa?pid=ImgDet&rs=1" alt="">
                            @endif
                        </div>

                        <div class="list-item-info">
                            <div>
                                <h2>{{$detalle->producto->nombre}}</h2>
                                <p>{{$detalle->cantidad_producto}} unidades</p>
                            </div>

                            @if($detalle->cotizacion->estado == 1)
                                <div class="price-info">
                                    @if($detalle->precio_producto != null)
                                        <p id="available">$ {{number_format($detalle->precio_producto, 0, ',', '.')}}</p>
                                    @else
                                        <p id="no-available">Producto no disponible</p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($cotizacion->estado == 1)
            <div class="info">
                <div class="info-card">
                    <h1>Resumen de la cotización</h1>

                    <p>Total Productos: ${{number_format($detalle_cotizacion->sum('precio_producto'), 0, ',', '.')}}</p>
                    <p>Costo de envio: ${{number_format($cotizacion->precio_envio, 0, ',', '.')}}</p>
                    <p>Monto Neto: ${{number_format($cotizacion->monto_neto, 0, ',', '.')}}</p>
                    <p>Total IVA (19%): ${{number_format($cotizacion->monto_neto * 0.19, 0, ',', '.')}}</p>
                    <p>Precio Total: ${{number_format($cotizacion->monto_neto * 1.19, 0, ',', '.')}}</p>
                    <form action="{{route('factura.store')}}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="cotizacionId" value="{{$cotizacion->id}}">
                        <button type="submit">
                            Realizar pago
                        </button>
                    </form>
                </div>
            </div>
        @endif

        @if($detalle_cotizacion->isEmpty())
            <p>❌ No hay detalles en la cotización</p>
        @endif
    </main>
@endsection
