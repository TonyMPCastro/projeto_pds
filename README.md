# projeto_pds
 
 No diretorio app/Models
 
 crie o arquivo Conn.php
 
 <?php

namespace App\Models;

if (!defined('4578S9')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

use PDO;

class Conn
{
    
    private string $db = "mysql";
    private string $host = "localhost";//Host de acesso
    private string $user = "root";//usuario de acesso
    private string $pass = "";//Senha de acesso
    private string $dbname = "edukar_gestao"; //nome do banco
    public object $connect;


    protected function connect()
    {
        $this->connect = new PDO($this->db . ':host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);
        $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->connect;
    }

    public function log($msg)
    {
        // Abre ou cria o arquivo bloco1.txt
        // "a" representa que o arquivo é aberto para ser escrito

        $path = "app/log/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $fp = fopen($path."log_login.json", "a");
        // Escreve a mensagem passada através da variável $msg
        $escreve = fwrite($fp,$msg);
        // Fecha o arquivo
        fclose($fp);
    }
}
