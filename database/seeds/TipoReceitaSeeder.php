<?php

use Illuminate\Database\Seeder;
use App\Models\TipoReceita;


class TipoReceitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoReceita::create([
            'nome' => 'Renda Variável',            
        ]);
        TipoReceita::create([
            'nome' => 'Renda Fixa',            
        ]);
    }
}
