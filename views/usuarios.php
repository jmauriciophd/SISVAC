<?php include_once 'header.php'; ?>

<div class="container ml-1 px-2 p-3 bg-white">
  <h3>Cadastro de Usuarios</h3>
  <?php if(!empty($msg)) { ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $msg; ?>
    </div>
  <?php } ?>
  <form action="" method="post" enctype="multipart/form">
    <div class="input-group form-group ml-1 px-2 p-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
      </div>
      <select id="nick"  name="nick" class="form-control">
        <?php if (!empty($NICK_MAT)) : foreach ($NICK_MAT as $nick) : ?>
            <option value="<?php echo $nick[0]; ?>"><?php echo $nick[0]; ?></option>
          <?php endforeach;
        else : ?><option value=''>Nenhum usuario encontrado na base</option><?php endif; ?>
      </select>
    </div>
    <div class="input-group form-group ml-1 px-2 p-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-key"></i></span>
      </div>
      <input type="password" class="form-control" name="password" MAXLENGTH="12" placeholder="SENHA">
    </div>
    <div class="form-check">
      <?php $valor = 2; ?>
      <input class="form-check-input" type="radio" value="1" <?php echo ($valor == 1) ? "checked" : null; ?> name="tipo" checked id="flexRadioDefault1">
      <label class="form-check-label" for="flexRadioDefault1">
        USUARIO ADMIN
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" value="2" <?php echo ($valor == 2) ? "checked" : null; ?> name="tipo" id="flexRadioDefault2">
      <label class="form-check-label" for="flexRadioDefault2">
        USUARIO COMUN
      </label>
    </div>
    <div class="form-group mb-3">
      <input type="submit" value="CADASTRAR" class="btn btn-primary float-right login_btn">
    </div>
  </form>

</div>