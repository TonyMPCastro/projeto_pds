<?php

namespace App\Controllers;


class Pendentes
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
        $this->dados['status'] = 1;
        $this->dados['lista_em_abertas'] = $admAgend->get_em_aberto($this->dados);
        $this->dados['servicos'] = $admServico->get_servicos($this->dados);
        $this->dados['status'] = ($this->Exception) ? $this->Exception : '';
        $carregarView = new \Core\ConfigView("Views/cliente/pendentes", $this->dados);
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
        $this->dados['data_inicio'] = date("Y-m-d");
        $this->dados['data_fim'] =  date('Y-m-d', strtotime(date("Y-m-d"). ' + 7 days'));
        $this->dados['forma_pagamentos'] = $financeiro->get_form_pag($this->dados);
        $this->dados['agendamentos'] = $admUser->get_marcacao($this->dados);
       $carregarView = new \Core\ConfigView("Views/cliente/cad_marcacao", $this->dados);
       $carregarView->renderizar();
     }

     public function onEdit() {
        $admUser = new \App\Models\AdmsUser();
        $admServico = new \App\Models\AdmServico();
        $financeiro = new \App\Models\Financeiro();
        $this->dados['id'] = $_GET["id"] ? $_GET["id"] : null;
        $this->dados['servico'] = $admServico->get_m_servico($this->dados);
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);
        $this->dados['semanas'] = $admServico->get_semanas($this->dados);
        $this->dados['servicos'] = $admServico->get_servicos_w($this->dados);
        $this->dados['horarios'] = $admServico->get_horarios($this->dados);
        $this->dados['users'] = $admUser->get_users($this->dados);
        $this->dados['data_inicio'] = date("Y-m-d");
        $this->dados['data_fim'] =  date('Y-m-d', strtotime(date("Y-m-d"). ' + 7 days'));
        $this->dados['forma_pagamentos'] = $financeiro->get_form_pag($this->dados);

        $this->dados['agendamentos'] = $admUser->get_marcacao($this->dados);
       $carregarView = new \Core\ConfigView("Views/cliente/cad_marcacao", $this->dados);
       $carregarView->renderizar();
     }


     public function onSave(){
        $admServico = new \App\Models\AdmServico();
        
        $this->dados['id'] = $_POST["id"] ? $_POST["id"] : null;
        $this->dados['forma_pagamento_id'] = 5;
        $this->dados['horarios_id'] = $_POST["horario"] ? $_POST["horario"] : null;
        $this->dados['user_id'] = $_POST["cliente"] ? $_POST["cliente"] : null;
        $this->dados['horario_agendado'] = date("Y-m-d H:i:s",strtotime($_POST["horario_agendado"] ? $_POST["horario_agendado"] : null));
        $this->dados['data_hora_cri'] = date("Y-m-d H:i:s");
        $this->dados['data_hora_at'] = date("Y-m-d H:i:s");
        $this->dados['status'] = 2;

        $servicos = $admServico->get_servicos_w($this->dados);

        $s_form = "";

        foreach ($servicos as $s) {
			$a = isset($_POST["id_".$s->id]) ? true : false;
            if($a){
               $s_form .= ';'.$s->id; 
            }		
		}

        $this->dados['servicos'] = $s_form;

        if ($this->dados['id']) {
            $ret = $admServico->update_m_servico($this->dados);
            if ($ret) {
                $this->Exception = 'a';
            }else{
                $this->Exception = 'a_n';
            }
        } else {
            $ret = $admServico->salve_m_servico($this->dados);
            if ($ret) {
                $this->Exception = 's';
            }else{
                $this->Exception = 's_n';
            }
        }
        
        $this->index();
    }
}
