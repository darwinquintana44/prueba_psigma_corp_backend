<?php

namespace App\Http\Controllers\Transportes;

use App\Http\Controllers\Controller;
use App\Models\Transportes\TransporteTrConductores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TransporteTrConductoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // generamos una instancia del modelo a utilizar
        $instancia = new TransporteTrConductores();
        // devolvemos la respuesta
        return response(['data' => $instancia->listarTodo(), 'status' => 200]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            date_default_timezone_set('America/Bogota');
            $reglas = [
                'ciudad_nacimiento' => 'required',
                'nombres' => 'required|min:3',
                'apellidos' => 'required|min:3',
                'identificacion' => 'required|min:6|unique:App\Models\Transportes\TransporteTrConductores,identificacion'
            ];

            $validaciones = $request->validate($reglas);

            $allRequest = $request->all();

            // generamos una instancia del modelo a utilizar
            $instancia = new TransporteTrConductores();

            $crearRegistro = $instancia->crearDatos($allRequest);

            DB::commit();

            return response(['data' => $crearRegistro, 'status' => 200]);
        }catch (\Exception $e){
            Log::info($e);
            DB::rollBack();
            return response(['data' => 'Se ha presentado un error al momento de crear el registro', 'status' => 500]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // generamos una instancia del modelo a utilizar
        $instancia = new TransporteTrConductores();
        return response(['data' => $instancia->listarTodoPorId($id), 'status' => 200]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            date_default_timezone_set('America/Bogota');
            $allRequest = $request->all();
            $reglas = [
                'ciudad_nacimiento' => 'required',
                'nombres' => 'required|min:3',
                'apellidos' => 'required|min:3',
                'identificacion' => 'required|min:6|unique:App\Models\Transportes\TransporteTrConductores,identificacion,'.$allRequest['id']
            ];

            $mensajes = [
                'ciudad_nacimiento.required' => 'ciudad requerida'
            ];

//            $validaciones = $request->validate($reglas);
            $validaciones = Validator::make($allRequest, $reglas, [
                'required' => ':attribute es obligatorio'
            ]);

            // generamos una instancia del modelo a utilizar
            $instancia = new TransporteTrConductores();

            $actualizaRegistro = $instancia->actualizaDatos($allRequest);

            DB::commit();

            return response(['data' => $actualizaRegistro, 'status' => 200]);
        }catch (\Exception $e){
            Log::info($e);
            DB::rollBack();
            return response(['data' => 'Se ha presentado un error al momento de actualizar el registro', 'status' => 500]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        date_default_timezone_set('America/Bogota');
        // generamos una instancia del modelo a utilizar
        $instancia = new TransporteTrConductores();

        return response(['data' => $instancia->eliminaDatos($id), 'status' => 200]);
    }

    /*
     * metodo que va a devolver los conductores que tiene supervisor asignado
     * */
    public function supervisorAsignado($id){
        $instancia = new TransporteTrConductores();

        return response(['data' => $instancia->supervisorAsignado($id), 'status' => 200]);
    }

    /*
     * metodo que va a devolver los conductores que tiene vehiculos asignados
     * */
    public function vehiculoAsignado($id){
        $instancia = new TransporteTrConductores();

        return response(['data' => $instancia->vehiculoAsignado($id), 'status' => 200]);
    }
}
