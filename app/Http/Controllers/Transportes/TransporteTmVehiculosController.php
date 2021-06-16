<?php

namespace App\Http\Controllers\Transportes;

use App\Http\Controllers\Controller;
use App\Models\Transportes\TransporteTmVehiculos;
use Illuminate\Http\Request;

class TransporteTmVehiculosController extends Controller
{
    public function datosOrdenadosPorId() {
        $instancia = new TransporteTmVehiculos();

        return response(['data' => $instancia->listarTodo(), 'status' => 200]);
    }

    public function datosOrdenadosPorDescripcion() {
        $instancia = new TransporteTmVehiculos();

        return response(['data' => $instancia->listarTodoOrdenado(), 'status' => 200]);
    }
}
