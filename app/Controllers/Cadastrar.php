<?php

namespace App\Controllers;

if(!defined('4578S9')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}


class Cadastrar
{
    
    private $dados;
    
    public function index() {
       $carregarView = new \Core\ConfigView("Views/publico/cadastrar", $this->dados);
       $carregarView->renderizar();
    }
}
