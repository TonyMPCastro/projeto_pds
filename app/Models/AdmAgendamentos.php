<?php

namespace App\Models;

if (!defined('4578S9')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

use PDO;
use PDOException;


class AdmAgendamentos extends Conn
{

    private $dados;
    private $resultadoBd;
    private object $conn;


    public function get_em_aberto(array $dados = null){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = "SELECT m.id,m.servicos,m.user_id,
            u.nome_user,u.email,u.telefone,m.data_hora_cri,
            s.dia,h.horario,m.horario_agendado           
            FROM marcacao_servico m
            join user u on  m.user_id = u.id_user 
            join horarios h on m.horarios_id = h.id  
            join semana s on s.id = h.semana_id          
            where m.status = :st
            order by data_hora_cri ASC";
            
            $result_val = $this->conn->prepare($query_val);
            $result_val->bindParam(":st", $this->dados['status'], PDO::PARAM_STR);
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


    
    public function get_em_aberto_where(array $dados = null){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();
            $query_val = "SELECT m.id,m.servicos,m.user_id,
            u.nome_user,u.email,u.telefone,m.data_hora_cri,
            s.dia,h.horario,m.horario_agendado,f.nome as forma_pag           
            FROM marcacao_servico m
            join user u on  m.user_id = u.id_user 
            join forma_pagamento f on f.id = m.forma_pagamento_id
            join horarios h on m.horarios_id = h.id  
            join semana s on s.id = h.semana_id          
            where m.status = :st and m.horario_agendado >= :data_inicio
            and m.horario_agendado <= :data_fim
            order by data_hora_cri ASC";
            
            $result_val = $this->conn->prepare($query_val);
            $result_val->bindParam(":st", $this->dados['status'], PDO::PARAM_STR);
            $result_val->bindParam(":data_inicio", $this->dados['data_inicio'], PDO::PARAM_STR);
            $result_val->bindParam(":data_fim", $this->dados['data_fim'], PDO::PARAM_STR);
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
