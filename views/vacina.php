<h3>Cadatro de Vacinas</h3>
    <form action="" method="post" enctype="multipart/form">
        <div class="mb-3">
        <input type="text" value="<?php echo $dado['NOME'];?>"  class="form-control" id="formGroupExampleInput2" placeholder="NOME SERVIDOR">
        </div>
        <div class="mb-3">
        <input type="text" value="<?php echo $dado['RAMAL'];?>" class="form-control" id="formGroupExampleInput2" placeholder="NOME SERVIDOR">
        </div>
        <div class="mb-3">               
        <input type="text" value="<?php echo $dado['SITUCAO'];?>" class="form-control" id="formGroupExampleInput2" placeholder="NOME SERVIDOR">
        </div>
        <button type="submit" class="btn btn-primary" >SALVAR</button>
</form>