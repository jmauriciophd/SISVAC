<div class="justify-content-center h-10 mt-3">
        <div class="card-body">
            <span class="barra-superior">
                <h2>Altere sua senha</h2>
            </span>
            <span>
                <?php if (!empty($msg)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $msg; ?>
                    </div>
                <?php } ?>
            </span>
            <form method="post">
                <div class="input-group form-group">
                    <div class="input-group-prepend ">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" required class="form-control" name="password" maxlength="20"  placeholder="SENHA">
                </div>
                <div class="input-group form-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" required class="form-control" name="novasenha" maxlength="20" placeholder="CONFIRME A SENHA">
                </div>
                <div class="form-group mt-3">
                    <input type="submit" value="Alterar" class="btn btn-primary float-right login_btn">
                </div>
            </form>
        </div>
    </div>
