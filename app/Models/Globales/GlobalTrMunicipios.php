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

    // consulta todos los datos de la tabla
    public function listarTodo(){
        return self::join('global_tr_departamentos as dep', 'dep.id', 'global_tr_municipios.global_tr_departamentos_id')
            ->join('global_tr_paises as pais', 'pais.id', 'dep.global_tr_paises_id')
            ->select('global_tr_municipios.*', 'dep.descripcion as desc_departamento', 'pais.descripcion as desc_pais')
            ->get();
    }

    // consulta todos los datos de la tabla segun el id del departamento
    public function listarTodoPorIdDepartamento($idDepartamento){
        return self::where('global_tr_departamentos_id', '=', $idDepartamento)->orderBy('descripcion', 'asc')->get();
    }
}
