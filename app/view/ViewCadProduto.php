<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewCadProduto extends ViewPadrao
{
    public $codigo;
    public $nome;
    public $descricao;
    public $valor;
	static function getHtmlCadastroProduto(){
            $sHtml =  '                       
                        <table class="table">
                            <thead>
                                <tr>
                                  <th scope="col">Código</th>
                                  <th scope="col">Nome</th>
                                  <th scope="col">Descrição</th>
                                  <th scope="col">Valor</th>
                                </tr>
                            </thead>
		';            
            $sHtml .= '
                            <form method="post" action="index.php?pg=produto&act=insert">
                                <tr>
                                    <td><input type="number" id="procodigo" name="proid"></td> 
                                    <td><input type="text" id="pronome" name="pronome"></td>
                                    <td><input type="text" id="catdescricao" name="prodesc"></td>
                                    <td><input type="number" id="provalor" name="provalor"></td>
                                    <td><input type="submit"></td>
                                </tr>
                            </form>'
            ;
            $sHtml .=   '</table>';
             
            return $sHtml;
	}
}
