<h3>Cadastro de campanhas</h3>
<hr>
<form method="post">
    
    <div class="mb-3">
        <input type="text"  required name="NOME_CAMPANHA"  class="form-control" id="formGroupExampleInput2" placeholder="NOME CAMPANHA E DATA Ex: NOME+ 00/00/0000">
    </div>
    <div class="mb-3">
    <label for="formGroupExample">PERIODO INICIAL</label>
        <input type="date"  name="PERIODO_INICIAL" class="form-control" id="formGroupExampleInput2" placeholder="PERIODO_INICIAL">
    </div>
    <div class="mb-3">
        <label for="formGroupExample">PERIODO FINAL</label>
        <input type="date"  name="PERIODO_FINAL" class="form-control" id="formGroupExampleInput2" placeholder="PERIODO_FINAL">
    </div>   
    <input type="submit" class="btn btn-primary" value="Cadastrar">
    <a href="<?php echo BASE_URL."/home/campanha";?>"class="btn btn-danger">Voltar</a>
</form>