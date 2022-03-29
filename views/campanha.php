<?php include_once 'header.php'; ?>
<div class="container ml-1 px-2 p-3 bg-white">
<h3>Cadastro de campanhas</h3>
<form method="post">
    <?php if(!empty($msg)) { ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $msg; ?>
        </div>
    <?php } ?>
    <div class="mb-3">
        <input type="text" name="NOME_CAMPANHA"  class="form-control" id="formGroupExampleInput2" placeholder="NOME CAMPANHA">
    </div>
    <div class="mb-3">
    <label for="formGroupExample">PERIODO INICIAL</label>
        <input type="date"  name="PERIODO_INICIAL" class="form-control" id="formGroupExampleInput2" placeholder="PERIODO_INICIAL">
    </div>
    <div class="mb-3">
        <label for="formGroupExample">PERIODO FINAL</label>
        <input type="date"  name="PERIODO_FINAL" class="form-control" id="formGroupExampleInput2" placeholder="PERIODO_FINAL">
    </div>
    <div class="mb-3">
        <input type="text"  name="POSTO_VACINACAO" class="form-control" id="formGroupExampleInput2" placeholder="POSTO VACINACAO">
    </div>     
    <input type="submit" class="btn btn-primary" value="Cadastrar">
</form>
</div>