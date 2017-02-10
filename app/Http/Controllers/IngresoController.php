<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ingreso;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Departamento;
use App\Articulo;


/**
 * Class IngresoController.
 *
 * @author  The scaffold-interface created at 2017-02-06 03:03:30pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - ingreso';
        $ingresos = Ingreso::paginate(6);
        return view('ingreso.index',compact('ingresos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - ingreso';
        
        $departamentos = Departamento::all()->pluck('descripcion','id');
        
        $articulos = Articulo::all()->pluck('descripcion','id');
        
        return view('ingreso.create',compact('title','departamentos' , 'articulos'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingreso = new Ingreso();

        
        $ingreso->cantidad = $request->cantidad;

        
        $ingreso->fecha_ingresos = $request->fecha_ingresos;

        
        
        $ingreso->departamento_id = $request->departamento_id;

        
        $ingreso->articulo_id = $request->articulo_id;

        
        $ingreso->save();
        
        $articulo = Articulo::findOrfail($request->articulo_id);
        $articulo->cant_total = $articulo->cant_total + $request->cantidad;
        $articulo->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new ingreso has been created !!']);

        return redirect('ingreso');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - ingreso';

        if($request->ajax())
        {
            return URL::to('ingreso/'.$id);
        }

        $ingreso = Ingreso::findOrfail();
        return view('ingreso.show',compact('title','ingreso'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - ingreso';
        if($request->ajax())
        {
            return URL::to('ingreso/'. $id . '/edit');
        }

        
        $departamentos = Departamento::all()->pluck('descripcion','id');

        
        $articulos = Articulo::all()->pluck('descripcion','id');

        
        $ingreso = Ingreso::findOrfail($id);
        return view('ingreso.edit',compact('title','ingreso' ,'departamentos', 'articulos' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $ingreso = Ingreso::findOrfail($id);
    	
        $ingreso->cantidad = $request->cantidad;
        
        $ingreso->fecha_ingresos = $request->fecha_ingresos;
        
        
        $ingreso->departamento_id = $request->departamento_id;

        
        $ingreso->articulo_id = $request->articulo_id;

        
        $ingreso->save();

        return redirect('ingreso');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/ingreso/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$ingreso = Ingreso::findOrfail($id);
     	$ingreso->delete();
        return URL::to('ingreso');
    }
}
