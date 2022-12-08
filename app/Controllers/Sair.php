<?php

namespace App\Controllers;

class Sair
{


    function __construct()
    {
        $verificarLogin = new \App\Lib\Adm();
    }

    public function index() {
        $admUser = new \App\Models\AdmsUser();
        $admUser->sair();
        unset($_SESSION['usuario_id'], $_SESSION['usuario_nome'], $_SESSION['usuario_email'], $_SESSION['tipo_user_id']);
        $urlDestino = URL . 'login/index';
        session_destroy();
        header("Location: $urlDestino");
    }
}
