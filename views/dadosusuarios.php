   <form method="post" id="formBuscar">
       <div class="mb-3 ">
           <label for="form" class="form-label">INFORME NICK OU MATRICULA:</label>
           <input type="text" required class="form-control" name="valor" tabindex=0 index="0" id="valorCampo" placeholder="NICK/MATRICULA">
       </div><br>
       <?php
        if (isset($_POST['valor']) && empty($_POST['valor'])) { ?>
           <div class="alert alert-danger" role="alert">
               <?php echo "Campo NICK/MATRICULA vazio"; ?>
           </div>
       <?php } ?>
       <?php if (!empty($msg)) {  ?>
           <div class="alert alert-success" role="alert">
               <?php echo $msg; ?>
           </div>
       <?php } ?>
   </form>
   <form action="" class="cadastrar_reg" method="post" enctype="multipart/form">
       <?php
        if (!empty($dados_usuarios)) :
            foreach ($dados_usuarios as $dado) : ?>
               <div class="mb-3">
                   <input type="text" name="nome" required value="<?php echo $dado['NOME']; ?>" class="form-control" placeholder="NOME SERVIDOR">
               </div>
               <div class="mb-3">
                   <input type="text" name="ramal" required value="<?php echo $dado['RAMAL']; ?>" class="form-control" placeholder="RAMAL">
               </div>
               <div class="mb-3">
                   <input type="text" name="funcao" required value="<?php echo $dado['FUNCAO']; ?>" class="form-control" placeholder="FUNCAO">
               </div>
           <?php endforeach; ?>
           <div class="mb-3">
               <select required name="vacina" class="form-select" aria-label="">
                   <?php if (!empty($nome_vacina)) :  foreach ($nome_vacina as $vacina) : ?>
                           <option value="<?php echo $vacina['VAC_NOME'] . $vacina['VAC_LOTE']; ?>"> <?php echo $vacina['VAC_NOME'] . "-" . $vacina['VAC_LOTE']; ?></option>
               </select>
           </div>
           <div class="mb-3">
               <input type="text" value="<?php echo $vacina['DOSE']; ?>" required name="dose" class="form-control" id="formGroupExampleInput2" placeholder="dose">
           </div>
   <?php endforeach;
                    endif; ?>
   <div class="mb-3">
   </div>
   <input type="submit" tabindex="1" id="valorCampo2" index="1" class="btn btn-primary" value="Gravar">
   <?php
        endif; ?>
   </form>
   <div class="container ml-1 px-3 p-3 ">
       <table class="table table-striped">
           <thead>
               <tr>
                   <th>
                       TOTAL VACINADOS NESTE POSTO DIA
                       <span class="c-circular-progress c-circular-progress">
                        <?php
                            foreach ($vacinadospostodia as $vacinadopostodia) {
                            echo $vacinadopostodia['vacinadosdiaposto'] . "";
                        } ?> </span>

                   </th>
                   <th>TOTAL VACINADOS NESTE POSTO
                       <span class="c-circular-progress c-circular-progress">
                           <?php
                            if (!empty($vacinadosposto)) {
                                echo $vacinadosposto['vacinadosposto'];
                            } else {
                                echo "0";
                            }
                            ?>
                       </span>
                   </th>
                   <th>VACINADOS HOJE <span class="c-circular-progress">
                        <?php
                        foreach ($qtdvacinadosdia as $vacinadosdia) {
                            echo $vacinadosdia['vacinadosdia'] . "";
                        } ?>
                       </span></th>
                   <th>TOTAL VACINADOS NESTA CAMPANHA <span class="c-circular-progress">
                           <?php foreach ($qtdvacinados as $vacinados) {
                                echo $vacinados['totalvacinados'];
                                foreach ($consultaTodos as $totalusuarios) {
                                    echo "/" . $totalusuarios['totalusuarios'];

                                    $porcentagem = ($vacinados['totalvacinados'] / $totalusuarios['totalusuarios']) * 100;
                                    echo "<br><span class='span_percent'>" . number_format($porcentagem, 0, '') . "%</span>";
                                }
                            } ?></span>

                   </th>
               </tr>
           </thead>
       </table>
       <table class="table table-striped">
           <thead>
               <tr scope="row" class="text-center">
                   <h5>ULTIMOS VACINADOS</h5>
                   <form method="post" action="">
                       <input type="text" class="btn_pesquisar" name="pesquisavacinado" placeholder="PESQUISE SE FOI VACINADO">
                       <input type="submit" value="Consulta Vacinado" class="ml-1 btn btn-primary ">
                       <input type="submit" value="Limpar Consulta" class="btn btn-danger">
                   </form>
               <tr>
           </thead>
           <thead>
               <th scope="row">NOME VACINADO</th>
               <th scope="col">VACINA APLICADA</th>
               <th scope="col">DOSE APLICADA</th>
               <th scope="col">LOCAL VACINADO</th>
               <th scope="col">HORA</th>
           </thead>
           <?php if (isset($_POST['pesquisavacinado']) && !empty($_POST['pesquisavacinado'])) : /*CARREGA VACINADOS*/ ?>
               <tbody>
                   <?php if (!empty($ifvacinado)) : foreach ($ifvacinado as $sevacinado) : ?>
                           <tr>
                               <td scope="row">
                                   <?php echo $sevacinado['NOME_VACINADO']; ?>
                               </td>
                               <td scope="row">
                                   <?php echo $sevacinado['VACINA_APLICADA']; ?>
                               </td>
                               <td scope="row">
                                   <?php echo $sevacinado['DOSE']; ?>
                               </td>
                               <td scope="row">
                                   <?php echo $sevacinado['LOCAL_VACINADO']; ?>
                               </td>
                               <td scope="row">
                                   <?php echo date('d-m-Y', strtotime($sevacinado['REGV_DATA'])) . " " . $sevacinado['REGV_HORA']; ?>
                               </td>
                               <td scope="row">
                                   <form action="#alterardados" method="post">
                                       <input type="hidden" name="alterar" />
                                       <input type="submit" value="Alterar" />
                                   </form>
                               </td>
                               <?php //Altera dados clientes
                            endforeach;
                        else : ?>
                       <td scope="row">
                           <?php echo "<span class='text-danger'>Nenhum resultado encontrado</span>"; ?>
                       </td>
                   <?php endif; ?>
                           </tr>
               </tbody>
           <?php else : ?>
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
                               <?php echo $ultimoVacinados['LOCAL_VACINADO']; ?>
                           </td>
                           <td scope="row">
                               <?php echo date('d-m-Y', strtotime($ultimoVacinados['REGV_DATA'])) . " " . $ultimoVacinados['REGV_HORA']; ?>
                           </td>
                       <?php endforeach; ?>
                       </tr>
               </tbody>
           <?php endif; ?>
         
   </div>