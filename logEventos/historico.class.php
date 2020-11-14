<?php 
    class Historico {
        private $pdo;

        public function __construct() {
            $this->pdo = new PDO("mysql: host=localhost; dbname=log_eventos", "root", "root");
        }

        public function registrar($acao) {
            $ip = $_SERVER["REMOTE_ADDR"];

            $sql = " INSERT INTO historico SET ip=:ip, data_acao=NOW(), acao=:acao ";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":ip", $ip);
            $sql->bindValue(":acao", $acao);
            $sql->execute();
        }
        
    }





?>