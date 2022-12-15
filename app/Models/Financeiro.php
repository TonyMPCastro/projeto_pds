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


    public function get_dividas(array $dados = null)
    {
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


    public function get_form_pag(array $dados = null)
    {
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

}
