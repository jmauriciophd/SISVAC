<?php include_once 'header.php'; ?>
<div class="container ml-1 px-2 p-3 border"  style="margin-top: 70px;">
<h3>Cadastro de vacinas</h3>
<form method="post">
    <?php if(!empty($msg)) { ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $msg; ?>
        </div>
    <?php } ?>
    <div class="mb-3">
        <input type="text" required name="nome_vacina"  class="form-control" id="input-id" placeholder="NOME VACINA">
    </div>
    <div class="mb-3">
         <input type="text"  required name="numerolote" class="form-control" id="formGroupExampleInput2" placeholder="NUMERO LOTE">
    </div>
    <div class="mb-3">
        <input type="text"  required name="vacinatipo" class="form-control" id="formGroupExampleInput2" placeholder="TIPO DE VACINA">
    </div>
    <div class="mb-3">
        <input type="date" required name="datavalidade" class="form-control" id="formGroupExampleInput2" placeholder="">
    </div> 
    <div class="mb-3">
        <input type="text" required  name="vacinafabricante" class="form-control" id="formGroupExampleInput2" placeholder="FABRICANTE">
    </div>   
    <div class="mb-3">
        <input type="text" required  name="dose" class="form-control" id="formGroupExampleInput2" placeholder="DOSE APLICADA">
    </div>  
    <input type="submit" class="btn btn-primary" onclick="focusMethod()" value="Cadastrar">
</form>
</div>