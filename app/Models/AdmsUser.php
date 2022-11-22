<?php

namespace App\Models;

if(!defined('4578S9')){
    header("Location: /");
    die("Erro: Página não encontrada!");
}

use PDO;

class AdmsUser extends Conn
{

    private $dados;
    private $resultadoBd;
    private object $conn;


    //Função para busca grupos de menu do Usuario
    public function menu_adm(array $dados = null) {
        $this->dados = $dados;
        $this->conn = $this->connect();
        $query_val_login = "SELECT *
                FROM menu_item
                WHERE tipo_user_id =:id";
        $result_val_login = $this->conn->prepare($query_val_login);
        $result_val_login->bindParam(":id", $this->dados['id'], PDO::PARAM_STR);
        $result_val_login->execute();
        $this->resultadoBd = $result_val_login->fetchAll();
        if ($this->resultadoBd) {
          return $this->resultadoBd;
        }else{
            return $this->resultadoBd;
        }
    }


    public function get_users(array $dados = null) {
        $this->dados = $dados;
        $this->conn = $this->connect();
        $query_val_login = "SELECT u.id_user,t.id_tipo,u.nome_user,t.nome_tipo,status_user
                FROM user u
                JOIN tipo_user t on  t.id_tipo = u.tipo_user_id";
        $result_val_login = $this->conn->prepare($query_val_login);
        $result_val_login->execute();
        $this->resultadoBd = json_decode(json_encode($result_val_login->fetchAll()), FALSE);
        if ($this->resultadoBd) {
          return $this->resultadoBd;
        }else{
            return $this->resultadoBd;
        }
    }


    public function get_user(array $dados = null) {
        $this->dados = $dados;
        $this->conn = $this->connect();
        $query_val_login = "SELECT u.id_user,t.id_tipo,u.nome_user,t.nome_tipo,status_user
                FROM user u
                JOIN tipo_user t on  t.id_tipo = u.tipo_user_id
                WHERE id_user = :id";
        $result_val_login = $this->conn->prepare($query_val_login);
        $result_val_login->bindParam(":id", $this->dados['id_user'], PDO::PARAM_STR);
        $result_val_login->execute();
        $this->resultadoBd = json_decode(json_encode($result_val_login->fetch()), FALSE);
        if ($this->resultadoBd) {
          return $this->resultadoBd;
        }else{
            return $this->resultadoBd;
        }
    }

}
