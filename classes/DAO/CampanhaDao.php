<?php
class CampanhaDao extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cadastraCampanha($NOME_CAMPANHA, $PERIODO_INICIAL, $PERIODO_FINAL)
    {
        $sql = "INSERT INTO tb_campanhas SET NOME_CAMPANHA='$NOME_CAMPANHA', PERIODO_INICIAL='$PERIODO_INICIAL', 
        PERIODO_FINAL='$PERIODO_FINAL'";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function consultaCampanha()
    {
        $sql = "SELECT  NOME_CAMPANHA,PERIODO_INICIAL,	
        PERIODO_FINAL	FROM tb_campanhas ORDER BY NOME_CAMPANHA ASC";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return $array = $res->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    public function consultaLocal($local_vacinacao = '')
    {
        if (!empty($local_vacinacao)) {
            $sql = "SELECT posto_de_vacinacao FROM tb_local_vacinacao WHERE posto_de_vacinacao='$local_vacinacao'  ORDER BY ID ASC";
            $res = $this->dbh->query($sql);
            if ($res->rowCount() > 0) {
                 return true;
            }
        } else {
            $sql = "SELECT * FROM tb_local_vacinacao ORDER BY ID ASC";
            $res = $this->dbh->query($sql);
            if ($res->rowCount() > 0) {
                return $array = $res->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        }
    }
    public function cadastrarLocal($local_vacinacao)
    {
        if (!$this->consultaLocal($local_vacinacao)) {
            $sql = "INSERT INTO tb_local_vacinacao  SET posto_de_vacinacao='$local_vacinacao'";
            $res = $this->dbh->query($sql);
            if ($res->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
}
