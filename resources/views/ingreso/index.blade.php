
@extends('scaffold-interface.layouts.defaultMaterialize')
@extends('layouts.app2')
@section('title','Index')
@section('content')

<div class = 'container'>
    <h1>
        ingreso Index
    </h1>
    <div class="row">
        <form class = 'col s3' method = 'get' action = '{!!url("ingreso")!!}/create'>
            <button class = 'btn red' type = 'submit'>Create New ingreso</button>
        </form>
        <ul id="dropdown" class="dropdown-content">
            <li><a href="http://localhost:8000/departamento">Departamento</a></li>
            <li><a href="http://localhost:8000/articulo">Articulo</a></li>
        </ul>
        <a class="col s3 btn dropdown-button #1e88e5 blue darken-1" href="#!" data-activates="dropdown">Associate<i class="mdi-navigation-arrow-drop-down right"></i></a>
    </div>
    <table>
        <thead>
            <th>cantidad</th>
            <th>fecha_ingresos</th>
            <th>descripcion</th>
            <th>deleted_at</th>
            <th>descripcion</th>
            <th>cant_total</th>
            <th>deleted_at</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($ingresos as $ingreso) 
            <tr>
                <td>{!!$ingreso->cantidad!!}</td>
                <td>{!!$ingreso->fecha_ingresos!!}</td>
                <td>{!!$ingreso->departamento->descripcion!!}</td>
                <td>{!!$ingreso->departamento->deleted_at!!}</td>
                <td>{!!$ingreso->articulo->descripcion!!}</td>
                <td>{!!$ingreso->articulo->cant_total!!}</td>
                <td>{!!$ingreso->articulo->deleted_at!!}</td>
                <td>
                    <div class = 'row'>
                        <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/ingreso/{!!$ingreso->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                        <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/ingreso/{!!$ingreso->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                        <a href = '#' class = 'viewShow btn-floating orange' data-link = '/ingreso/{!!$ingreso->id!!}'><i class = 'material-icons'>info</i></a>
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $ingresos->render() !!}

</div>
@endsection