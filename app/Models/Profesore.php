<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesore extends Model
{
    use HasFactory;

    protected $table = 'profesores';

    protected $primaryKey = 'id_profesor';

    public $incrementing = false;

    protected $fillable = [
        'id_profesor', 'nombre', 'apellido', 'especialidad', 'correo_electronico', 'telefono', 'estado_id'
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesore::class, 'id_profesor');
    }
}
