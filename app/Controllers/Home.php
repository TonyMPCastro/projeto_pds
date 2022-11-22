<?php

namespace App\Controllers;

if(!defined('4578S9')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}

class Home
{
    
    private $dados;


     
    public function index() {
        $visualizarLogin = new \App\Models\AdmsUser();
        $this->dados['id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $visualizarLogin->menu_adm($this->dados);
       $carregarView = new \Core\ConfigView("Views/adm/home", $this->dados);
       $carregarView->renderizar();
     }

    public function onShow() {
       $this->index();
    }
}
