<?php

namespace App\Http\Controllers\Transportes;

use App\Http\Controllers\Controller;
use App\Models\Transportes\TransporteTdSuperConduc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransporteTdSuperConducController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            date_default_timezone_set('America/Bogota');
            $reglas = [
                'id_supervisor' => 'required',
                'id_conductor' => 'required'
            ];

            $validaciones = $request->validate($reglas);

            $instanciaSuperConduc = new TransporteTdSuperConduc();
            $requestAll = $request->all();

            // validamos si existe ya un registro en la tabla que compruebe que el conductor ya tiene asignado un supervisor
            if ($instanciaSuperConduc->verificaConductor($requestAll['id_conductor'])){
                // eliminamos los registros que esten habilitados
                $instanciaSuperConduc->eliminarDato($requestAll['id_conductor']);
                $mensaje = 'El conductor ya tienia un supervisor asignado el cual se ha quitado y se ha asignado uno nuevo';
            }else{
                $mensaje = 'Supervisor Asignado';
            }

            // realizamos el insert a la tabla
            $instanciaSuperConduc->crearDato($requestAll);

            DB::commit();
            // realizamos el insert y devolvemos el id
            return response(['data' => $mensaje, 'status' => 200]);
        }catch (\Exception $e){
            Log::info($e);
            DB::rollBack();
            return response(['data' => 'Ha ocurrido un error con la creacion del resgistro', 'status' => 500]);
        }
    }
}
