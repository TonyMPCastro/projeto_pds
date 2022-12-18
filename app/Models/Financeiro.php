<?php

namespace App\Models;

if (!defined('4578S9')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

use PDO;
use PDOException;


class Financeiro extends Conn
{

    private $dados;
    private $resultadoBd;
    private object $conn;


    public function get_dividas(array $dados = null){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val_login = "SELECT * FROM dividas";
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


    public function get_form_pag(array $dados = null){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val_login = "SELECT * FROM forma_pagamento";
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


    public function salve_forma_pag(array $dados = null){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val_login = "INSERT INTO servico (nome, valor, status) VALUES (:nome, :valor, :st)";
            $result_val_login = $this->conn->prepare($query_val_login);
            $result_val_login->bindParam(":nome", $this->dados['nome'], PDO::PARAM_STR);
            $result_val_login->bindParam(":valor", $this->dados['valor'], PDO::PARAM_STR);
            $result_val_login->bindParam(":st", $this->dados['status'], PDO::PARAM_STR);
            if ($result_val_login->execute()) {
                $this->resultadoBd[0] = "Log Insert Servico";
                $this->resultadoBd["id_servico"] = $this->dados;
                $this->log(json_encode($this->resultadoBd,true));
                return true;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
           // echo $erro->getMessage();
            return false;
        }
    }


    public function update_forma_pag(array $dados = null){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val_login = "DELETE FROM servico WHERE id = :id";
            $result_val_login = $this->conn->prepare($query_val_login);
            $result_val_login->bindParam(":id", $this->dados['id'], PDO::PARAM_STR);
            if ($result_val_login->execute()) {
                $this->resultadoBd[0] = "Log Delete Servico";
                $this->resultadoBd["id_servico"] = $this->dados['id'];
                $this->log(json_encode($this->resultadoBd,true));
                return true;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
           // echo $erro->getMessage();
            return false;
        }
    }



    public function salve_dividas(array $dados = null)
    {
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val_login = "INSERT INTO dividas (valor, descricao, data_gasto, data_hora_cri, data_hora_at, user_id) 
            VALUES (:valor,:descricao,:data_gasto,:data_hora_cri,:data_hora_at,:user_id)";
            $result_val_login = $this->conn->prepare($query_val_login);
            $result_val_login->bindParam(":descricao", $this->dados['descricao'], PDO::PARAM_STR);
            $result_val_login->bindParam(":valor", $this->dados['valor'], PDO::PARAM_STR);
            $result_val_login->bindParam(":data_gasto", $this->dados['data_gasto'], PDO::PARAM_STR);
            $result_val_login->bindParam(":data_hora_cri", $this->dados['data_hora_cri'], PDO::PARAM_STR);
            $result_val_login->bindParam(":data_hora_at", $this->dados['data_hora_at'], PDO::PARAM_STR);
            $result_val_login->bindParam(":user_id", $this->dados['user_id'], PDO::PARAM_STR);

            if ($result_val_login->execute()) {
                $this->resultadoBd[0] = "Log Insert Servico";
                $this->resultadoBd["id_divida"] = $this->dados;
                $this->log(json_encode($this->resultadoBd,true));
                return true;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
           // echo $erro->getMessage();
            return false;
        }
    }


    public function update_dividas(array $dados = null)
    {
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val_login = "UPDATE dividas 
            SET valor = :valor, descricao = :descricao, data_gasto = :data_gasto,
            data_hora_at = :data_hora_at, user_id = :user_id
            WHERE id = :id";
            $result_val_login = $this->conn->prepare($query_val_login);
            $result_val_login->bindParam(":descricao", $this->dados['descricao'], PDO::PARAM_STR);
            $result_val_login->bindParam(":valor", $this->dados['valor'], PDO::PARAM_STR);
            $result_val_login->bindParam(":data_gasto", $this->dados['data_gasto'], PDO::PARAM_STR);
            $result_val_login->bindParam(":data_hora_at", $this->dados['data_hora_at'], PDO::PARAM_STR);
            $result_val_login->bindParam(":user_id", $this->dados['user_id'], PDO::PARAM_STR);
            if ($result_val_login->execute()) {
                $this->resultadoBd[0] = "Log Update Dividas";
                $this->resultadoBd["id_divida"] = $this->dados['id'];
                $this->log(json_encode($this->resultadoBd,true));
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
