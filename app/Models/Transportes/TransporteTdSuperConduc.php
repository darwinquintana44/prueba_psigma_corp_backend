<?php

namespace App\Models\Transportes;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransporteTdSuperConduc extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'transporte_td_super_conduc';

    protected $primaryKey = 'id';

    protected $fillable = ['id_supervisor', 'id_conductor', 'created_at'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public $timestamps = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // metodo que servira para verificar si existe un conductor que ya tenga asignado un supervisor
    public function verificaConductor($idConductor){
        return self::where('id_conductor', '=', $idConductor)->exists();
    }

    // crear registro en la tabla
    public function crearDato($data){
        $dataInsert = [
            'id_supervisor' => $data['id_supervisor'],
            'id_conductor' => $data['id_conductor'],
            'created_at' => Carbon::now(),
        ];
        return self::insertGetId($dataInsert);
    }

    // eliminar dato de la tabla
    public function eliminarDato($idConductor){
        return self::where('id_conductor', '=', $idConductor)->delete();
    }
}
