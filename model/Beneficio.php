<?php 
    class Benficio  
    {
        private $cod;
        private $nome;
        private $operadora;
        private $tipo_beneficio;
        private $vencimento_contrato;

        public function __construct($cod, $nome, $operadora, $tipo_beneficio, $vencimento_contrato){
            $this->cod = $cod;
            $this->nome = $nome;
            $this->operadora = $operadora;
            $this->tipo_beneficio = $tipo_beneficio;
            $this->vencimento_contrato = $vencimento_contrato;
        }

        public function getCod(){
            return $this->cod;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getOperadora(){
            return $this->operadora;
        }

        public function getTipoBeneficio(){
            return $this->tipo_beneficio;
        }

        public function getVencimentoContrato(){
            return $this->vencimento_contrato;
        }
    }
    
?>