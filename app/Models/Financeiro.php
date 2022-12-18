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
            $query_val = "SELECT * FROM dividas order by id DESC";
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


    public function get_form_pag(array $dados = null){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = "SELECT * FROM forma_pagamento";
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

    public function get_forma(array $dados = null){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = "SELECT * FROM forma_pagamento WHERE id = :id";
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


    public function salve_forma_pag(array $dados = null){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = "INSERT INTO forma_pagamento (nome,taxa,tipo_taxa,status) 
            VALUES (:nome, :taxa, :tipo_taxa , :st)";
            $result_val = $this->conn->prepare($query_val);
            $result_val->bindParam(":nome", $this->dados['nome'], PDO::PARAM_STR);
            $result_val->bindParam(":taxa", $this->dados['taxa'], PDO::PARAM_STR);
            $result_val->bindParam(":tipo_taxa", $this->dados['tipo_taxa'], PDO::PARAM_STR);
            $result_val->bindParam(":st", $this->dados['status'], PDO::PARAM_STR);
            if ($result_val->execute()) {
                $this->resultadoBd[0] = "Log Insert Forma Pagamento";
                $this->resultadoBd["Forma_Pagamento"] = $this->dados;
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
            $query_val = "UPDATE forma_pagamento SET nome = :nome, taxa = :taxa, tipo_taxa = :tipo_taxa, status = :st WHERE id = :id";
            $result_val = $this->conn->prepare($query_val);
            
            $result_val->bindParam(":nome", $this->dados['nome'], PDO::PARAM_STR);
            $result_val->bindParam(":taxa", $this->dados['taxa'], PDO::PARAM_STR);
            $result_val->bindParam(":tipo_taxa", $this->dados['tipo_taxa'], PDO::PARAM_STR);
            $result_val->bindParam(":st", $this->dados['status'], PDO::PARAM_STR);
            $result_val->bindParam(":id", $this->dados['id'], PDO::PARAM_STR);

            if ($result_val->execute()) {
                $this->resultadoBd[0] = "Log Update Forma Pagamento ";
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
            $query_val = "INSERT INTO dividas (valor, descricao, data_gasto, data_hora_cri, data_hora_at, user_id) 
            VALUES (:valor,:descricao,:data_gasto,:data_hora_cri,:data_hora_at,:user_id)";
            $result_val = $this->conn->prepare($query_val);
            $result_val->bindParam(":descricao", $this->dados['descricao'], PDO::PARAM_STR);
            $result_val->bindParam(":valor", $this->dados['valor'], PDO::PARAM_STR);
            $result_val->bindParam(":data_gasto", $this->dados['data_gasto'], PDO::PARAM_STR);
            $result_val->bindParam(":data_hora_cri", $this->dados['data_hora_cri'], PDO::PARAM_STR);
            $result_val->bindParam(":data_hora_at", $this->dados['data_hora_at'], PDO::PARAM_STR);
            $result_val->bindParam(":user_id", $this->dados['user_id'], PDO::PARAM_STR);

            if ($result_val->execute()) {
                $this->resultadoBd[0] = "Log Insert Divida";
                $this->resultadoBd["divida"] = $this->dados;
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

    public function get_divida(array $dados = null)
    {
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = "SELECT * FROM dividas WHERE id = :id";
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


    public function delete_divida(array $dados = null)
    {
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = "DELETE FROM dividas WHERE id = :id";
            $result_val = $this->conn->prepare($query_val);
            $result_val->bindParam(":id", $this->dados['id'], PDO::PARAM_STR);
            if ($result_val->execute()) {
                $this->resultadoBd[0] = "Log Delete Divida";
                $this->resultadoBd["divida"] = $this->dados['id'];
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


    public function update_dividas(array $dados = null)
    {
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = "UPDATE dividas SET valor = :valor, descricao = :descricao, data_gasto = :data_gasto,data_hora_at = :data_hora_at WHERE id = :id";
            $result_val = $this->conn->prepare($query_val);
            $result_val->bindParam(":valor", $this->dados['valor'], PDO::PARAM_STR);
            $result_val->bindParam(":descricao", $this->dados['descricao'], PDO::PARAM_STR);
            $result_val->bindParam(":data_gasto", $this->dados['data_gasto'], PDO::PARAM_STR);
            $result_val->bindParam(":data_hora_at", $this->dados['data_hora_at'], PDO::PARAM_STR);
            $result_val->bindParam(":id", $this->dados['id'], PDO::PARAM_STR);

            if ($result_val->execute()) {
                $this->resultadoBd[0] = "Log Update Dividas";
                $this->resultadoBd["divida"] = $this->dados;
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
