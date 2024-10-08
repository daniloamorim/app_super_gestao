<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Item;
use App\Unidade;
use App\ProdutoDetalhe;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*Relacionamento 1 para 1 sem eloquent
        foreach($produtos as $key=>$produto){
            //print_r($produto->getAttributes());
            //echo '<br><br><br>';
            
            $produto_detalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
            
            if(isset($produto_detalhe)){
                //print_r($produto_detalhe->getAttributes());
                
                $produtos[$key]['comprimento'] = $produto_detalhe->comprimento;
                $produtos[$key]['altura'] = $produto_detalhe->altura;
                $produtos[$key]['largura'] = $produto_detalhe->largura;
                }
                //echo '<hr>';
                
                }
                */
        $produtos = Item::paginate(10);
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id'
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.max' => 'O campo descricao deve ter no minimo 3 caracteres',
            'descricao.max' => 'O campo descricao deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ter um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe'
        ];
        $request->validate($regras, $feedback);

        Produto::create($request->all());
        return redirect()->route('produto.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
        //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //print_r($request->all());
        //echo '<br><br><br>';
        //print_r($produto->getAttributes());

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
