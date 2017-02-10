@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Create')
@section('content')

<div class = 'container'>
    <h1>
        Create departamento
    </h1>
    <form method = 'get' action = '{!!url("departamento")!!}'>
        <button class = 'btn blue'>departamento Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("departamento")!!}'>
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>
        <div class="input-field col s6">
            <input id="descripcion" name = "descripcion" type="text" class="validate">
            <label for="descripcion">descripcion</label>
        </div>
        <button class = 'btn red' type ='submit'>Create</button>
    </form>
</div>
@endsection