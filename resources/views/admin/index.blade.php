@extends('templates.master')

@section('head-extras')
    <style>
        main {
            min-height: 91vh;
            display: grid;
            place-items: center;
        }

        main > div {
            width: 20%;
            height: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1.6rem;
            background-color: #4b4b4b;
            border-radius: 1rem;
        }

        main > div > a {
            padding: .3rem;
            font-size: 1.5rem;
            color: #ffffff;
        }

        main > div > a:hover {
            color: #939393;
        }
    </style>
@endsection

@section('main-content')
    <main>
        <div>
            <a href="#">Gestionar productos</a>
            <a href="#">Gestionar cotizaciones</a>
        </div>
    </main>
@endsection
