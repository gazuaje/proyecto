
@extends('scaffold-interface.layouts.defaultMaterialize')
@extends('layouts.app2')
@section('title','Index')
@section('content')

<div class = 'container'>
    <h1>
        Consulta<a href = '{{url('/pdf')}}' class = 'fa-' data-link = "" ><h4> <i class="fa fa-file-pdf-o" style="color: red" aria-hidden="true"></i></h4></a>
    </h1>
    
    <table> <label><h4 style="color:black">Ingresos</h4> </label>
        <thead>
            <th>Id</th>
             <th>Descripcion</th>
             <th>Articulos</th>
             <th>Fecha de ingresos</th>
             <th>Cantidad total</th>
             <th>Actions</th>
        </thead>
        <tbody>
      
            @foreach($users as $egreso) 
            <tr>
                <td>{!!$egreso->id!!}</td>
                <td>{!!$egreso->descripcion!!}</td>
                <td>{!!$egreso->des!!}</td>
                 <td>{!!$egreso->fecha_ingresos!!}</td>
                <td>{!!$egreso->cantidad!!}</td>

        
             
            </tr>
            @endforeach
        </tbody>
    </table>
    
    
    
    <table><label><h4 style="color: black">Egresos</h4></label>
        <thead>
            <th>Id</th>
             <th>Descripcion</th>
             <th>Articulos</th>
             <th>Fecha de egresos</th>
             <th>Cantidad total</th>
             <th>Actions</th>
        </thead>
        <tbody>
      
          
          
            @foreach($users2 as $egreso2) 
           
            <tr>
                <td>{!!$egreso2->id!!}</td>
                <td>{!!$egreso2->descripcion!!}</td>
                <td>{!!$egreso2->des2!!}</td>
                <td>{!!$egreso2->fecha_egresos!!}</td>
                <td>{!!$egreso2->cantidad!!}</td>

      
              
            </tr>
            @endforeach 
        </tbody>
    </table>
   
    
</div>
@endsection