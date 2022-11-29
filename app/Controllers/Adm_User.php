<?php

namespace App\Controllers;

class Adm_User
{

    private $dados;
    function __construct()
    {
        $verificarLogin = new \App\Lib\Adm();
    }

    public function index()
    {
        $admUser = new \App\Models\AdmsUser();
        $this->dados['id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);
        $this->dados['users'] = $admUser->get_users($this->dados);

        $carregarView = new \Core\ConfigView("Views/adm/users", $this->dados);
        $carregarView->renderizar();
    }


    public function onEdit()
    {
        $admUser = new \App\Models\AdmsUser();
        $this->dados['id'] = $_SESSION['tipo_user_id'];
        $this->dados['menu'] = $admUser->menu_adm($this->dados);

        $this->dados['id_user'] = $_GET["id_user"] ? $_GET["id_user"] : null;

        $this->dados['user'] = $admUser->get_user($this->dados);

        $this->dados['mode'] = 'Edit';

        $carregarView = new \Core\ConfigView("Views/adm/cad_users", $this->dados);
        $carregarView->renderizar();
    }


    public function onShow()
    {
        $this->index();
    }
}
