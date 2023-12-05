@inject('carbon', 'Carbon\Carbon')
@extends('templates.master')

@section('head-extras')
    <style>
        main {
            width: 100vw;
            display: flex;
            margin-top: 10vh;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1rem;
        }

        .list-container {
            width: 80vw;
            background-color: #bdbdbd;
            color: black;
            padding: 1rem;
            border-radius: 1rem;
            max-width: 800px;
        }

        .list-item {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .list-item div {
            display: flex;
            justify-content: space-between;
        }

        .list-item div > h3 {
            color: #000;
        }

        .status-0 {
            color: white;
            background-color: #36709f;
            padding: .4rem;
            border-radius: 1rem;
        }

        .status-1 {
            color: white;
            background-color: #3f930a;
            padding: .4rem;
            border-radius: 1rem;
        }

        .status-2 {
            color: white;
            background-color: #6f33cb;
            padding: .4rem;
            border-radius: 1rem;
        }

    </style>
@endsection

@section('main-content')
    <main>
    @foreach($cotizaciones as $cotizacion)
            <div class="list-container">
                <div class="list-item">
                    <div>
                        <h2 style="font-size: 1.6rem">
                            Cotización Nº{{$cotizacion->id}}
                        </h2>
                        <time datetime="{{$cotizacion->created_at}}">{{$carbon::parse($cotizacion->created_at)->locale('es_ES')->diffForHumans()}}</time>
                    </div>
                    <div>
                        <h3>{{$cotizacion->detallesCotizacion->count()}} @if(($cotizacion->detallesCotizacion->count()>1)) productos @else producto @endif</h3>

                        @if($cotizacion->estado == 0)
                            <a class="status-{{$cotizacion->estado}}" href="{{route('cotizaciones.view', $cotizacion->id)}}">
                                Detalles
                            </a>
                        @elseif($cotizacion->estado == 1)
                            <a class="status-{{$cotizacion->estado}}" href="{{route('cotizaciones.view', $cotizacion->id)}}">
                                Cotizacion
                            </a>
                        @elseif($cotizacion->estado == 2)
                            <a class="status-{{$cotizacion->estado}}" href="{{route('factura.download', $cotizacion->id)}}">
                                Descargar Factura
                            </a>
                        @endif

                    </div>
                </div>
            </div>
    @endforeach

    @if($cotizaciones->isEmpty())
        <p>❌ No tienes ninguna cotización realizada</p>
    @endif
    </main>
@endsection
