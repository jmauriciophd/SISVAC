<h3>Cadatro de Usuarios</h3>
<form>
<div class="input-group form-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
    </div>
    <select>
        <?php foreach($nicks as $nick): ?>
         <option value="<?php echo $nick ?>"><?php echo $nick; ?></option>
         <?php endforeach; ?>
    </select>					
</div>
<div class="input-group form-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-key"></i></span>
    </div>
    <input type="password" class="form-control" name="password" placeholder="SENHA">
</div>					
<div class="form-group">
    <input type="submit" value="CADASTRAR" class="btn btn-primary float-right login_btn">
</div>
</form>