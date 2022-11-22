<?php

namespace App\Controllers;

if(!defined('4578S9')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}


class Servico_adm
{
    
    private $dados;
    
    public function index() {
        $visualizarLogin = new \App\Models\AdmsUser();
        $this->dados['id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $visualizarLogin->menu_adm($this->dados);
       $carregarView = new \Core\ConfigView("Views/adm/servico", $this->dados);
       $carregarView->renderizar();
    }
}
