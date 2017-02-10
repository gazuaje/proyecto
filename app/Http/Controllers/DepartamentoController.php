<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departamento;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class DepartamentoController.
 *
 * @author  The scaffold-interface created at 2017-02-06 03:02:26pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - departamento';
        $departamentos = Departamento::paginate(6);
        return view('departamento.index',compact('departamentos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - departamento';
        
        return view('departamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departamento = new Departamento();

        
        $departamento->descripcion = $request->descripcion;

        
        
        $departamento->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new departamento has been created !!']);

        return redirect('departamento');
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
        $title = 'Show - departamento';

        if($request->ajax())
        {
            return URL::to('departamento/'.$id);
        }

        $departamento = Departamento::findOrfail($id);
        return view('departamento.show',compact('title','departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - departamento';
        if($request->ajax())
        {
            return URL::to('departamento/'. $id . '/edit');
        }

        
        $departamento = Departamento::findOrfail($id);
        return view('departamento.edit',compact('title','departamento'  ));
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
        $departamento = Departamento::findOrfail($id);
    	
        $departamento->descripcion = $request->descripcion;
        
        
        $departamento->save();

        return redirect('departamento');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/departamento/'. $id . '/delete');

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
     	$departamento = Departamento::findOrfail($id);
     	$departamento->delete();
        return URL::to('departamento');
    }
}
