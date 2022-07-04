<h3 class="mb-1">Cadastro de local de vacinação</h3>
<form method="post">
    <?php if(!empty($msg_cadastro)) { ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $msg_cadastro; ?>
        </div>
    <?php } ?>
    <div class="mb-3">
        <input type="text"  required name="localvacinacao" class="form-control" id="formGroupExampleInput2" placeholder="POSTO VACINACAO">
    </div>     
    <input type="submit" class="btn btn-primary" value="Cadastrar Posto">
    <a href="<?php echo BASE_URL."/home/campanha";?>"class="btn btn-danger">Voltar</a>
</form>
