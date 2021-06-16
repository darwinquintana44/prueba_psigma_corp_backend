<?php

namespace App\Models\Transportes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransporteTmVehiculos extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'transporte_tm_vehiculos';

    protected $primaryKey = 'id';

    protected $fillable = ['descripcion', 'codigo', 'color', 'created_at'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public $timestamps = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // consultamos todos los datos de la tabla ordenada por id
    public function listarTodo() {
        return self::orderBy('id', 'desc')->get();
    }

    // consultamos todos los datos de la tabla de manera ordenada
    public function listarTodoOrdenado(){
        return self::orderBy('descripcion', 'asc')->get();
    }
}
