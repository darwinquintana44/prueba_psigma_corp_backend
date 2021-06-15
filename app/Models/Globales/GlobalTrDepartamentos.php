<?php

namespace App\Models\Globales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GlobalTrDepartamentos extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'global_tr_departamentos';

    protected $primaryKey = 'id';

    protected $fillable = ['global_tr_paises_id', 'descripcion', 'sigla', 'codigo'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function globalTrMunicipios() {
        return $this->hasMany(GlobalTrMunicipios::class);
    }

    // consulta todos los datos de la tabla segun el id del pais
    public function listarTodoPorIdPais($idPais){
        return self::where('global_tr_paises_id', '=', $idPais)->orderBy('descripcion', 'asc')->get();
    }
}
