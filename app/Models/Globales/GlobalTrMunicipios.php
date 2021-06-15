<?php

namespace App\Models\Globales;

use App\Models\Transportes\TransporteTrSupervisores;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GlobalTrMunicipios extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'global_tr_municipios';

    protected $primaryKey = 'id';

    protected $fillable = ['global_tr_departamentos_id', 'descripcion', 'sigla', 'codigo'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function transporteTrSupervisores() {
        return $this->hasMany(TransporteTrSupervisores::class);
    }

    // consulta todos los datos de la tabla segun el id del departamento
    public function listarTodoPorIdDepartamento($idDepartamento){
        return self::where('global_tr_departamentos_id', '=', $idDepartamento)->orderBy('descripcion', 'asc')->get();
    }
}
