<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conceitos extends Model
{
    use HasFactory;
    protected $table = "conceitos";

    public function categorias(){
        return $this->belongsTo(Categorias::class, 'categoria_id', 'id');
    }
}
