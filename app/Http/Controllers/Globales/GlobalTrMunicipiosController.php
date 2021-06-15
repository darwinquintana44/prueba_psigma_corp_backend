<?php

namespace App\Http\Controllers\Globales;

use App\Http\Controllers\Controller;
use App\Models\Globales\GlobalTrMunicipios;

class GlobalTrMunicipiosController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instancia = new GlobalTrMunicipios();
        return response(['data' => $instancia->listarTodoPorIdDepartamento($id)]);
    }
}
