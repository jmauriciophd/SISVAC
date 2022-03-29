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
        $sql = "SELECT DISTINCT VAC_NOME FROM tb_vacina ORDER BY VAC_ID ASC LIMIT 1";
        $res= $this->dbh->query($sql);   
        if($res->rowCount() > 0){
          return $array = $res->fetch(PDO::FETCH_ASSOC);                
      }
    }
}