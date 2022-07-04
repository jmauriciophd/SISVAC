<?php
class PermissaoDao extends Conexao
{
    public function __construct()
    {
        parent::__construct();
        
    }
    public function consultaTipoPermissao($nick)
    {
        $sql = "SELECT TIPO_USER FROM tb_usuarios_sis WHERE NICK_USER = '$nick'";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
           return $_SESSION['nivel']= $res->fetch();
        }else{
            return false;
        }
    }   
}
