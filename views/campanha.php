<?php include_once 'header.php'; ?>

<div class="container ml-1 px-2 p-3 border"  style="margin-top: 70px;">
<form method="post">
    <input type="hidden" name="novacampanha">
    <input type="submit" name="novacampanha" class="btn btn-success" value="Nova Campanha">  
    <input type="hidden" name="novolocal">
    <input type="submit" name="novolocal" class="btn btn-success" value="Novo Local">      
</form>
<?php if(!empty($msg)) { ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $msg; ?>
        </div>
    <?php } ?>
<?php
    if(isset($_POST['novacampanha']) && !empty($_POST['novacampanha'])):
        include_once('novacampanha.php');
    else:?>        
        <table class="table table-striped">
                <thead>
                    <tr scope="row" class="text-center">
                        <h3>Campanhas cadastradas</h3>
                    <tr>
                </thead>
                <thead>
                    <th scope="row">CAMPANHA</th>
                    <th scope="col">PERIODO INICIAL</th>
                    <th scope="col">PERIODO FINAL</th>
                    <th scope="col">ACAO</th>
                </thead>
                <tbody>
                    <?php foreach ($todascampanhas as $campanha) : ?>
                        <tr>
                            <td scope="row">
                                <?php echo $campanha['NOME_CAMPANHA']; ?>
                            </td>
                            <td scope="row">
                                <?php echo $campanha['PERIODO_INICIAL']; ?>
                            </td>
                            <td scope="row">
                                <?php echo $campanha['PERIODO_FINAL']; ?>
                            </td>
                            <td scope="row">
                               
                            </td>
                        <?php endforeach; ?>
                        </tr>
                </tbody>
            </table>
    <?php endif;
    if(isset($_POST['novolocal']) && !empty($_POST['novolocal'])):
        include_once('novolocal.php');
    else:?>        
        <table class="table table-striped">
                <thead>
                    <tr scope="row" class="text-center">
                        <h3>Postos Cadastrados</h3>
                    <tr>
                </thead>
                <thead>
                    <th scope="row">LOCAL</th>               
                    <th scope="col">ACAO</th>
                </thead>
                <tbody>
                    <?php foreach ($localvacinacao as $local) : ?>
                        <tr>
                            <td scope="row">
                                <?php echo $local['posto_de_vacinacao']; ?>
                            </td>                            
                            <td scope="row">
                               editar
                            </td>
                    <?php endforeach; ?>
                        </tr>
                </tbody>
            </table>
    <?php endif;?>
</div>