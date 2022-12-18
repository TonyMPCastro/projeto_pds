<?php

namespace App\Controllers;

class Financeiro{

    private $dados;
    
    function __construct(){
        $verificarLogin = new \App\Lib\Adm();
    }


    public function dividas(){ //metodo que mostras a grid dividas
        $cliente = new \App\Models\Financeiro();
        $visualizarLogin = new \App\Models\AdmsUser();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $visualizarLogin->menu_adm($this->dados);
        $this->dados['dividas'] = $cliente->get_dividas($this->dados);
        $carregarView = new \Core\ConfigView("Views/cliente/dividas", $this->dados);
        $carregarView->renderizar();
    }


    public function formaPagamento(){//metodo que mostra a grid de forma de pagamento
        $cliente = new \App\Models\Financeiro();
        $visualizarLogin = new \App\Models\AdmsUser();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $visualizarLogin->menu_adm($this->dados);
        $this->dados['forma_pagamento'] = $cliente->get_form_pag($this->dados);
        $carregarView = new \Core\ConfigView("Views/cliente/pagamentos", $this->dados);
        $carregarView->renderizar();
    }


    public function onFormaPagamento(){//mostra o FORM de forma de pagamento
        $admUser = new \App\Models\AdmsUser();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);
        $carregarView = new \Core\ConfigView("Views/cliente/cad_pagamentos", $this->dados);
        $carregarView->renderizar();
    }

    public function onDividas(){//mostra o FORM de Dividas
        $admUser = new \App\Models\AdmsUser();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);
        $carregarView = new \Core\ConfigView("Views/cliente/cad_dividas", $this->dados);
        $carregarView->renderizar();
    }


    public function onFormaPagamentoSave(){ //Metodo para salvar a forma de pagamento
        $financeiro = new \App\Models\Financeiro();
        $this->dados['id'] = $_POST["id"] ? $_POST["id"] : null;
        $this->dados['nome'] = $_POST["nome"] ? $_POST["nome"] : null;
        $this->dados['valor'] = $_POST["valor"] ? $_POST["valor"] : null;
        $this->dados['status'] = $_POST["status"] ? $_POST["status"] : null;

        if ($this->dados['id']) {
            $ret = $financeiro->update_forma_pag($this->dados);
            if ($ret) {
            }
        } else {
            $ret = $financeiro->salve_forma_pag($this->dados);
            if ($ret) {
                $this->Exception = 's';
            }
        }
        
        $this->formaPagamento();
    }

    public function onDividasSave(){ //Metodo para salvar as Dividas
        $financeiro = new \App\Models\Financeiro();
        $this->dados['id'] = $_POST["id"] ? $_POST["id"] : null;
        $this->dados['descricao'] = $_POST["descricao"] ? $_POST["descricao"] : null;
        $this->dados['valor'] = $_POST["valor"] ? $_POST["valor"] : null;
        $this->dados['data_gasto'] = date("Y-m-d", strtotime($_POST["data_gasto"] ? $_POST["data_gasto"] : null));
        $this->dados['data_hora_cri'] = date("Y-m-d H:i:s");
        $this->dados['data_hora_at'] = date("Y-m-d H:i:s");
        $this->dados['user_id'] = $_SESSION['usuario_id'];

        if ($this->dados['id']) {

            $ret = $financeiro->update_dividas($this->dados);

            if ($ret) {
                $this->Exception = 'a';
            }

        } else {
            $ret = $financeiro->salve_dividas($this->dados);
            if ($ret) {
                $this->Exception = 's';
            }
        }
        
        $this->dividas();
    }

    public function onDelete_d()
    {

        $admUser = new \App\Models\AdmsUser();
        $admServico = new \App\Models\AdmServico();
        $this->dados['id'] = $_GET["id"] ? $_GET["id"] : null;

        $ret = $admServico->delete_servico($this->dados);
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);
        $this->dados['servicos'] = $admServico->get_servicos($this->dados);

        if ($ret) {
            $this->dados['status'] = 'd';
        } else {
            $this->dados['status'] = 'd_n';
        }


        $carregarView = new \Core\ConfigView("Views/adm/servico", $this->dados);
        $carregarView->renderizar();
    }


}
