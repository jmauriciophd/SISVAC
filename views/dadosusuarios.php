   
        <form method="post" id="formBuscar">
            <div class="mb-3 ">
                <label for="form" class="form-label">INFORME NICK OU MATRICULA:</label>
                <input type="text" required class="form-control" name="valor" tabindex=0 index="0"  id="valorCampo"  placeholder="NICK/MATRICULA">
            </div><br>
            <?php  
            if(isset($_POST['valor']) && empty($_POST['valor'])){?>                   
                <div class="alert alert-danger" role="alert">
                    <?php  echo "Campo NICK/MATRICULA vazio"; ?> 
                </div>
         <?php }?>
          <?php if(!empty($msg)){  ?>                
                <div class="alert alert-success" role="alert">
                    <?php  echo $msg; ?> 
                </div>
         <?php }?>
        </form>        
        <form action="" class="cadastrar_reg" method="post" enctype="multipart/form">            
                <?php                     
                    if(!empty($dados_usuarios)): 
                    foreach ($dados_usuarios as $dado):?>
                    <div class="mb-3">
                        <input type="text" name="nome" required value="<?php echo $dado['NOME']; ?>" class="form-control"  placeholder="NOME SERVIDOR">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="ramal" required value="<?php echo $dado['RAMAL']; ?>" class="form-control"  placeholder="NOME SERVIDOR">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="funcao" required value="<?php echo $dado['FUNCAO']; ?>" class="form-control"  placeholder="NOME SERVIDOR">
                    </div>
                <?php endforeach; ?>
                <div class="mb-3">
                    <select required name="vacina" class="form-select" aria-label="">
                        <?php if (!empty($nome_vacina)):  foreach ($nome_vacina as $vacina) : ?>
                                <option value="<?php echo $vacina['VAC_NOME']; ?>"> <?php echo $vacina['VAC_NOME']; ?></option>

                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" value="<?php echo $vacina['DOSE']; ?>" required name="dose" class="form-control" id="formGroupExampleInput2" placeholder="dose">
                </div>
                <?php endforeach;
                        endif; ?>
        <div class="mb-3">
        </div>
        <input type="submit" tabindex="1"  id="valorCampo2"   index="1"  onclick="focusMethod()" class="btn btn-primary" value="Gravar">
        <?php 
            endif; ?>
        </form>
        <div class="container ml-1 px-3 p-3 ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>TOTAL VACINADOS NESTE POSTO
                            <span class="c-circular-progress c-circular-progress--<?php
                                echo count($vacinadosposto);
                                ?>">                             
                                </span>
                        </th>
                        <th>VACINADOS HOJE <span class="c-circular-progress c-circular-progress--<?php
                                foreach ($qtdvacinadosdia as $vacinadosdia) {
                                    echo $vacinadosdia['vacinadosdia'] . "";
                                } ?>">
                                </span></th>
                        <th>TOTAL VACINADOS <span class="c-circular-progress c-circular-progress--<?php foreach ($qtdvacinados as $vacinados) {
                                    echo $vacinados['totalvacinados'];
                                } ?>">
                               </span>
                        </th>
                    </tr>
                </thead>
            </table>
            <table class="table table-striped">
                <thead>
                    <tr scope="row" class="text-center">
                        <h5>ULTIMOS VACINADOS</h5>
                    <tr>
                </thead>
                <thead>
                    <th scope="row">NOME VACINADO</th>
                    <th scope="col">VACINA APLICADA</th>
                    <th scope="col">DOSE APLICADA</th>
                    <th scope="col">HORA</th>
                </thead>
                <tbody>
                    <?php foreach ($ultimosVacinados as $ultimoVacinados) : ?>
                        <tr>
                            <td scope="row">
                                <?php echo $ultimoVacinados['NOME_VACINADO']; ?>
                            </td>
                            <td scope="row">
                                <?php echo $ultimoVacinados['VACINA_APLICADA']; ?>
                            </td>
                            <td scope="row">
                                <?php echo $ultimoVacinados['DOSE']; ?>
                            </td>
                            <td scope="row">
                                <?php echo $ultimoVacinados['REGV_HORA']; ?>
                            </td>
                        <?php endforeach; ?>
                        </tr>
                </tbody>
            </table>
        </div>