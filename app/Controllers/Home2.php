<?php

namespace App\Controllers;

class Home2
{
    
    private $dados;

    function __construct(){
        $verificarLogin = new \App\Lib\Adm();

    }
     
    public function index() {
        $visualizarLogin = new \App\Models\AdmsUser();
        $admServico = new \App\Models\AdmServico();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $visualizarLogin->menu_adm($this->dados);
        $this->dados['servicos'] = $admServico->get_servicos($this->dados);
        $this->dados['marcacao_servico'] = $visualizarLogin->get_marcacaes_c($this->dados);
       $carregarView = new \Core\ConfigView("Views/public_cliente/marcacao", $this->dados);
       $carregarView->renderizar();
     }

    public function onShow(){
        $admUser = new \App\Models\AdmsUser();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);

        $carregarView = new \Core\ConfigView("Views/public_cliente/cad_marcacao", $this->dados);
        $carregarView->renderizar();
    }
}
