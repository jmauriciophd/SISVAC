<?php include_once 'header.php'; ?>
<div class="container ml-1 px-2 p-3 bg-white">
<h3>Cadastro de vacinas</h3>
<form method="post">
    <?php if(!empty($msg)) { ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $msg; ?>
        </div>
    <?php } ?>
    <div class="mb-3">
        <input type="text" name="nome_vacina"  class="form-control" id="formGroupExampleInput2" placeholder="NOME VACINA">
    </div>
    <div class="mb-3">
         <input type="text"  name="numerolote" class="form-control" id="formGroupExampleInput2" placeholder="NUMERO LOTE">
    </div>
    <div class="mb-3">
        <input type="text"  name="vacinatipo" class="form-control" id="formGroupExampleInput2" placeholder="TIPO DE VACINA">
    </div>
    <div class="mb-3">
        <input type="date"  name="datavalidade" class="form-control" id="formGroupExampleInput2" placeholder="">
    </div> 
    <div class="mb-3">
        <input type="text"  name="vacinafabricante" class="form-control" id="formGroupExampleInput2" placeholder="FABRICANTE">
    </div>     
    <input type="submit" class="btn btn-primary" value="Cadastrar">
</form>
</div>