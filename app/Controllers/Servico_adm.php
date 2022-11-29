<?php

namespace App\Controllers;

class Servico_adm
{
    
    private $dados;
    
    function __construct()
    {
        $verificarLogin = new \App\Lib\Adm();
    }


    public function index() {
        $visualizarLogin = new \App\Models\AdmsUser();
        $this->dados['id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $visualizarLogin->menu_adm($this->dados);
       $carregarView = new \Core\ConfigView("Views/adm/servico", $this->dados);
       $carregarView->renderizar();
    }
}
