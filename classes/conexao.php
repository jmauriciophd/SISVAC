<?php
class Conexao{
     protected $dbh;
    public function __construct(){        
        $pdo = 'mysql:dbname=dbsisvac;host=localhost';
        $user = 'root';
        $password = '';        
        return $this->dbh= new PDO($pdo, $user, $password);        
    } 
}
