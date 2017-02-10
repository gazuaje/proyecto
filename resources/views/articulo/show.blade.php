@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Show')
@section('content')

<div class = 'container'>
    <h1>
        Show articulo
    </h1>
    <form method = 'get' action = '{!!url("articulo")!!}'>
        <button class = 'btn blue'>articulo Index</button>
    </form>
    <table class = 'highlight bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>descripcion : </i></b>
                </td>
                <td>{!!$articulo->descripcion!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>cant_total : </i></b>
                </td>
                <td>{!!$articulo->cant_total!!}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection