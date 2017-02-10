@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Edit')
@section('content')

<div class = 'container'>
    <h1>
        Edit articulo
    </h1>
    <form method = 'get' action = '{!!url("articulo")!!}'>
        <button class = 'btn blue'>articulo Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("articulo")!!}/{!!$articulo->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="input-field col s6">
            <input id="descripcion" name = "descripcion" type="text" class="validate" value="{!!$articulo->
            descripcion!!}"> 
            <label for="descripcion">descripcion</label>
        </div>
        <div class="input-field col s6">
            <input id="cant_total" name = "cant_total" type="text" class="validate" value="{!!$articulo->
            cant_total!!}"> 
            <label for="cant_total">cant_total</label>
        </div>
        <button class = 'btn red' type ='submit'>Update</button>
    </form>
</div>
@endsection