<?php include_once 'header.php'; ?>

<div class="container ml-1 px-2 p-3 bg-white ">
         <form action="" method="post" enctype="multipart/form">
                    <select class="form-control" name="local">
                        <option value="">Selecione o local de vacinação</option>
                        <?php global $localVacinado; if (!empty($local_vacina)) : foreach ($local_vacina as $local) : ?> 
                          <option  value="<?php echo $local['POSTO_VACINACAO']; ?>"> <?php echo $local['POSTO_VACINACAO']; ?></option>                          
                        <?php   endforeach; $localVacinado = $local['POSTO_VACINACAO']; endif; ?>
                    </select>                        
                </select>
           </form>
           <form method="post" id="formBuscar">
            <div class="mb-3 ">
                <label for="form" class="form-label">INFORME NICK OU MATRICULA:</label>
                <input type="text" class="form-control" id="valorCampo" onkeypress="executando()" name="valor" index="0" placeholder="CPF/MATRICULA">
            </div><br><br><br>
          </form>
            <form action="" method="post" enctype="multipart/form">
               <?php if(!empty($msg)) { ?>
                <div class="alert alert-danger" role="alert">
                <?php echo $msg; ?>
                </div>               
            <?php } if (!empty($dados_usuarios)) : foreach ($dados_usuarios as $dado) :  ?>
                <div class="mb-3">
                    <input type="text" name="nome" value="<?php echo $dado['NOME']; ?>" class="form-control" id="formGroupExampleInput2" placeholder="NOME SERVIDOR">
                </div>
                <div class="mb-3">
                    <input type="text" name="ramal" value="<?php echo $dado['RAMAL']; ?>" class="form-control" id="formGroupExampleInput2" placeholder="NOME SERVIDOR">
                </div>
                <div class="mb-3">
                    <input type="text" name="situacao" value="<?php echo $dado['SITUACAO']; ?>" class="form-control" id="formGroupExampleInput2" placeholder="NOME SERVIDOR">
                </div>
                <?php endforeach; ?>                    
                <div class="mb-3">
                    <select name="vacina" class="form-select" aria-label="">
                        <option selected>Selecione a Vacina</option>   
                    <?php if (!empty($nome_vacina)) : foreach ($nome_vacina as $vacina) : ?> 
                        <option  value="<?php echo $vacina['VAC_NOME']; ?>"> <?php echo $vacina['VAC_NOME']; ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <select name="campanha" class="form-select" aria-label="">
                        <option selected>Selecione a Campanha</option>   
                    <?php if (!empty($nome_campanha)) : foreach ($nome_campanha as $campanha) : ?> 
                        <option  value="<?php echo $campanha['NOME_CAMPANHA']; ?>"> <?php echo $campanha['NOME_CAMPANHA']; ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="number" name="dose" class="form-control" id="formGroupExampleInput2" placeholder="dose">
                </div>
                <div class="mb-3">
                    <input type="hidden" name="local" value="<?php echo $localVacinado; ?>" class="form-control" id="formGroupExampleInput2" placeholder="local">
                </div>
                <button type="submit" class="btn btn-primary">SALVAR</button>
                <?php  else : echo "";
                    endif; ?>
            </form>
   
</div>