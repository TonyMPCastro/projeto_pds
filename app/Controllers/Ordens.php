<?php

namespace App\Controllers;


class Ordens
{

    private $dados;
    private $Exception = false;

    
    function __construct()
    {
        $verificarLogin = new \App\Lib\Adm();
    }
    public function index()
    {
        $admAgend = new \App\Models\AdmAgendamentos();
        $visualizarLogin = new \App\Models\AdmsUser();
        $admServico = new \App\Models\AdmServico();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $visualizarLogin->menu_adm($this->dados);
        $this->dados['status'] = 3;
        $this->dados['lista_em_abertas'] = $admAgend->get_em_aberto($this->dados);
        $this->dados['servicos'] = $admServico->get_servicos($this->dados);
        $this->dados['status'] = ($this->Exception) ? $this->Exception : '';
        $carregarView = new \Core\ConfigView("Views/financeiro/agendados", $this->dados);
        $carregarView->renderizar();
    }

    public function onShow(){
        $admAgend = new \App\Models\AdmAgendamentos();
        $visualizar = new \App\Models\AdmsUser();
        $admServico = new \App\Models\AdmServico();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $visualizar->menu_adm($this->dados);
        $this->dados['status'] = 3;
        $this->dados['servicos'] = $admServico->get_servicos($this->dados);
        $this->dados['data_inicio'] = date("Y-m-d");
        $this->dados['data_fim'] =  date('Y-m-d', strtotime(date("Y-m-d"). ' + 7 days'));
        $this->dados['agendamentos'] = $admAgend->get_em_aberto_where($this->dados);
        $carregarView = new \Core\ConfigView("Views/financeiro/rel", $this->dados);
        $carregarView->renderizar();
    }
}
