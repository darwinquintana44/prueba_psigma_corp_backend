<?php

namespace App\Models\Globales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GlobalTrPaises extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'global_tr_paises';

    protected $primaryKey = 'id';

    protected $fillable = ['descripcion', 'sigla', 'codigo'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function globalTrDepartamentos() {
        return $this->hasMany(GlobalTrDepartamentos::class);
    }

    // consulta todos los datos de la tabla
    public function listarTodo(){
        return self::all();
    }
}
