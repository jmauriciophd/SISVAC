<?php
class Usuarios{
    private $nome;
    private $cpf;
    private $matricula;
    private $idade;
            
    public function __construct(){        

    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setCPF($cpf){
        $this->cpf = $cpf;
    }
    public function getCPF(){
         return $this->cpf;
    }
    public function  setIdade($idade){
            $this->idade = $idade;
    }
    public function getIdade(){
            return $this->idade;
    }
    public function  setMatricula($matricula){
        $this->matricula = $matricula;
    }
    public function getMatricula(){
            return $this->matricula;
    }    
}