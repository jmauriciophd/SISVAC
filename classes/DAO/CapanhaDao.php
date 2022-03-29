<?php
class CapanhaDao extends Conexao{
    public function __construct(){
        parent::__construct();
    }

    public function cadastraCampanha($NOME_CAMPANHA,$PERIODO_INICIAL,$PERIODO_FINAL, $POSTO_VACINACAO){

        $sql = "INSERT INTO tb_campanhas SET NOME_CAMPANHA='$NOME_CAMPANHA', PERIODO_INICIAL='$PERIODO_INICIAL', 
        PERIODO_FINAL='$PERIODO_FINAL', POSTO_VACINACAO='$POSTO_VACINACAO'";
        $res = $this->dbh->query($sql);
        if($res->rowCount() > 0){
            return true;
        }else{
            return false;
        }

    }
    public function consultaCampanha(){
        $sql = "SELECT DISTINCT NOME_CAMPANHA FROM tb_campanhas ORDER BY NOME_CAMPANHA ASC";
        $res= $this->dbh->query($sql);   
        if($res->rowCount() > 0){
          return $array = $res->fetch(PDO::FETCH_ASSOC);                
      }
    }
}