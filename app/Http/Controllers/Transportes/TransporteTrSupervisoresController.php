<?php

namespace App\Http\Controllers\Transportes;

use App\Http\Controllers\Controller;
use App\Models\Transportes\TransporteTrSupervisores;

class TransporteTrSupervisoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instancia = new TransporteTrSupervisores();
        return response(['data' => $instancia->listarTodoOrdenado(), 'status' => 200]);
    }
    public function listadoGeneral()
    {
        $instancia = new TransporteTrSupervisores();
        return response(['data' => $instancia->listarTodo(), 'status' => 200]);
    }
}
