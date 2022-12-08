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

        $visualizarLogin = new \App\Models\AdmsUser();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $visualizarLogin->menu_adm($this->dados);
        $carregarView = new \Core\ConfigView("Views/cliente/cliente", $this->dados);
        $carregarView->renderizar();
    }
}
