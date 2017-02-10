@extends('scaffold-interface.layouts.defaultMaterialize')
@extends('layouts.app2')
@section('title','Index')
@section('content')

<div class = 'container'>
    <h1>
        articulo Index
    </h1>
    <div class="row">
        <form class = 'col s3' method = 'get' action = '{!!url("articulo")!!}/create'>
            <button class = 'btn red' type = 'submit'>Create New articulo</button>
        </form>
    </div>
    <table>
        <thead>
            <th>descripcion</th>
            <th>cant_total</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($articulos as $articulo) 
            <tr>
                <td>{!!$articulo->descripcion!!}</td>
                <td>{!!$articulo->cant_total!!}</td>
                <td>
                    <div class = 'row'>
                        <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/articulo/{!!$articulo->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                        <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/articulo/{!!$articulo->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                        <a href = '#' class = 'viewShow btn-floating orange' data-link = '/articulo/{!!$articulo->id!!}'><i class = 'material-icons'>info</i></a>
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $articulos->render() !!}

</div>
@endsection