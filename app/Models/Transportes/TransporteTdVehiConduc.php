<?php

namespace App\Models\Transportes;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransporteTdVehiConduc extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'transporte_td_vehi_conduc';

    protected $primaryKey = 'id';

    protected $fillable = ['id_vehiculo', 'id_conductor'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public $timestamps = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // crear registro en la tabla
    public function crearDato($data){
        $dataInsert = [
            'id_vehiculo' => $data['id_vehiculo'],
            'id_conductor' => $data['id_conductor'],
            'created_at' => Carbon::now(),
        ];
        return self::insertGetId($dataInsert);
    }
}
