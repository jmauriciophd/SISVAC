<?php
ini_set('display_errors', 1);
require 'environment.php';
$ip = $_SERVER['SERVER_ADDR'];
$nome_sistema = "SISVAC-SISTEMA DE VACINAS";
define('NOME_SIS',$nome_sistema);
define('BASE_URL',"http://".$ip.":8080/sisvac");


