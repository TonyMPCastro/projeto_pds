<?php

namespace App\Controllers;

if (!defined('4578S9')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

class Login
{

    private $dados;

    public function index()
    {

        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->dados['SendLogin'])) {
            $visualizarLogin = new \App\Models\AdmsLogin();
            $captcha_data = $this->dados['g-recaptcha-response'];

            if ($captcha_data) {

                $visualizarLogin->login($this->dados);
                if ($visualizarLogin->getResultado()) {

                    if ($_SESSION['tipo_user_id'] == 2) {

                        $urlDestino = URL . "aluno/index";
                    } else {

                        $urlDestino = URL . "home/onShow";
                    }


                    header("Location: $urlDestino");
                } else {
                    $this->dados['form'] = $this->dados;
                }
            } else {
                $this->dados['form'] = $this->dados;
            }
        }

        $carregarView = new \Core\ConfigView("Views/login/login", $this->dados);
        $carregarView->renderizar();
    }
}
