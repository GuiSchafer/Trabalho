<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewCarrinho;
use App\Db\Connection;
use App\Model\ModelProduto;

class ControllerCarrinho extends ControllerPadrao
{
    function processPage(){

        $oModelCarrinho = new ModelProduto;

        $a = $oModelCarrinho->getAllCarrinho();


        $sTitle = 'Carrinho';
        $sContent = ViewCarrinho::render([
            'produtoContent' => "<h1>$sTitle</h1>",
            'tabelaCarrinho' => ViewCarrinho::getHtmlCarrinho($a)
        ]); 

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
    function processDeleteCarrinho(){
        $iIdProduto = $_GET['proid'] ??= '';
        
        $oModelCarrinho = new ModelProduto;
        $oModelCarrinho->id = $iIdProduto;       
        if($oModelCarrinho->deleteProdutoCarrinho()){
            $this->footerVars = ['footerContent' => '<div class="alert alert-success" role="alert">Produto Excluido com sucesso!</div>'];
        }else{
            $this->footerVars = ['footerContent' => '<div class="alert alert-success" role="alert">Erro ao excluir o Produto!</div>'];      
        }       
        return $this->processPage();
    }
    function processInsertCarrinho(){       
        $iIdProduto    = $_POST['proid'] ??= '';
        $iNomeProduto  = $_POST['pronome'] ??= '';
        $iDescProduto  = $_POST['prodesc'] ??= '';
        $iValorProduto = $_POST['provalor'] ??= '';

        $oModelProduto = new ModelProduto;
        $oModelProduto->id    = $iIdProduto;
        $oModelProduto->nome  = $iNomeProduto;
        $oModelProduto->desc  = $iDescProduto;
        $oModelProduto->valor = $iValorProduto;

        if($oModelProduto->insertProdutoCarrinho()){
            $this->footerVars = ['footerContent' => '<div class="alert alert-success" role="alert">Produto Incluido com sucesso!</div>'];
        }else{
            $this->footerVars = ['footerContent' => '<div class="alert alert-danger" role="alert">Erro ao incluir o Produto!</div>'];      
        }       
        return $this->processPage();
    }
}