<?php

namespace App\Models;

if(!defined('4578S9')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}

use PDO;
class AdmsLogin extends Conn
{

    private $dados;
    private bool $resultado = false;
    private $resultadoBd;
    private object $conn;

    function getResultado(): bool {
        return $this->resultado;
    }

    public function login(array $dados = null) {
        $this->dados = $dados;
        $this->conn = $this->connect();
        $query_val_login = "SELECT id_user, nome_user, email,tipo_user_id
                FROM user
                WHERE email =:email and senha = md5(:senha) LIMIT 1";
        $result_val_login = $this->conn->prepare($query_val_login);
        $result_val_login->bindParam(":email", $this->dados['usuario'], PDO::PARAM_STR);
        $result_val_login->bindParam(":senha", $this->dados['senha'], PDO::PARAM_STR);

        $result_val_login->execute();
        $this->resultadoBd = $result_val_login->fetch();
        if ($this->resultadoBd) {
          // print_r($this->resultadoBd);
            $this->validar();
        } else {
            $_SESSION['nao_autenticado'] = true;
            $this->resultado = false;
        }
    }

    private function validar() {
            
            $_SESSION['tipo_user_id'] = $this->resultadoBd['tipo_user_id'];
            $_SESSION['usuario_id'] = $this->resultadoBd['id_user'];
            $_SESSION['usuario_nome'] = $this->resultadoBd['nome_user'];
            $_SESSION['usuario_email'] = $this->resultadoBd['email'];
            date_default_timezone_set('America/Sao_Paulo');
            $this->resultadoBd['data_hora_acesso'] = date("d/m/Y H:i:s");
            $this->log(json_encode($this->resultadoBd,true));

            $this->resultado = true;
    }


}
