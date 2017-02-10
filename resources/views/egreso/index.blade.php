@extends('scaffold-interface.layouts.defaultMaterialize')
@extends('layouts.app2')
@section('title','Index')
@section('content')

<div class = 'container'>
    <h1>
        egreso Index
    </h1>
    <div class="row">
        <form class = 'col s3' method = 'get' action = '{!!url("egreso")!!}/create'>
            <button class = 'btn red' type = 'submit'>Create New egreso</button>
        </form>
        <ul id="dropdown" class="dropdown-content">
            <li><a href="http://localhost:8000/articulo">Articulo</a></li>
            <li><a href="http://localhost:8000/departamento">Departamento</a></li>
        </ul>
        <a class="col s3 btn dropdown-button #1e88e5 blue darken-1" href="#!" data-activates="dropdown">Associate<i class="mdi-navigation-arrow-drop-down right"></i></a>
    </div>
    <table>
        <thead>
            <th>cantidad</th>
            <th>fecha_egresos</th>
            <th>descripcion</th>
            <th>cant_total</th>
            <th>deleted_at</th>
            <th>descripcion</th>
            <th>deleted_at</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($egresos as $egreso) 
            <tr>
                <td>{!!$egreso->cantidad!!}</td>
                <td>{!!$egreso->fecha_egresos!!}</td>
                <td>{!!$egreso->articulo->descripcion!!}</td>
                <td>{!!$egreso->articulo->cant_total!!}</td>
                <td>{!!$egreso->articulo->deleted_at!!}</td>
                <td>{!!$egreso->departamento->descripcion!!}</td>
                <td>{!!$egreso->departamento->deleted_at!!}</td>
                <td>
                    <div class = 'row'>
                        <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/egreso/{!!$egreso->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                        <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/egreso/{!!$egreso->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                        <a href = '#' class = 'viewShow btn-floating orange' data-link = '/egreso/{!!$egreso->id!!}'><i class = 'material-icons'>info</i></a>
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $egresos->render() !!}

</div>
@endsection