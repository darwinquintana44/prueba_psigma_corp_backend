<?php

namespace App\Models\Transportes;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransporteTrConductores extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'transporte_tr_conductores';

    protected $primaryKey = 'id';

    protected $fillable = ['ciudad_nacimiento', 'nombres', 'apellidos', 'identificacion', 'direccion', 'telefono', 'created_at'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public $timestamps = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // consulta todos los datos de la tabla
    public function listarTodo(){
        return self::join('global_tr_municipios as mun', 'mun.id', 'transporte_tr_conductores.ciudad_nacimiento')
            ->join('global_tr_departamentos as dep', 'dep.id', 'mun.id_departamento')
            ->join('global_tr_paises as pai', 'pai.id', 'dep.id_pais')
            ->select('transporte_tr_conductores.*', 'mun.descripcion as desc_muni', 'mun.sigla as sigla_muni', 'mun.codigo as cod_muni',
                'dep.descripcion as desc_depa', 'dep.sigla as sigla_depa', 'dep.codigo as cod_depa',
                'pai.descripcion as desc_pais', 'pai.sigla as sigla_pais', 'pai.codigo as cod_pais')
            ->orderBy('transporte_tr_conductores.id', 'desc')
            ->get();
    }

    // consultar todos los datos de la tabla segun el id
    public function listarTodoPorId($id){
        return self::join('global_tr_municipios mun', 'mun.id', 'transporte_tr_conductores.ciudad_nacimiento')
            ->join('global_tr_departamentos dep', 'dep.id', 'mun.id_departamento')
            ->join('global_tr_paises pai', 'pai.id', 'dep.id_pais')
            ->select('transporte_tr_conductores.*', 'mun.descripcion as dec_muni', 'mun.sigla as sigla_muni', 'mun.codigo as cod_muni',
                'dep.descripcion as dec_depa', 'dep.sigla as sigla_depa', 'dep.codigo as cod_depa',
                'pai.descripcion as dec_pais', 'pai.sigla as sigla_pais', 'pai.codigo as cod_pais')
            ->where('transporte_tr_conductores.id', '=', $id)
            ->get();
    }

    // metodo de insercion
    public function crearDatos($data){
        $dataInsert = [
            'ciudad_nacimiento' => $data['ciudad_nacimiento'],
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'identificacion' => $data['identificacion'],
            'direccion' => isset($data['direccion']) ? $data['direccion'] : null,
            'telefono' => isset($data['telefono']) ? $data['telefono'] : null,
            'created_at' => Carbon::now()
        ];

        return self::insertGetId($dataInsert);
    }

    // metodo de actualizacion
    public function actualizaDatos($data){
        $dataUpdate = [
            'ciudad_nacimiento' => $data['ciudad_nacimiento'],
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'identificacion' => $data['identificacion'],
            'direccion' => isset($data['direccion']) ? $data['direccion'] : null,
            'telefono' => isset($data['telefono']) ? $data['telefono'] : null
        ];

        return self::where('id', '=', $data['id'])->update($dataUpdate);
    }

    // metodo de eliminacion
    public function eliminaDatos($id)
    {
        return self::where('id', '=', $id)->delete();
    }

    // metodo que va a buscar segun el id del conductores si tiene un supervisor asignado
    public function supervisorAsignado($id){
        return self::join('transporte_td_super_conduc as supcon', 'transporte_tr_conductores.id', 'supcon.id_conductor')
            ->select('transporte_tr_conductores.*', 'supcon.deleted_at as fecha_eliminacion', 'supcon.created_at as fecha_asignacion', 'supcon.id as id_asignacion')
            ->where('transporte_tr_conductores.id', $id)
            ->orderBy('supcon.id', 'desc')
            ->get();
    }
}
