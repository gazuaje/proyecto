@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Edit')
@section('content')

<div class = 'container'>
    <h1>
        Edit egreso
    </h1>
    <form method = 'get' action = '{!!url("egreso")!!}'>
        <button class = 'btn blue'>egreso Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("egreso")!!}/{!!$egreso->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="input-field col s6">
            <input id="cantidad" name = "cantidad" type="text" class="validate" value="{!!$egreso->
            cantidad!!}"> 
            <label for="cantidad">cantidad</label>
        </div>
        <div class="input-field col s6">
            <input id="fecha_egresos" name = "fecha_egresos" type="text" class="validate" value="{!!$egreso->
            fecha_egresos!!}"> 
            <label for="fecha_egresos">fecha_egresos</label>
        </div>
        <div class="input-field col s12">
            <select name = 'articulo_id'>
                @foreach($articulos as $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
            </select>
            <label>articulos Select</label>
        </div>
        <div class="input-field col s12">
            <select name = 'departamento_id'>
                @foreach($departamentos as $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
            </select>
            <label>departamentos Select</label>
        </div>
        <button class = 'btn red' type ='submit'>Update</button>
    </form>
</div>
@endsection