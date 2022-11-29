<?php

namespace App\Controllers;

class Home
{
    
    private $dados;

    function __construct(){
        $verificarLogin = new \App\Lib\Adm();

    }
     
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
