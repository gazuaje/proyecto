@extends('scaffold-interface.layouts.defaultMaterialize')
@extends('layouts.app2')
@section('title','Index')
@section('content')

<div class = 'container'>
    <h1>
        departamento Index
    </h1>
    <div class="row">
        <form class = 'col s3' method = 'get' action = '{!!url("departamento")!!}/create'>
            <button class = 'btn red' type = 'submit'>Create New departamento</button>
        </form>
    </div>
    <table>
        <thead>
            <th>descripcion</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($departamentos as $departamento) 
            <tr>
                <td>{!!$departamento->descripcion!!}</td>
                <td>
                    <div class = 'row'>
                        <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/departamento/{!!$departamento->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                        <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/departamento/{!!$departamento->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                        <a href = '#' class = 'viewShow btn-floating orange' data-link = '/departamento/{!!$departamento->id!!}'><i class = 'material-icons'>info</i></a>
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $departamentos->render() !!}

</div>
@endsection