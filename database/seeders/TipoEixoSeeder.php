<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoEixo;

class TipoEixoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoEixo::create([
            'nome_tipo'  => 'Foco',
            'descricao'  => 'Área de atenção relevante para a Enfermagem',
        ]);
        TipoEixo::create([
            'nome_tipo'  => 'Julgamento',
            'descricao'  => 'Opinião clínica ou determinação relacionada ao foco da prática de Enfermagem',
        ]);
        TipoEixo::create([
            'nome_tipo'  => 'Meios',
            'descricao'  => 'Maneira ou método de executar uma intervenção',
        ]);
        TipoEixo::create([
            'nome_tipo'  => 'Ação',
            'descricao'  => 'Processo intencional aplicado a, ou desempenhado por um cliente',
        ]);
        TipoEixo::create([
            'nome_tipo'  => 'Tempo',
            'descricao'  => 'O momento, período, instante, intervalo ou duração de uma ocorrência',
        ]);
        TipoEixo::create([
            'nome_tipo'  => 'Localização',
            'descricao'  => 'Orientação anatômica ou espacial de um diagnóstico ou intervenções',
        ]);
        TipoEixo::create([
            'nome_tipo'  => 'Cliente',
            'descricao'  => 'Sujeito a quem o diagnóstico se refere e que é o beneficiário de uma intervenção de enfermagem',
        ]);
    }
}
