<?php 
class UsuarioDao extends Conexao{
    public function __construct(){
           parent::__construct();          
     }
     public function isLogado(){
         if(isset($_SESSION['ID']) && !empty($_SESSION['ID'])){
             return true;
         }else{
             return false;
         }
     }
    public function consultaDados($valor){
            $array = array();
            $sql = "SELECT tb_usuarios.NOME,tb_usuarios.RAMAL,tb_usuarios.LOTACAO,tb_usuarios.SITUACAO,
           tb_usuarios.TIPO_SERV
            FROM tb_usuarios            
            WHERE tb_usuarios.NICK_MAT ='$valor' LIMIT 1" ;            
            $res= $this->dbh->query($sql); 
            if($res->rowCount() > 0){
                return $array = $res->fetchAll();                
            }
    }
    public function consultaNick($nick){        
        $sql = "SELECT *
      FROM tb_usuarios_sis WHERE NICK_USER = '$nick'";
      $res= $this->dbh->query($sql);   
      if($res->rowCount() > 0){
          return true;            
      }else{
          return false;
      }
    }
    public function getNick(){
        $array = array();
          $sql = "SELECT tb_usuarios.NICK_MAT
        FROM tb_usuarios ORDER BY NICK_MAT ASC";
        $res= $this->dbh->query($sql);   
        if($res->rowCount() > 0){
            return $array = $res->fetchAll();                
        }
    }   
    public function cadastarUsuario($NICK,$SENHA,$TIPO){
      $sql = "INSERT INTO tb_usuarios_sis SET NICK_USER='$NICK', SENHA='$SENHA', TIPO_USER='$TIPO'";
      $res= $this->dbh->query($sql);   
    if($res->rowCount() > 0){
        return true;             
    }else{
        return false;
        }
    }    
    public function fazerLogin($nick,$senha){        
         $sql = "SELECT id FROM tb_usuarios_sis WHERE NICK='$nick' AND SENHA='$senha'";
         $res= $this->dbh->query($sql);   
        if($res->rowCount() > 0){
            return $_SESSION['ID'] = $res->fetch();            
        }else{
            return false;
        }
    }
}