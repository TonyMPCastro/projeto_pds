<?php

namespace App\Controllers;

class Login
{

    private $dados;

    function __construct()
    {
        $verificarLogin = new \App\Lib\Adm();
    }


    public function index() {

        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $verificarLogin = new \App\Lib\Adm();
        $verificarLogin->verify_login();

        if (!empty($this->dados['SendLogin'])) {


            $visualizarLogin = new \App\Models\AdmsLogin();
            $captcha_data = $this->dados['g-recaptcha-response'];

            if ($captcha_data) {

                $visualizarLogin->login($this->dados);

                if ($visualizarLogin->getResultado()) {

                    if ($_SESSION['tipo_user_id'] == 2) {
                        $_SESSION['home'] = "home2/index";
                        $urlDestino = URL . $_SESSION['home'];
                    } else {

                        $_SESSION['home'] = "home/index";
                        $urlDestino = URL . $_SESSION['home'];
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
