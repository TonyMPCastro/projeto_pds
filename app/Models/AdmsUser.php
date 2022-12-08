<?php

namespace App\Models;

if (!defined('4578S9')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

use PDO;
use PDOException;


class AdmsUser extends Conn
{

    private $dados;
    private $resultadoBd;
    private object $conn;


    //Função para busca grupos de menu do Usuario
    public function menu_adm(array $dados = null)
    {
        try {
            $this->dados = $dados;

            if (isset($_SESSION['menu'])) {

                if ($_SESSION['menu'][0]['tipo_user_id'] == $this->dados['tipo_user_id']) {
                    return $_SESSION['menu'];
                }

            } 
            

                $this->conn = $this->connect();
                $query_val_login = "SELECT *
                FROM menu_item
                WHERE tipo_user_id =:id";
                $result_val_login = $this->conn->prepare($query_val_login);
                $result_val_login->bindParam(":id", $this->dados['tipo_user_id'], PDO::PARAM_STR);
                $result_val_login->execute();
                $this->resultadoBd = $result_val_login->fetchAll();
                if ($this->resultadoBd) {
                    $_SESSION['menu'] = $this->resultadoBd;
                    return $this->resultadoBd;
                } else {
                    throw new PDOException("Erro: Não foi possível executar a declaração sql");
                    return $this->resultadoBd;
                }
            
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }


    public function get_users(array $dados = null)
    {
        try {
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
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
                return $this->resultadoBd;
            }
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }


    public function get_user(array $dados = null)
    {
        try {
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
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
                return $this->resultadoBd;
            }
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }


    public function delete_user(array $dados = null)
    {

        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val_login = "DELETE FROM user WHERE id_user = :id";
            $result_val_login = $this->conn->prepare($query_val_login);
            $result_val_login->bindParam(":id", $this->dados['id_user'], PDO::PARAM_STR);

            if ($result_val_login->execute()) {

                $this->resultadoBd[0] = "Log Delete User";
                $this->resultadoBd["id_user"] = $this->dados['id_user'];
                $this->log(json_encode($this->resultadoBd, true));
                return true;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            // echo $erro->getMessage();
            return false;
        }
    }

    public function sair()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $this->resultadoBd['tipo_user_id'] = $_SESSION['tipo_user_id'];
        $this->resultadoBd['id_user'] = $_SESSION['usuario_id'];
        $this->resultadoBd['nome_user'] = $_SESSION['usuario_nome'];
        $this->resultadoBd['email'] = $_SESSION['usuario_email'];
        $this->resultadoBd['data_hora_saida'] = date("d/m/Y H:i:s");
        $this->resultadoBd[0] = "Log Saida";
        $this->log(json_encode($this->resultadoBd, true));
    }


    public function get_tipo_users(array $dados = null)
    {
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val_login = "SELECT * FROM tipo_user";
            $result_val_login = $this->conn->prepare($query_val_login);
            $result_val_login->execute();
            $this->resultadoBd = json_decode(json_encode($result_val_login->fetchAll()), FALSE);
            if ($this->resultadoBd) {
                return $this->resultadoBd;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
                return $this->resultadoBd;
            }
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}
