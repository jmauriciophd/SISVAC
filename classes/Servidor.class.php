<?php
class Servidor extends Pessoa{
        private $tipoServidor;
        private $ramal;
        private $unidades;

        public function __construct(){

        }
        public function settipoServidor($nome){
                $this->nome = $nome;
        }
        public function gettipoServidor(){
                return $this->nome;
        }
        public function setRamal($ramal){
                $this->ramal = $ramal;
        }
        public function getRamal(){
                return $this->ramal;
        }
        public function  setUnidades($unidades){
                $this->unidades = $unidades;
        }
}