@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Show')
@section('content')

<div class = 'container'>
    <h1>
        Show egreso
    </h1>
    <form method = 'get' action = '{!!url("egreso")!!}'>
        <button class = 'btn blue'>egreso Index</button>
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
                <td>{!!$egreso->cantidad!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>fecha_egresos : </i></b>
                </td>
                <td>{!!$egreso->fecha_egresos!!}</td>
            </tr>
            <tr>
                <td>
                    <b>
                        <i>descripcion : </i>
                        <b>
                        </td>
                        <td>{!!$egreso->articulo->descripcion!!}</td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                <i>cant_total : </i>
                                <b>
                                </td>
                                <td>{!!$egreso->articulo->cant_total!!}</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>
                                        <i>deleted_at : </i>
                                        <b>
                                        </td>
                                        <td>{!!$egreso->articulo->deleted_at!!}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>
                                                <i>descripcion : </i>
                                                <b>
                                                </td>
                                                <td>{!!$egreso->departamento->descripcion!!}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        <i>deleted_at : </i>
                                                        <b>
                                                        </td>
                                                        <td>{!!$egreso->departamento->deleted_at!!}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @endsection