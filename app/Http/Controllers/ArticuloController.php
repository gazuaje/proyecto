<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Articulo;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class ArticuloController.
 *
 * @author  The scaffold-interface created at 2017-02-06 03:02:10pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - articulo';
        $articulos = Articulo::paginate(6);
        return view('articulo.index',compact('articulos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - articulo';
        
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulo = new Articulo();

        
        $articulo->descripcion = $request->descripcion;

        
        $articulo->cant_total = $request->cant_total;

        
        
        $articulo->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new articulo has been created !!']);

        return redirect('articulo');
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
        $title = 'Show - articulo';

        if($request->ajax())
        {
            return URL::to('articulo/'.$id);
        }

        $articulo = Articulo::findOrfail($id);
        return view('articulo.show',compact('title','articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - articulo';
        if($request->ajax())
        {
            return URL::to('articulo/'. $id . '/edit');
        }

        
        $articulo = Articulo::findOrfail($id);
        return view('articulo.edit',compact('title','articulo'  ));
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
        $articulo = Articulo::findOrfail($id);
    	
        $articulo->descripcion = $request->descripcion;
        
        $articulo->cant_total = $request->cant_total;
        
        
        $articulo->save();

        return redirect('articulo');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/articulo/'. $id . '/delete');

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
     	$articulo = Articulo::findOrfail($id);
     	$articulo->delete();
        return URL::to('articulo');
    }
}
