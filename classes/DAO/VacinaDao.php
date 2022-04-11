<?php
class VacinaDao extends Conexao{
    public function __construct(){
        parent::__construct();
    }
    public function cadastraVacina($nome_vacina,$numerolote,$vacinatipo, $datavalidade,$vacinafabricante ){
        $sql = "INSERT INTO tb_vacina  SET VAC_NOME='$nome_vacina',	VAC_LOTE='$numerolote', VAC_TIPO='$vacinatipo',	VAC_DATVAL='$datavalidade',VAC_FABRICANTE='$vacinafabricante'";
        $res = $this->dbh->query($sql);
        if($res->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function consultaVacina(){
        $sql = "SELECT DISTINCT VAC_NOME FROM tb_vacina ORDER BY VAC_ID";
        $res= $this->dbh->query($sql);   
        if($res->rowCount() > 0){
          return $array = $res->fetchAll(PDO::FETCH_ASSOC);                
      }
    }
    public function isvacinado($vacina,$campanha,$localVacinado,$dose){
        $sql = "SELECT * FROM  tb_reg_vacinados WHERE  VACINA_APLICADA='$vacina' AND CAMPANHA_ATUAL ='$campanha' AND LOCAL_VACINADO='$localVacinado' AND DOSE= '$dose'";
        $res= $this->dbh->query($sql);   
        if($res->rowCount() > 0){
          return true;  
      }else{
           return false;
        }
    }
    public function notVacinado($nome,$vacina,$campanha,$dose,$localVacinado){
        $hora = date('H:i:s');
        $sql = "INSERT INTO tb_reg_vacinados  SET NOME_VACINADO='$nome',VACINA_APLICADA='$vacina', CAMPANHA_ATUAL='$campanha', LOCAL_VACINADO='$localVacinado',DOSE='$dose', REGV_DATA=NOW(),REGV_HORA='$hora'";
        $res = $this->dbh->query($sql);
        if($res->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

   public function qtdVacinados(){
        $array = array();
        $sql = "SELECT count(*) as 'totalvacinados' FROM tb_reg_vacinados";
        $res = $this->dbh->query($sql);
        if($res->rowCount() > 0){
            return $array= $res->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    public function qtdVacinadosDia(){
        $hoje = new DateTime();
        $array = array();
        $sql = "SELECT count(*) as 'qtdtotalvacinadosdia' FROM tb_reg_vacinados";
        $res = $this->dbh->query($sql);
        if($res->rowCount() > 0){
            return $array= $res->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
}