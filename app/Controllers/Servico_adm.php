<?php

namespace App\Controllers;

use stdClass;

class Servico_adm
{

    private $dados;
    private $Exception = false;

    function __construct()
    {
        $verificarLogin = new \App\Lib\Adm();
    }


    public function index()
    {
        $visualizarLogin = new \App\Models\AdmsUser();
        $admServico = new \App\Models\AdmServico();

        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $visualizarLogin->menu_adm($this->dados);
        $this->dados['servicos'] = $admServico->get_servicos($this->dados);
        $this->dados['status'] = ($this->Exception) ? $this->Exception : '';
        $carregarView = new \Core\ConfigView("Views/adm/servico", $this->dados);
        $carregarView->renderizar();
    }

    public function onEdit()
    {
        $admUser = new \App\Models\AdmsUser();
        $admServico = new \App\Models\AdmServico();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);
        $this->dados['id'] = $_GET["id"] ? $_GET["id"] : null;
        $this->dados['servico'] = $admServico->get_servico($this->dados);

        $carregarView = new \Core\ConfigView("Views/adm/cad_servico", $this->dados);
        $carregarView->renderizar();
    }


    public function onDelete()
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

    public function onShow()
    {
        $admUser = new \App\Models\AdmsUser();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);
        $carregarView = new \Core\ConfigView("Views/adm/cad_servico", $this->dados);
        $carregarView->renderizar();
    }


    public function onSave(){
        $admServico = new \App\Models\AdmServico();
        $this->dados['id'] = $_POST["id"] ? $_POST["id"] : null;
        $this->dados['nome'] = $_POST["nome"] ? $_POST["nome"] : null;
        $this->dados['valor'] = $_POST["valor"] ? $_POST["valor"] : null;
        $this->dados['status'] = $_POST["status"] ? $_POST["status"] : null;

        if ($this->dados['id']) {
            $ret = $admServico->update_servico($this->dados);
            if ($ret) {
                $this->Exception = 'a';
            }
        } else {
            $ret = $admServico->salve_servico($this->dados);
            if ($ret) {
                $this->Exception = 's';
            }
        }
        
        $this->index();
    }
}
