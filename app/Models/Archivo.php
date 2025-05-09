<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Archivo extends Model
{
    protected $fillable = ['tarea_id','user_id','original_name','path'];
    protected $table = 'archivos';
    public function tarea()
    {
        return $this->belongsTo(Tarea::class);
    }
    public function uploader()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
