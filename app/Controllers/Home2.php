<?php

namespace App\Controllers;

class Home2
{
    
    private $dados;
    private $Exception = false;

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
        $this->dados['status'] = ($this->Exception) ? $this->Exception : '';

       $carregarView = new \Core\ConfigView("Views/public_cliente/marcacao", $this->dados);
       $carregarView->renderizar();
     }

    public function onShow(){
        $admUser = new \App\Models\AdmsUser();
        $admServico = new \App\Models\AdmServico();

        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);
        $this->dados['servicos'] = $admServico->get_servicos_w($this->dados);
        $this->dados['semanas'] = $admServico->get_semanas($this->dados);
        $this->dados['horarios'] = $admServico->get_horarios($this->dados);


      
        $carregarView = new \Core\ConfigView("Views/public_cliente/cad_marcacao", $this->dados);
        $carregarView->renderizar();
    }


    public function onEdit(){
        $admUser = new \App\Models\AdmsUser();
        $admServico = new \App\Models\AdmServico();
        $this->dados['id'] = $_GET["id"] ? $_GET["id"] : null; 
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id']; 
        $this->dados['servico'] = $admServico->get_m_servico($this->dados);
        $this->dados['menu'] = $admUser->menu_adm($this->dados);
        $this->dados['servicos'] = $admServico->get_servicos_w($this->dados);
        $this->dados['semanas'] = $admServico->get_semanas($this->dados);
        $this->dados['horarios'] = $admServico->get_horarios($this->dados);
     
        $carregarView = new \Core\ConfigView("Views/public_cliente/cad_marcacao", $this->dados);
        $carregarView->renderizar();
    }

    public function onSave(){
        $admServico = new \App\Models\AdmServico();
        
        $this->dados['id'] = $_POST["id"] ? $_POST["id"] : null;
        $this->dados['forma_pagamento_id'] = 5;
        $this->dados['horarios_id'] = $_POST["horario"] ? $_POST["horario"] : null;
        $this->dados['user_id'] = $_SESSION['usuario_id'];
        $this->dados['horario_agendado'] = null;
        $this->dados['data_hora_cri'] = date("Y-m-d H:i:s");
        $this->dados['data_hora_at'] = date("Y-m-d H:i:s");
        $this->dados['status'] = 1;

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
