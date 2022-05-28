<?php

/**
 * Rederiza o conteúdo da página solicitada
 * @param string $sPage
 * @return string
 */
function render($sPage)
{
    switch ($sPage) {
        case 'home':
            return (new App\Controller\ControllerHome)->render();
        case 'produto':
            return (new App\Controller\ControllerProduto)->render();
        case 'cadproduto':
            return (new App\Controller\ControllerCadProduto)->render();
        case 'carrinho':
            return (new App\Controller\ControllerCarrinho)->render();
    }

    return 'Página não encontrada!';
}
