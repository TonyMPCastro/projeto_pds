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

    public function onShow() {
        $admUser = new \App\Models\AdmsUser();
        $admServico = new \App\Models\AdmServico();
        $financeiro = new \App\Models\Financeiro();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);
        $this->dados['semanas'] = $admServico->get_semanas($this->dados);
        $this->dados['servicos'] = $admServico->get_servicos_w($this->dados);
        $this->dados['horarios'] = $admServico->get_horarios($this->dados);
        $this->dados['users'] = $admUser->get_users($this->dados);
        $this->dados['data_inicio'] = date("2022-12-18");
        $this->dados['data_fim'] =  date("2022-12-24");

        $this->dados['forma_pagamentos'] = $financeiro->get_form_pag($this->dados);

        $this->dados['agendamentos'] = $admUser->get_marcacao($this->dados);
       $carregarView = new \Core\ConfigView("Views/cliente/cad_marcacao", $this->dados);
       $carregarView->renderizar();
     }
}
