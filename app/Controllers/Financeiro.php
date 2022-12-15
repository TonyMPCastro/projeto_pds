<?php

namespace App\Controllers;


class Financeiro
{

    private $dados;
    
    function __construct()
    {
        $verificarLogin = new \App\Lib\Adm();
    }
    public function dividas()
    {
        $cliente = new \App\Models\Financeiro();
        $visualizarLogin = new \App\Models\AdmsUser();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $visualizarLogin->menu_adm($this->dados);
        $this->dados['dividas'] = $cliente->get_dividas($this->dados);
        $carregarView = new \Core\ConfigView("Views/cliente/dividas", $this->dados);
        $carregarView->renderizar();
    }


    public function formaPagamento()
    {
        $cliente = new \App\Models\Financeiro();
        $visualizarLogin = new \App\Models\AdmsUser();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $visualizarLogin->menu_adm($this->dados);
        $this->dados['forma_pagamento'] = $cliente->get_form_pag($this->dados);
        $carregarView = new \Core\ConfigView("Views/cliente/pagamentos", $this->dados);
        $carregarView->renderizar();
    }
}
