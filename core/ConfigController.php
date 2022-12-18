<?php

namespace Core;

if(!defined('4578S9')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}

class ConfigController
{

    private string $url;
    private array $urlConjunto;
    private string $urlController;
    private string $urlMetodo;

    public function __construct() {
        if (!empty(filter_input(INPUT_GET, "url", FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);
            $this->urlConjunto = explode("/", $this->url);
            
            if ((isset($this->urlConjunto[0])) AND (isset($this->urlConjunto[1]))) {
                $this->urlController = $this->urlConjunto[0];
                $this->urlMetodo = $this->urlConjunto[1];
            } else {

                if(isset($_SESSION['usuario_id']) AND isset($_SESSION['usuario_nome'])  AND isset($_SESSION['usuario_email']) ){
                    if( $_SESSION['tipo_user_id'] == 2){
                        $this->urlController = "home2";
                        $this->urlMetodo = "index";
                    }else{
                        $this->urlController = "home";
                        $this->urlMetodo = "onShow";   
                    }
                }else{
                    $this->urlController = "login";
                    $this->urlMetodo = "index";   
                }

                
            }
        } else {
            $this->urlController = "login";
            $this->urlMetodo = "index";
        }
    }
    
    public function carregar() {
        $this->config();
        $valPermissao = new \Core\Permissao();
        $valPermissao->index($this->urlController);
        $urlController = ucwords($this->urlController);
        $classe = "\\App\\Controllers\\" . $urlController;
        
        $classeCarregar = new $classe;

        if($this->urlMetodo == "index"){
          $classeCarregar->index();  
        }

        if($this->urlMetodo == "onShow"){
            $classeCarregar->onShow();  
          }

          if($this->urlMetodo == "onSave"){
            $classeCarregar->onSave();  
          }

          if($this->urlMetodo == "onEdit"){
            $classeCarregar->onEdit();  
          }

          if($this->urlMetodo == "onEdit_d"){
            $classeCarregar->onEdit_d();  
          }

          if($this->urlMetodo == "onEdit_f"){
            $classeCarregar->onEdit_f();  
          }


          if($this->urlMetodo == "onDelete"){
            $classeCarregar->onDelete();  
          }

          if($this->urlMetodo == "onDelete_d"){
            $classeCarregar->onDelete_d();  
          }

          if($this->urlMetodo == "dividas"){
            $classeCarregar->dividas();  
          }

          if($this->urlMetodo == "onDividas"){
            $classeCarregar->onDividas();  
          }
          
          if($this->urlMetodo == "onDividasSave"){
            $classeCarregar->onDividasSave();  
          }
          
          if($this->urlMetodo == "formaPagamento"){
            $classeCarregar->formaPagamento();  
          }

          if($this->urlMetodo == "onFormaPagamento"){
            $classeCarregar->onFormaPagamento();  
          }

          if($this->urlMetodo == "onFormaPagamentoSave"){
            $classeCarregar->onFormaPagamentoSave();  
          }

          
        
    }
    
    private function config() { //Define a Raiz do sistema
        define('URL', 'http://localhost/projeto_pds/');
    }

}
