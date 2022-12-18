<?php

namespace App\Models;

if (!defined('4578S9')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

use PDO;
use PDOException;


class AdmServico extends Conn
{

    private $dados;
    private $resultadoBd;
    private object $conn;


    public function get_servicos(array $dados = null)
    {
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = "SELECT * FROM servico";
            $result_val = $this->conn->prepare($query_val);
            $result_val->execute();
            $this->resultadoBd = json_decode(json_encode($result_val->fetchAll()), FALSE);
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


    public function get_servico(array $dados = null)
    {
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = "SELECT * FROM servico WHERE id = :id";
            $result_val = $this->conn->prepare($query_val);
            $result_val->bindParam(":id", $this->dados['id'], PDO::PARAM_STR);
            $result_val->execute();
            $this->resultadoBd = json_decode(json_encode($result_val->fetch()), FALSE);
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


    public function delete_servico(array $dados = null)
    {
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = "DELETE FROM servico WHERE id = :id";
            $result_val = $this->conn->prepare($query_val);
            $result_val->bindParam(":id", $this->dados['id'], PDO::PARAM_STR);
            if ($result_val->execute()) {
                $this->resultadoBd[0] = "Log Delete Servico";
                $this->resultadoBd["id_servico"] = $this->dados['id'];
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


    public function salve_servico(array $dados = null)
    {
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = "INSERT INTO servico (nome, valor, status) VALUES (:nome, :valor, :st)";
            $result_val = $this->conn->prepare($query_val);
            $result_val->bindParam(":nome", $this->dados['nome'], PDO::PARAM_STR);
            $result_val->bindParam(":valor", $this->dados['valor'], PDO::PARAM_STR);
            $result_val->bindParam(":st", $this->dados['status'], PDO::PARAM_STR);
            if ($result_val->execute()) {
                $this->resultadoBd[0] = "Log Insert Servico";
                $this->resultadoBd["id_servico"] = $this->dados;
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


    public function update_servico(array $dados = null)
    {
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = "UPDATE servico SET nome = :nome,valor = :valor, status = :st WHERE id = :id";
            $result_val = $this->conn->prepare($query_val);
            $result_val->bindParam(":id", $this->dados['id'], PDO::PARAM_STR);
            $result_val->bindParam(":nome", $this->dados['nome'], PDO::PARAM_STR);
            $result_val->bindParam(":valor", $this->dados['valor'], PDO::PARAM_STR);
            $result_val->bindParam(":st", $this->dados['status'], PDO::PARAM_STR);
            if ($result_val->execute()) {
                $this->resultadoBd[0] = "Log Update Servico";
                $this->resultadoBd["id_servico"] = $this->dados['id'];
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
}
