@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Show')
@section('content')

<div class = 'container'>
    <h1>
        Show ingreso
    </h1>
    <form method = 'get' action = '{!!url("ingreso")!!}'>
        <button class = 'btn blue'>ingreso Index</button>
    </form>
    <table class = 'highlight bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>cantidad : </i></b>
                </td>
                <td>{!!$ingreso->cantidad!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>fecha_ingresos : </i></b>
                </td>
                <td>{!!$ingreso->fecha_ingresos!!}</td>
            </tr>
            <tr>
                <td>
                    <b>
                        <i>descripcion : </i>
                        <b>
                        </td>
                        <td>{!!$ingreso->departamento->descripcion!!}</td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                <i>deleted_at : </i>
                                <b>
                                </td>
                                <td>{!!$ingreso->departamento->deleted_at!!}</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>
                                        <i>descripcion : </i>
                                        <b>
                                        </td>
                                        <td>{!!$ingreso->articulo->descripcion!!}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>
                                                <i>cant_total : </i>
                                                <b>
                                                </td>
                                                <td>{!!$ingreso->articulo->cant_total!!}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        <i>deleted_at : </i>
                                                        <b>
                                                        </td>
                                                        <td>{!!$ingreso->articulo->deleted_at!!}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @endsection