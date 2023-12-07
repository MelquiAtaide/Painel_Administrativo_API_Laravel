<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;
    protected $table = "favoritos";

    public function termo()
    {
        return $this->belongsTo(Termos::class, 'termo_id');
    }
}
