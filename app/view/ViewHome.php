<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewHome extends ViewPadrao
{
    static function getHtmlTabelaProduto (array $a){
		$sHtml =  '<div class="d-flex justify-content-center flex-wrap">';
		foreach ($a as $x) {
			$sHtml .= '			
				<div class="card">
					<img src="Imagens/viserion.jpg" alt="Produto" style="width:100%">	
					<form method="post" action="index.php?pg=carrinho&act=insertcarrinho" class="container">									
						<p id="procodigo" name="procodigo" style="display:none"><input type="number" id="procodigo" name="proid" style="display:none" value="' . $x["procodigo"] . '">' . $x["procodigo"] . '</p>
						<h4 id="pronome" name="pronome"><b><input type="text" id="pronome" name="pronome" style="display:none" value="' . $x["pronome"] . '">' . $x["pronome"] . '</b></h4> 
						<p id="prodesc" name="prodesc"><input type="text" id="prodescricao" name="prodescricao" style="display:none" value="' . $x["prodescricao"] . '">' . $x["prodescricao"].'</p>
						<div class="d-flex flex-row-reverse bd-highlight">
							<button class="p-2 bd-highlight"><i class="fa fa-shopping-cart" aria-hidden="true" title="Incluir no Carrinho"></i></button>
							<p class="p-2 bd-highlight"><b id="provalor" name="provalor">à vista R$<input type="number" id="provalor" name="provalor" style="display:none" value="' . $x["provalor"] . '">' . $x["provalor"] . '</b></p> 
						</div>
					</form>																			
				</div>';	
		}
		$sHtml .= '</div>';												
		return $sHtml;
		

	}
	
}