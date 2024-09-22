<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    /*
        Cria-se um metodo para informar a relação entre as tabelas
        Produto tem 1 produtoDetalhe
        1 registro relacionado em produto_detalhes (fk)
    */

    public function itemDetalhe(){
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }
}
