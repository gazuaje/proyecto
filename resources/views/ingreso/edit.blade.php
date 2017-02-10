@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Edit')
@section('content')

<div class = 'container'>
    <h1>
        Edit ingreso
    </h1>
    <form method = 'get' action = '{!!url("ingreso")!!}'>
        <button class = 'btn blue'>ingreso Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("ingreso")!!}/{!!$ingreso->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="input-field col s6">
            <input id="cantidad" name = "cantidad" type="text" class="validate" value="{!!$ingreso->
            cantidad!!}"> 
            <label for="cantidad">cantidad</label>
        </div>
        <div class="input-field col s6">
            <input id="fecha_ingresos" name = "fecha_ingresos" type="text" class="validate" value="{!!$ingreso->
            fecha_ingresos!!}"> 
            <label for="fecha_ingresos">fecha_ingresos</label>
        </div>
        <div class="input-field col s12">
            <select name = 'departamento_id'>
                @foreach($departamentos as $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
            </select>
            <label>departamentos Select</label>
        </div>
        <div class="input-field col s12">
            <select name = 'articulo_id'>
                @foreach($articulos as $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
            </select>
            <label>articulos Select</label>
        </div>
        <button class = 'btn red' type ='submit'>Update</button>
    </form>
</div>
@endsection