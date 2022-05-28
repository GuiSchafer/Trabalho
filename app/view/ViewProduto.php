<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewProduto extends ViewPadrao
{
	static function getHtmlTabelaProduto (array $a){
		$sHtml =  '                       
			<table class="table">
      <p><a href="index.php?pg=cadproduto">+ Incluir Produto</a></p>
			  <thead>
			    <tr>
			      <th scope="col">Código</th>
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
				<td>' . $x["procodigo"] . '</td>
				<td>' . $x["pronome"] . '</td>
				<td>' . $x["prodescricao"].'</td>
				<td>' . $x["provalor"] . '</td>
        <td><a href="index.php?pg=produto&act=delete&proid=' . $x["procodigo"]. '">Deletar</a></td>
			</tr>';	
		}

		$sHtml .= '</table>
		</tbody>';
		return $sHtml;

	}
}