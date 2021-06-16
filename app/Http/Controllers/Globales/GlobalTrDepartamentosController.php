<?php

namespace App\Http\Controllers\Globales;

use App\Http\Controllers\Controller;
use App\Models\Globales\GlobalTrDepartamentos;

class GlobalTrDepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instancia = new GlobalTrDepartamentos();

        return response(['data' => $instancia->listarTodo(), 'status' => 200]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instancia = new GlobalTrDepartamentos();
        return response(['data' => $instancia->listarTodoPorIdPais($id), 'status' => 200]);
    }
}
