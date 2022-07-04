<?php
class VacinaDao extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }
    public function cadastraVacina($nome_vacina, $numerolote, $vacinatipo, $datavalidade, $vacinafabricante, $dose)
    {
        $sql = "INSERT INTO tb_vacina  SET VAC_NOME='$nome_vacina',	VAC_LOTE='$numerolote', VAC_TIPO='$vacinatipo',	VAC_DATVAL='$datavalidade',VAC_FABRICANTE='$vacinafabricante',DOSE= '$dose'";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function consultaVacina()
    {   
        $hoje =  date("Y-m-d");
        $sql = "SELECT  DISTINCT VAC_NOME,DOSE,VAC_LOTE FROM tb_vacina ORDER BY VAC_LOTE LIMIT 1";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return $array = $res->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }   
    public function isvacinado($vacina, $campanha, $localVacinado, $dose)
    {
        $sql = "SELECT * FROM  tb_reg_vacinados WHERE  VACINA_APLICADA='$vacina' AND CAMPANHA_ATUAL ='$campanha' AND LOCAL_VACINADO='$localVacinado' AND DOSE= '$dose'";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function ifvacinado($pequisavacinado)
    {
        $sql = "SELECT * FROM  tb_reg_vacinados WHERE  NOME_VACINADO LIKE '%$pequisavacinado%'";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return $array = $res->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public function notVacinado($nome, $vacina, $campanha, $dose, $localVacinado)
    {
        // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
        date_default_timezone_set('America/Sao_Paulo');
        // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
        $hora = date('H:i:s', time());

        $sql = "INSERT INTO tb_reg_vacinados  SET NOME_VACINADO='$nome',VACINA_APLICADA='$vacina', 
        CAMPANHA_ATUAL='$campanha', LOCAL_VACINADO='$localVacinado',DOSE='$dose', REGV_DATA=NOW(),REGV_HORA='$hora'";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function ultimosVacinados()
    {
        $array = array();
        $sql = "SELECT * FROM tb_reg_vacinados ORDER BY `tb_reg_vacinados`.`REGV_ID` DESC LIMIT 20";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return $array = $res->fetchAll();
        }
    }

    public function qtdVacinados()
    {
        $array = array();
        $CAMPANHA_ATUAL = $_SESSION['nome_campanha'];

        $sql = "SELECT count(*) as 'totalvacinados' FROM tb_reg_vacinados WHERE CAMPANHA_ATUAL='$CAMPANHA_ATUAL'";

        $res = $this->dbh->query($sql);

        if ($res->rowCount() > 0) {
            return $array = $res->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public function qtdVacinadosDia()
    {   $CAMPANHA_ATUAL = $_SESSION['nome_campanha'];
        $hoje =  date("Y-m-d");
        $array = array();
        $sql = "SELECT  COUNT(*) as vacinadosdia  FROM tb_reg_vacinados WHERE REGV_DATA = '$hoje' and CAMPANHA_ATUAL = '$CAMPANHA_ATUAL'";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return $array = $res->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public function qtdVacinadosDiaPosto($sessao)
    {   $CAMPANHA_ATUAL = $_SESSION['nome_campanha'];
        $hoje =  date("Y-m-d");
        $array = array();
        $sql = "SELECT  COUNT(*) as vacinadosdiaposto  FROM tb_reg_vacinados WHERE CAMPANHA_ATUAL = '$CAMPANHA_ATUAL' and LOCAL_VACINADO='$sessao' and REGV_DATA = '$hoje' ORDER BY REGV_DATA  DESC ";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return $array = $res->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public function vacinadosPosto($posto)
    {
        $CAMPANHA_ATUAL = $_SESSION['nome_campanha'];
        $array = array();
        $sql = "SELECT COUNT(*) as vacinadosposto FROM tb_reg_vacinados WHERE LOCAL_VACINADO= '$posto' and CAMPANHA_ATUAL = '$CAMPANHA_ATUAL'";
        $res = $this->dbh->query($sql);
        if ($res->rowCount() > 0) {
            return $array = $res->fetch(PDO::FETCH_ASSOC);
        } else {
            return 0;
        }
    }
}
