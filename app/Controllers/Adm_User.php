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
}
