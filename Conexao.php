<?php

    // $pdo = new PDO("mysql:host=localhost;")

    class Conexao 
    {
        private $host;
        private $user;
        private $pass;
        private $tb;

        
        function __construct($host, $user, $pass, $tb){
            $this->host = $host;
            $this->user = $user;
            $this->pass = $pass;
            $this->tb = $tb;
        }

        public function getConnect(){
            try{
                $pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->tb, $this->user, $this->pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(Exception $err){
                echo "Error: ".$err->message;
            }finally{
                return $pdo;
            }
        }
    }
    
?>