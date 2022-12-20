<?php

namespace Core;

if(!defined('4578S9')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}

class Permissao
{
    private string $urlController;
    private array $pgPublica;
    private array $pgRestrita;
    private string $resultado;
    
    function getResultado(): string {
        return $this->resultado;
    }

    public function index($urlController): void {
        $this->urlController = $urlController;
        
        $this->pgPublica = ["login", "sair", "cadastrar"];
        
        if(in_array($this->urlController, $this->pgPublica)){
            $this->resultado = $this->urlController;
        }else{
            $this->pgRestrita();
        }
    }
    
    private function pgRestrita(): void {

        if( $_SESSION['tipo_user_id'] == 2){

            $this->pgRestrita = ["home2"];
        }else{

            $this->pgRestrita = [
                
                "home", 
                "adm",
                "adm_user",
                "servico_adm",
                "pendentes",
                "agendados",
                "ordens",
                "financeiro"
            ];
        }

        
        if(in_array($this->urlController, $this->pgRestrita)){
            $this->verificarLogin();
        }else{
            $_SESSION['nao_autenticado'] = true;
            $urlDestino = URL . 'login/index';
            header("Location: $urlDestino");
        }
    }
    
    private function verificarLogin(): void {
        if(isset($_SESSION['usuario_id']) AND isset($_SESSION['usuario_nome'])  AND isset($_SESSION['usuario_email']) ){
            $this->resultado = $this->urlController;
        }else{
            $_SESSION['nao_autenticado'] = true;
            $urlDestino = URL . 'login/index';
            header("Location: $urlDestino");
        }
    }
    
}
