@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Show')
@section('content')

<div class = 'container'>
    <h1>
        Show departamento
    </h1>
    <form method = 'get' action = '{!!url("departamento")!!}'>
        <button class = 'btn blue'>departamento Index</button>
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
                <td>{!!$departamento->descripcion!!}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection