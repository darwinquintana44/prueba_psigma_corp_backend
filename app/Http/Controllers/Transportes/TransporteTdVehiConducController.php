<?php

namespace App\Http\Controllers\Transportes;

use App\Http\Controllers\Controller;
use App\Models\Transportes\TransporteTdVehiConduc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransporteTdVehiConducController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            date_default_timezone_set('America/Bogota');
            $reglas = [
                'id_vehiculo' => 'required',
                'id_conductor' => 'required'
            ];

            $validaciones = $request->validate($reglas);

            $instanciaSuperConduc = new TransporteTdVehiConduc();
            $requestAll = $request->all();

            // realizamos el insert a la tabla
            $instanciaSuperConduc->crearDato($requestAll);

            DB::commit();
            // realizamos el insert
            return response(['data' => 'Los datos se han creado de maneja exitosa', 'status' => 200]);
        }catch (\Exception $e){
            Log::info($e);
            DB::rollBack();
            return response(['data' => 'Ha ocurrido un error con la creacion del resgistro', 'status' => 500]);
        }
    }
}
