<?php

namespace App\Http\Controllers\Globales;

use App\Http\Controllers\Controller;
use App\Models\Globales\GlobalTrMunicipios;

class GlobalTrMunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instancia = new GlobalTrMunicipios();

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
        $instancia = new GlobalTrMunicipios();
        return response(['data' => $instancia->listarTodoPorIdDepartamento($id), 'status' => 200]);
    }
}
