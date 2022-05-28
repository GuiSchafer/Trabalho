<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewCadProduto;
use App\Db\Connection;
use App\Model\ModelCadProduto;

class ControllerCadProduto extends ControllerPadrao
{
    function processPage(){

        $oModelCadProduto = new ModelCadProduto;

        $sTitle = 'Cadastro de Produtos';
        $sContent = ViewCadProduto::render([
            'produtoContent' => "<h1>$sTitle</h1>",
            'tabelaProduto' => ViewCadProduto::getHtmlCadastroProduto()
        ]); 

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
    function processInsert(){       
        $iIdProduto = $_GET['proid'] ??= '';
        $iNomeProduto = $_GET['pronome'] ??= '';
        $iDescProduto = $_GET['prodesc'] ??= '';
        $iValorProduto = $_GET['provalor'] ??= '';
        $oModelProduto = new ModelCadProduto;
        $oModelProduto->id = $iIdProduto;
        if($oModelProduto->insertProduto()){
            $this->footerVars = ['footerContent' => '<div class="alert alert-success" role="alert">Produto Incluido com sucesso!</div>'];
        }else{
            $this->footerVars = ['footerContent' => '<div class="alert alert-danger" role="alert">Erro ao incluir o Produto!</div>'];      
        }       
        return $this->processPage();
    }
}