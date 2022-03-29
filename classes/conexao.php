<?php
class Conexao{
     protected $dbh;
    public function __construct(){        
        $pdo = 'mysql:dbname=dbsisvac;host=localhost';
        $user = 'root';
        $password = '';        
        try{
            return $this->dbh= new PDO($pdo, $user, $password); 
        }catch(PDOException $e){
            echo "Erro na conexao".$e->getMessage();
        }   
    } 
}
