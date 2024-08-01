<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 10';
        $fornecedor->site = 'fornecedor10.com.br';
        $fornecedor->uf = 'TO';
        $fornecedor->email ='contato@fornecedor10.com.br';
        $fornecedor->save(); 

        //metodo create(atenção para o fillable da classe)
        Fornecedor::create([
            'nome' => 'Fornecedor20',
            'site' => 'fornecedor20.com.br',
            'uf' => 'RJ',
            'email' => 'contato@fornecedor20.com.br'
        ]);

        //insert "PURO"
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor30',
            'site' => 'fornecedor30.com.br',
            'uf' => 'SC',
            'email' => 'contato@fornecedor30.com.br'
        ]);

    }
}
