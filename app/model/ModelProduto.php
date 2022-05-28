<?php

namespace App\Model;

use App\Model\ModelPadrao;

class ModelProduto extends ModelPadrao
{
    public $id;
    public $nome;
    public $desc;
    public $valor;
    
    function getTable() {
        return 'loja.tbproduto';
    }
    function getTableCarrinho() {
        return 'loja.tbcarrinho';
    }
    function deleteProduto(){
        $iId = $this->id;
        
        return parent::delete([
            'procodigo' => $iId
        ]);
    }
    function deleteProdutoCarrinho(){
        $iId = $this->id;
            
        return parent::deletecarrinho([
            'procodigo' => $iId
        ]);
    }
    function insertProduto(){
        $iId = $this->getBdValue($this->id);
        $iNome = $this->getBdValue($this->nome);
        $iDesc = $this->getBdValue($this->desc);
        $iValor = $this->getBdValue($this->valor);
        
        return parent::insert([
            'procodigo' => $iId,
            'pronome' => $iNome,           
            'prodescricao' => $iDesc,
            'provalor' => $iValor
        ]);
    }
    function insertProdutoCarrinho(){
        $iId = $this->getBdValue($this->id);
        $iNome = $this->getBdValue($this->nome);
        $iDesc = $this->getBdValue($this->desc);
        $iValor = $this->getBdValue($this->valor);
        
        return parent::insertcarrinho([
            'procodigo' => $iId,
            'pronome' => $iNome,           
            'prodescricao' => $iDesc,
            'provalor' => $iValor
        ]);
    }
}