<?php

namespace App\Models;

if (!defined('4578S9')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

use PDO;
use PDOException;


class AdmCliente extends Conn
{

    private $dados;
    private $resultadoBd;
    private object $conn;


    public function get_em_aberto(array $dados = null)
    {
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = "SELECT m.id,m.servicos,m.user_id,
            u.nome_user,u.email,u.telefone,m.data_hora_cri,
            s.dia,h.horario            
            FROM marcacao_servico m
            join user u on  m.user_id = u.id_user 
            join horarios h on m.horarios_id = h.id  
            join semana s on s.id = h.semana_id          
            where m.status = 1
            order by data_hora_cri ASC";
            
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

}
