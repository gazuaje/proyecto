@extends('scaffold-interface.layouts.defaultMaterialize')
@extends('layouts.app2')
@section('title','Index')
@section('content')

<div class = 'container'>
    <h1>
       Consulta
    </h1>

 
    
  
        
        
           <form method = 'GET' action = '{!!url("buscar")!!}'>
                <select name = 'departamento_id'>
                @foreach($departamentos as  $key => $value) 
                <option value="{{$key}}">{{$value}}</option>
                @endforeach 
                </select>
                    <button class = 'btn red' type ='submit'>Consultar</button>
          </form>

</div>
@endsection