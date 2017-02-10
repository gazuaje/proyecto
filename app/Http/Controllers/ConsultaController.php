<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Amranidev\Ajaxis\Ajaxis;
use URL;
use Anouar\Fpdf\Facades\Fpdf;
use App\Departamento;
use App\Articulo;
use App\Ingreso;
use App\Egreso;

class ConsultaController extends Controller
{
 public function index(Request $request)
 {
     
     
 }
         
         
         
       public function consulta(Request $request) 
               
          {
     
       $departamentos = Departamento::all()->pluck('descripcion','id');
       // $consulta = DB::table('departamentos')->get();

        //return view('consulta.index', ['consulta' => $consulta]);
       return view('consulta.index',compact('departamentos'  ));
    }
      public function buscar(Request $request) 
               
          {
          $depart = $request['departamento_id'];
          
                 

      $users = DB::table('ingresos')
            ->join('departamentos', 'departamentos.id', '=', 'ingresos.departamento_id')
              ->join('articulos', 'articulos.id', '=', 'ingresos.articulo_id')
            //->join('orders', 'users.id', '=', 'orders.user_id')
             ->where('ingresos.departamento_id', '=', $depart)
            ->select('ingresos.cantidad','ingresos.id','departamentos.descripcion','ingresos.fecha_ingresos','articulos.descripcion as des')
            ->get();
          $users2 = DB::table('egresos')
            ->join('departamentos', 'departamentos.id', '=', 'egresos.departamento_id')
            ->join('articulos', 'articulos.id', '=', 'egresos.articulo_id')
            //->join('orders', 'users.id', '=', 'orders.user_id')
             ->where('egresos.departamento_id', '=', $depart)
            ->select('egresos.cantidad','egresos.id','departamentos.descripcion','egresos.fecha_egresos','articulos.descripcion as des2')
            ->get();
    //die(var_dump($users));
      //return view('consulta.buscar',compact('users'));
       return view('consulta.buscar', ['users' => $users,'users2' => $users2 ]);
          }
          public function exportpdf() {
                          
               Fpdf::AddPage();
                Fpdf::SetFont('Arial','B',16);
                Fpdf::Cell(40,10,'Hello World!');
                   Fpdf::AddPage();
                Fpdf::Output();
                exit;

              } 

              
          
     
    
    
    
    
    
    
}
?>