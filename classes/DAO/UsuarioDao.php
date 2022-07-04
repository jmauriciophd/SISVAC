<?php
class UsuarioDao extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }
    public function isLogado()
    {
        if (isset($_SESSION['ID']) && !empty($_SESSION['ID'])) {
            return true;
        } else {
            return false;
        }
    }
    public function consultaDados($valor='')
    {
        $array = array();
        $sql = "SELECT tb_usuarios.NOME,tb_usuarios.RAMAL,tb_usuarios.LOTACAO,tb_usuarios.FUNCAO,
           tb_usuarios.TIPO_SERV
            FROM tb_usuarios            
            WHERE tb_usuarios.NICK_MAT ='$valor' LIMIT 1";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return $array = $res->fetchAll();
        }else{
            return false;
        }
    }
    public function consultaTodos()
    {
        $array = array();       

        $sql = "SELECT count(*) as 'totalusuarios' FROM tb_usuarios";

        $res = $this->dbh->query($sql);

        if ($res->rowCount() > 0) {
            return $array = $res->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public function consultaNick($nick)
    {
        $sql = "SELECT *
      FROM tb_usuarios_sis WHERE NICK_USER = '$nick'";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getNickSis($id)
    {
        $sql = "SELECT tb_usuarios.NICK_MAT
      FROM tb_usuarios WHERE id='$id' ORDER BY NICK_MAT ASC";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return $array = $res->fetch();
        }
    }
    //CONSULTA NICK/MATRICULA DO USUARIO
    public function getNick($nick = '')
    {
        $array = array();
        $sql = "SELECT tb_usuarios.NICK_MAT
        FROM tb_usuarios WHERE NICK_MAT='$nick'  ORDER BY NICK_MAT ASC";
    
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return $array = $res->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    //CADASTRA USUARIOS DO SISTEMA
    public function cadastrarUsuarioSis($NICK, $SENHA, $TIPO)
    {
        $sql = "INSERT INTO tb_usuarios_sis SET NICK_USER='$NICK', SENHA='$SENHA', TIPO_USER='$TIPO'";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function fazerLogin($nick, $senha)
    {
        $sql = "SELECT id,NICK_USER FROM tb_usuarios_sis WHERE NICK_USER='$nick' AND SENHA='$senha'";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return $_SESSION['ID'] = $res->fetchAll();
        } else {
            return false;
        }
    }
    public function cadastrarUsuarioAvulso($CPF, $nomeusuario, $telefone, $lotacao, $situcao, $funcao, $tipoServidor)
    {
        $sql = "INSERT INTO tb_usuarios SET NICK_MAT='$CPF', NOME='$nomeusuario', RAMAL='$telefone',LOTACAO='$lotacao', SITUACAO='$situcao', FUNCAO='$funcao',TIPO_SERV='$tipoServidor'";
        $res = $this->dbh->query($sql);

        if ($res->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function alterarSenha($senhaalterada){
        $sql = "UPDATE  tb_usuarios_sis SET SENHA='$senhaalterada'";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
