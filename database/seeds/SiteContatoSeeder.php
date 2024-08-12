<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'SIstema SG';
        $contato->telefone = '(11) 99999-0000';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Bem vindo ao sistema SG';
        $contato->save();
        */
        //dessa forma eu posso chamar a fectory que preciso
        factory(SiteContato::class, 100) -> create();
    }
}
