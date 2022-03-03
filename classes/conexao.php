<?php
class Conexao{
    function __construct(){

        $dsn = 'mysql:dbname=dbsicvac;host=localhost';
        $user = 'root';
        $password = '';        
        
        $dbh = new PDO($dsn, $user, $password);
        return $dbh;
    }
    
    
}