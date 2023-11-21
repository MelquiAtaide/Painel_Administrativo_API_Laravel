<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Usuarios extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;
    protected $table = "usuarios";

    public function perfil(){
        return $this->belongsTo(Perfil::class, 'perfil_id', 'id');
    }
}
