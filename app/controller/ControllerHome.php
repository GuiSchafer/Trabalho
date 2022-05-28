<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewHome;
use App\Model\ModelProduto;
use App\View\ViewProduto;
use App\Db\Connection;

class ControllerHome extends ControllerPadrao
{

    protected function processPage()
    {      
        $sTitle = 'Home';
        $oModelProduto = new ModelProduto;
        $a = $oModelProduto->getAll();
        $sContent = ViewHome::render([
            // Passar aqui os parâmetros do conteúdo da página
            'homeContent' => '<h1>Página Inicial do Site</h1>',
            'produtoContent' => "<h1>$sTitle</h1>",
            'tabelaProduto' => ViewHome::getHtmlTabelaProduto($a)
        ]);

        $this->footerVars = [
            // Passar aqui os parametros do footer da página
            'footerContent' => '<h5>Jovens Talentos 2022!</h5>'
        ];

        return parent::getPage(
            $sTitle,
            $sContent
        );
        
    }
    function processInsertCarrinho(){       
        $iIdProduto = $_GET['proid'] ??= '';
        $iNomeProduto = $_GET['pronome'] ??= '';
        $iDescProduto = $_GET['prodesc'] ??= '';
        $iValorProduto = $_GET['provalor'] ??= '';
        $oModelProduto = new ModelCadProduto;
        $oModelProduto->id = $iIdProduto;
        if($oModelProduto->insertProdutoCarrinho()){
            $this->footerVars = ['footerContent' => '<div class="alert alert-success" role="alert">Produto Incluido com sucesso!</div>'];
        }else{
            $this->footerVars = ['footerContent' => '<div class="alert alert-danger" role="alert">Erro ao incluir o Produto!</div>'];      
        }       
        return $this->processPage();
    }

}
