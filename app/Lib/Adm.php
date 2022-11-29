<?php
namespace App\Lib;

class Adm{


    function __construct(){
        if(!defined('4578S9')){
            $urlDestino = URL . 'login/index';
            header("Location: $urlDestino");
        }
    }

    public function verify_login(){


        if (isset($_SESSION['usuario_id']) and isset($_SESSION['usuario_nome'])  and isset($_SESSION['usuario_email'])) {
           
            if ($_SESSION['tipo_user_id'] == 2) {

                $urlDestino = URL . "cliente/index";
            } else {

                $urlDestino = URL . "home/onShow";
            }

            header("Location: $urlDestino");

        } else {

           return;
        }
    }
}
