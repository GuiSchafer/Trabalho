<?php

namespace App\Model;

use App\Model\ModelPadrao;

class ModelCadProduto extends ModelPadrao
{
    function getTable() {
        return 'loja.tbproduto';
    }
    function getTableCarrinho() {
        return 'loja.tbcarrinho';
    }
    function insertProduto(){
        $iId = $this->id;
       
        return parent::insert(['procodigo' => $iId]);
    }
}