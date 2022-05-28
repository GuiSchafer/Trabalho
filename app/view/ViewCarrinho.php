<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewCarrinho extends ViewPadrao
{
	static function getHtmlCarrinho (array $a){
		$sHtml =  '                       
			<table class="table">
			  <thead>
			    <tr>
				    <th scope="col">Nome</th>
			      <th scope="col">Descrição</th>
				    <th scope="col">Valor</th>
            <th scope="col">Excluir</th>
			    </tr>
			  </thead>
			</tbody>
		';

		foreach ($a as $x) {
			$sHtml .= '
			<tr>
				<td>' . $x["pronome"] . '</td>
				<td>' . $x["prodescricao"].'</td>
				<td>' . $x["provalor"] . '</td>
                <td><a href="index.php?pg=carrinho&act=deletecarrinho&proid=' . $x["procodigo"]. '">Deletar</a></td>
			</tr>';	
		}

		$sHtml .= '</table>
		</tbody>';
		return $sHtml;

	}
}