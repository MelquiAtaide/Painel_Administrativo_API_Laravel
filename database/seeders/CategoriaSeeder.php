<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorias;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorias::create([
            'sigla'      => 'DE/RE',
            'descricao'  => 'Diagnósticos e Resultados de Enfermagem',
        ]);
        Categorias::create([
            'sigla'      => 'IE',
            'descricao'  => 'Intervenções de Enfermagem',
        ]);

    }
}
