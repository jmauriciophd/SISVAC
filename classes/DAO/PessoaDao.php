<?php
require './classes/Conexao.php';
require './classes/Usuarios.class.php';
class PessoaDao extends Conexao{
    public function __construct(){
           parent::__construct();          
     }
    public function consultaDados($valor){
            $pessoa = new Usuarios();
            $array = array();
            $sql = "SELECT tb_usuarios.NOME,tb_usuarios.RAMAL,tb_usuarios.LOTACAO,tb_usuarios.SITUACAO,
           tb_usuarios.TIPO_SERV
            FROM tb_usuarios            
            WHERE tb_usuarios.NICK_MAT ='$valor'" ;
            $res= $this->dbh->query($sql);    

            if($res->rowCount() > 0){
                return $array = $res->fetchAll();                
            }
    }
    public function getNick(){
        $array = array();
          $sql = "SELECT tb_usuarios.NICK_MAT
        FROM tb_usuarios";
        $res= $this->dbh->query($sql);   

        if($res->rowCount() > 0){
            return $array = $res->fetchAll();                
        }
}
public function cadastarUsuario($NICK,$SENHA,$TIPO){
    $array = array();
      $sql = "INSERT INTO  tb_usuarios.sis('','NICK','PASSWORD','') VALUES('$NICK','$SENHA','$TIPO')";
      echo $sql;
    $res= $this->dbh->query($sql);   
    if($res->rowCount() > 0){
        return true;             
    }else{
        return false;
        }
    }    
}