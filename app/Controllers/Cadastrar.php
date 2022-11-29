<?php

namespace App\Controllers;


class Cadastrar
{

    private $dados;
    
    function __construct(){
        $verificarLogin = new \App\Lib\Adm();

    }

    public function index()
    {
        $verificarLogin = new \App\Lib\Adm();
        $verificarLogin->verify_login();

        $carregarView = new \Core\ConfigView("Views/publico/cadastrar", $this->dados);
        $carregarView->renderizar();
    }
}
