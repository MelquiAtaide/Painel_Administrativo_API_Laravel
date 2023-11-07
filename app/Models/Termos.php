<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termos extends Model
{
    use HasFactory;
    protected $table = "termos";

    public function categoria(){
        return $this->belongsTo(Categorias::class, 'categoria_id', 'id');
    }
    public function foco(){
        return $this->belongsTo(Eixos::class, 'foco_id', 'id');
    }
    public function julgamento(){
        return $this->belongsTo(Eixos::class, 'julgamento_id', 'id');
    }
    public function acao(){
        return $this->belongsTo(Eixos::class, 'acao_id', 'id');
    }
}
