<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $table = "usuarios";

    public function perfil(){
        return $this->belongsTo(Perfil::class, 'perfil_id', 'id');
    }
}
