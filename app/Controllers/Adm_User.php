<?php

namespace App\Controllers;

use Throwable;

class Adm_User
{

    private $dados;
    private $Exception = false;
    function __construct()
    {
        $verificarLogin = new \App\Lib\Adm();
    }

    public function index()
    {
        $admUser = new \App\Models\AdmsUser();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);
        $this->dados['users'] = $admUser->get_users($this->dados);
        $this->dados['status'] = ($this->Exception)?$this->Exception:'n';
        $carregarView = new \Core\ConfigView("Views/adm/users", $this->dados);
        $carregarView->renderizar();
    }


    public function onEdit()
    {
        $admUser = new \App\Models\AdmsUser();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);
        $this->dados['id_user'] = $_GET["id_user"] ? $_GET["id_user"] : null;
        $this->dados['user'] = $admUser->get_user($this->dados);

        $carregarView = new \Core\ConfigView("Views/adm/cad_users", $this->dados);
        $carregarView->renderizar();
    }

    public function onDelete()
    {
        try { 

            $admUser = new \App\Models\AdmsUser();
            $this->dados['id_user'] = $_GET["id_user"] ? $_GET["id_user"] : null;
            $ret = $admUser->delete_user($this->dados);
            $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
            $this->dados['menu'] = $admUser->menu_adm($this->dados);
            $this->dados['users'] = $admUser->get_users($this->dados);

            if ($ret) {
                $this->dados['status'] = 'd';
            }else{
                 throw new Throwable("Erro");
            }

            $carregarView = new \Core\ConfigView("Views/adm/users", $this->dados);
            $carregarView->renderizar();
       } catch (\Throwable $th) {
            $this->Exception = 'd_n';
            $this->index();
        }
    }


    public function onShow(){
        $admUser = new \App\Models\AdmsUser();
        $this->dados['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);
        $carregarView = new \Core\ConfigView("Views/adm/cad_users", $this->dados);
        $carregarView->renderizar();
    }


    public function onSave(){
        $admServico = new \App\Models\AdmsUser();
        $this->dados['id_user'] = $_POST["id_user"] ? $_POST["id_user"] : null;
        $this->dados['nome_user'] = $_POST["nome_user"] ? $_POST["nome_user"] : null;
        $this->dados['email'] = $_POST["email"] ? $_POST["email"] : null;
        $this->dados['telefone'] = $_POST["telefone"] ? $_POST["telefone"] : null;
        $this->dados['cpf'] = $_POST["cpf"] ? $_POST["cpf"] : null;
        $this->dados['data_nascimento'] = $_POST["data_nascimento"] ? $_POST["data_nascimento"] : null;
        $this->dados['senha'] = $_POST["senha"] ? $_POST["senha"] : null;
        $this->dados['senhac'] = $_POST["senhac"] ? $_POST["senhac"] : null;
        $this->dados['tipo_user_id'] = $_POST["tipo_user_id"] ? $_POST["tipo_user_id"] : null;
        $this->dados['status_user'] = $_POST["status_user"] ? $_POST["status_user"] : null;




        if ($this->dados['id_user']) {
            $ret = $admServico->update_user($this->dados);
            if ($ret) {
                $this->Exception = 'a';
            }
        } else {
            $ret = $admServico->salve_user($this->dados);
            if ($ret) {
                $this->Exception = 's';
            }
        }
        
        $this->index();
    }
}
