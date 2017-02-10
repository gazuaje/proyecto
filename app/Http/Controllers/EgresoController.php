<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Egreso;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Articulo;


use App\Departamento;


/**
 * Class EgresoController.
 *
 * @author  The scaffold-interface created at 2017-02-06 03:04:06pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - egreso';
        $egresos = Egreso::paginate(6);
        return view('egreso.index',compact('egresos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - egreso';
        
        $articulos = Articulo::all()->pluck('descripcion','id');
        
        $departamentos = Departamento::all()->pluck('descripcion','id');
        
        return view('egreso.create',compact('title','articulos' , 'departamentos'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $egreso = new Egreso();

        
        $egreso->cantidad = $request->cantidad;

        
        $egreso->fecha_egresos = $request->fecha_egresos;

        
        
        $egreso->articulo_id = $request->articulo_id;

        
        $egreso->departamento_id = $request->departamento_id;

        
        $egreso->save();
        
        $articulo = Articulo::findOrfail($request->articulo_id);
        
        $articulo->cant_total = $articulo->cant_total - $request->cantidad;
        
        $articulo->save();
        
        

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new egreso has been created !!']);

        return redirect('egreso');
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
        $title = 'Show - egreso';

        if($request->ajax())
        {
            return URL::to('egreso/'.$id);
        }

        $egreso = Egreso::findOrfail($id);
        return view('egreso.show',compact('title','egreso'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - egreso';
        if($request->ajax())
        {
            return URL::to('egreso/'. $id . '/edit');
        }

        
        $articulos = Articulo::all()->pluck('descripcion','id');

        
        $departamentos = Departamento::all()->pluck('descripcion','id');

        
        $egreso = Egreso::findOrfail($id);
        return view('egreso.edit',compact('title','egreso' ,'articulos', 'departamentos' ) );
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
        $egreso = Egreso::findOrfail($id);
    	
        $egreso->cantidad = $request->cantidad;
        
        $egreso->fecha_egresos = $request->fecha_egresos;
        
        
        $egreso->articulo_id = $request->articulo_id;

        
        $egreso->departamento_id = $request->departamento_id;

        
        $egreso->save();

        return redirect('egreso');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/egreso/'. $id . '/delete');

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
     	$egreso = Egreso::findOrfail($id);
     	$egreso->delete();
        return URL::to('egreso');
    }
}
