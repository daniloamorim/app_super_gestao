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
        /* 
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        $contato->save(); 
        */

        //forma de salvar registro numero 2
        //predefinir  no model o array associativo
        //$contato = new SiteContato();
        //$contato->create($request->all());

        //forma 3 de persistencia
        //$contato->fill($request->all());
        //$contato->save();
        //dd($request);
        /* echo '<pre>';
            print_r($request->all());
        echo '</pre>'; */
        return view('site.contato', ['motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(Request $request){
        //dd($request);
        $regras = [
        'nome' => 'required|min:3|max:40|unique: site_contatos',
        'telefone' => 'required',
        'email' => 'email',
        'motivo_contatos_id' => 'required',
        'mensagem' => 'required|max:300'
        ];

        $feedbacks = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'email.email' => 'O email informado não é válido',
            'mensagem.max' => 'A mensagem deve ter no máximo 300 caracteres',
            'required' => 'O campo :attribute deve ser preenchido'
        ];
        $request->validate($regras, $feedbacks);
        
        SiteContato::create($request->all());
        return redirect()->route('site.index');       
    }
}
