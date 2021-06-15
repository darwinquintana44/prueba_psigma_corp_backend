<?php

namespace App\Http\Controllers\Globales;

use App\Http\Controllers\Controller;
use App\Models\Globales\GlobalTrDepartamentos;

class GlobalTrDepartamentosController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instancia = new GlobalTrDepartamentos();
        return response(['data' => $instancia->listarTodoPorIdPais($id)]);
    }
}
