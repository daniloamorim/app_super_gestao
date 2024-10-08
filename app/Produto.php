<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    /*
        Cria-se um metodo para informar a relação entre as tabelas
        Produto tem 1 produtoDetalhe
        1 registro relacionado em produto_detalhes (fk)
    */

    public function produtoDetalhe(){
        return $this->hasOne('App\ProdutoDetalhe');
    }
}
