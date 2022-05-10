<?php include_once 'header.php';?>
<div class="container ml-1 px-2 p-3 border">
  <h3>Cadastro de usuarios avulso</h3>
  <?php if (!empty($msg)) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $msg; ?>
      </div>
    <?php } ?>
  <form action="" class="cadastrar_reg" method="post" enctype="multipart/form">    
    <div class="mb-3">
      <input type="text" required name="CPF" value="<?php echo $_SESSION['CPF']; ?>" class="form-control" placeholder="CPF DO USUÁRIO">
    </div>
    <div class="mb-3">
      <input type="text" required name="nomeusuario" class="form-control"  placeholder="NOME DO USUÁRIO">
    </div>
    <div class="mb-3">
      <input type="text" required name="telefone" class="form-control"placeholder="TELEFONE DO USUÁRIO">
    </div>
    <input type="submit" class="btn btn-primary" tabindex="0" value="Cadastrar">
    <a href="<?php echo BASE_URL;?>"class="btn btn-primary">Voltar</a>
  </form>
  </form>
</div>