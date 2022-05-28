<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewProduto;
use App\Db\Connection;
use App\Model\ModelProduto;

class ControllerProduto extends ControllerPadrao
{
    function processPage(){

        $oModelProduto = new ModelProduto;

        $a = $oModelProduto->getAll();


        $sTitle = 'Produtos';
        $sContent = ViewProduto::render([
            'produtoContent' => "<h1>$sTitle</h1>",
            'tabelaProduto' => ViewProduto::getHtmlTabelaProduto($a)
        ]); 

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
    function processDelete(){
        $iIdProduto = $_GET['proid'] ??= '';
        
        $oModelProduto = new ModelProduto;
        $oModelProduto->id = $iIdProduto;       
        if($oModelProduto->deleteProduto()){
            $this->footerVars = ['footerContent' => '<div class="alert alert-success" role="alert">Produto Excluido com sucesso!</div>'];
        }else{
            $this->footerVars = ['footerContent' => '<div class="alert alert-danger" role="alert">Erro ao excluir o Produto!</div>'];      
        }       
        return $this->processPage();
    }
    
    function processInsert(){       
        $iIdProduto = $_POST['proid'] ??= '';
        $iNomeProduto = $_POST['pronome'] ??= '';
        $iDescProduto = $_POST['prodesc'] ??= '';
        $iValorProduto = $_POST['provalor'] ??= '';
        
        $oModelProduto = new ModelProduto;
        $oModelProduto->id    = $iIdProduto;
        $oModelProduto->nome  = $iNomeProduto;
        $oModelProduto->desc  = $iDescProduto;
        $oModelProduto->valor = $iValorProduto;
        
        if($oModelProduto->insertProduto()){
            $this->footerVars = ['footerContent' => '<div class="alert alert-success" role="alert">Produto Incluido com sucesso!</div>'];
        }else{
            $this->footerVars = ['footerContent' => '<div class="alert alert-danger" role="alert">Erro ao incluir o Produto!</div>'];      
        }       
        return $this->processPage();
    }
    
}