<?php include_once 'header.php'; ?>

<div class="container ml-1 px-2 p-3 bg-white ">
            <form action="" method="post" enctype="multipart/form">
                    <select class="form-control" name="">
                        <option value="">Selecione o local de vacinação</option>
                        
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
                    <select class="form-select" aria-label="">
                        <option selected>Selecine a Vacina</option>   
                    <?php if (!empty($nome_vacina)) : foreach ($nome_vacina as $vacina) : ?> 
                        <option name="vacina" value="<?php echo $vacina; ?>"> <?php echo $vacina; ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="">
                        <option selected>Selecine a Campanha</option>   
                    <?php if (!empty($nome_campanha)) : foreach ($nome_campanha as $campanha) : ?> 
                        <option name="campanha" value="<?php echo $campanha; ?>"> <?php echo $campanha; ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="data-vacinacao" class="form-control" id="formGroupExampleInput2" placeholder="NOME SERVIDOR">
                </div>
                <button type="submit" class="btn btn-primary">SALVAR</button>
                <?php  else : echo "";
                    endif; ?>
            </form>
   
</div>