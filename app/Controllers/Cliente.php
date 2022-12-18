<?php

namespace App\Controllers;


class Cliente
{

    private $dados;
    
    function __construct()
    {
        $verificarLogin = new \App\Lib\Adm();
    }
    public function index()
    {
        $cliente = new \App\Models\AdmCliente();
        $visualizarLogin = new \App\Models\AdmsUser();
        $admServico = new \App\Models\AdmServico();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $visualizarLogin->menu_adm($this->dados);
        $this->dados['lista_em_abertas'] = $cliente->get_em_aberto($this->dados);
        $this->dados['servicos'] = $admServico->get_servicos($this->dados);
        $carregarView = new \Core\ConfigView("Views/cliente/cliente", $this->dados);
        $carregarView->renderizar();
    }
}
