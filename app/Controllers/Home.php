<?php

namespace App\Controllers;

class Home
{
    
    private $dados;

    function __construct(){
        $verificarLogin = new \App\Lib\Adm();

    }
     
    public function index() {
        $admUser = new \App\Models\AdmsUser();
        $admServico = new \App\Models\AdmServico();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);
        $this->dados['semanas'] = $admServico->get_semanas($this->dados);
        $this->dados['data_inicio'] = date("Y-m-d");
        $this->dados['data_fim'] =  date('Y-m-d', strtotime(date("Y-m-d"). ' + 7 days'));
        $this->dados['agendamentos'] = $admUser->get_marcacao($this->dados);
       $carregarView = new \Core\ConfigView("Views/adm/home", $this->dados);
       $carregarView->renderizar();
     }

    public function onShow() {
       $this->index();
    }
}
