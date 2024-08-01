<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;
//projeto de estudo do laravel
class ContatoController extends Controller
{
    public function contato (Request $request){
        $motivo_contatos = MotivoContato::all();
        //forma de salvar o registro numero 1
        /* $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        $contato->save(); */

        //forma de salvar registro numero 2
        //predefinir  no model o array associativo
        //$contato = new SiteContato();
        //$contato->create($request->all());

        //forma 3 de persistencia
        //$contato->fill($request->all());
        //$contato->save();
        //dd($request);
        echo '<pre>';
            print_r($request->all());
        echo '</pre>';
        return view('site.contato', ['motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(Request $request){
        //SiteContato::create($request->all());
        //dd($request);
        $request->validate([
            'nome' => 'required|min:3',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:300'
        ]);

    }
}
