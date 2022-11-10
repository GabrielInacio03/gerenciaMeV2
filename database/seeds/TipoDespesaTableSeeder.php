<?php

use Illuminate\Database\Seeder;
use App\Models\TipoDespesa;

class TipoDespesaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoDespesa::create([
            'nome' => 'Aluguel',            
        ]);
        TipoDespesa::create([
            'nome' => 'Impostos Fixos',
        ]);
        TipoDespesa::create([
            'nome' => 'Folha de Pagamento',
        ]);
        TipoDespesa::create([
            'nome' => 'Taxas Bancárias',
        ]);
        TipoDespesa::create([
            'nome' => 'Seguro de Vida',
        ]);
        TipoDespesa::create([
            'nome' => 'Alimentação',
        ]);
        TipoDespesa::create([
            'nome' => 'Energia Elétrica',
        ]);
        TipoDespesa::create([
            'nome' => 'Aguá e Esgoto',
        ]);
        TipoDespesa::create([
            'nome' => 'Internet',
        ]);
        TipoDespesa::create([
            'nome' => 'Outros',
        ]);
    }
}
