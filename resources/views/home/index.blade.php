@extends('templates.master')

@section('main-content')
    @if(!empty(Auth::user()->rut_cliente))
        {{Auth::user()->rut_cliente}}
    @endif

    @foreach($productos as $producto)
        {{$producto->cod_producto}}
    @endforeach
@endsection
