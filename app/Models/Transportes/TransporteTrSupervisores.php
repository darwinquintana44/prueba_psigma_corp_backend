<?php

namespace App\Models\Transportes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransporteTrSupervisores extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'transporte_tr_supervisores';

    protected $primaryKey = 'id';

    protected $fillable = ['ciudad_nacimiento', 'nombres', 'apellidos', 'identificacion', 'direccion', 'telefono', 'created_at'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public $timestamps = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // consultamos todos los datos de la tabla
    public function listarTodo() {
        return self::all();
    }

    // consultamos todos los datos de la tabla de manera ordenada
    public function listarTodoOrdenado(){
        return self::orderBy('apellidos', 'asc')->get();
    }
}
