<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Archivo;

class Tarea extends Model
{
    /** @use HasFactory<\Database\Factories\TareaFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre',
        'descripcion',
        'fecha_limite',
    ];

    protected $casts = [
        'fecha_limite' => 'date',
    ];

    /**
     * Tareas que pertenecen al usuario.
     *
     * @return void
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'users');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'tarea_user', 'tarea_id', 'user_id');
    }

    public function files()
    {
        return $this->hasMany(Archivo::class);
    }
}
