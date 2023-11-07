<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eixos extends Model
{
    use HasFactory;
    protected $table = "eixos";

    public function tipos(){
        return $this->belongsTo(TipoEixo::class, 'tipo_id', 'id');
    }
}
