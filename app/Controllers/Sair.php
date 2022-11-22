<?php

namespace App\Controllers;

if(!defined('4578S9')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}

class Sair
{
    public function index() {
        unset($_SESSION['usuario_id'], $_SESSION['usuario_nome'], $_SESSION['usuario_email'], $_SESSION['tipo_user_id']);
        $urlDestino = URL . 'login/index';
        session_destroy();
        header("Location: $urlDestino");
    }
}
