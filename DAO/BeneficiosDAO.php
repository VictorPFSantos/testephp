<?php
    require_once('../Conexao.php');
    require_once("../model/Beneficio.php");
    
    class BeneficiosDAO{
        
        private $con;

        public function __construct(){
            $bd = new Conexao("localhost", "root", "", "testephp");
            $this->con = $bd->getConnect();
        }
        
        public function listAll(){
            $beneficios = [];
            
            $sql = "SELECT * FROM beneficios";
            $regs = $this->con->query($sql)->fetchAll();

            if(count($regs) > 0){
                return $regs;
            }else{
                return null;
            }
        }

        public function store($benefit){
            $data = [
                'nome'          => $benefit['nome'],
                'operadora'     => $benefit['operadora'],
                'tipo'          => $benefit['tipo'],
                'vencimento'    => $benefit['vencto']
            ];

            $sql = "INSERT INTO beneficios (nome, operadora, tipo, vencimento) VALUES (:nome, :operadora, :tipo, :vencimento)";
            $result = $this->con->prepare($sql)->execute($data);

            if($result){
                return $this->con->lastInsertId();
            }
            else
                return null;
        }

        public function destroy($cod){
            $data = array('cod' => $cod);

            $sql = "DELETE FROM beneficios WHERE cod=:cod";
            $result = $this->con->prepare($sql)->execute($data);

            if($result){
                return $this->con->lastInsertId();
            }
            else
                return null;
        }


    }
?>