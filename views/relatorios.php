<div class="container ml-1 px-3 p-3 ">
<ul class="nav nav-tabs1 center">
    <li class="nav-item nav-tabs1"><a class="nav-link  " href="<?php BASE_URL?>/home/vacinadospordia">VACINADOS POR DIA</a></li>
    <li class="nav-item nav-tabs1"><a class="nav-link " href="<?php BASE_URL?>/home/vacinadosporposto">VACINADOS POR POSTO</a></li>
    <li class="nav-item nav-tabs1"><a class="nav-link " href="<?php BASE_URL?>/home/postoepordia">POSTO E DIA</a></li>
    <li class="nav-item nav-tabs1"><a class="nav-link " href="<?php BASE_URL?>/home/porperido">POR PERIODO</a></li>
</ul>
<!--
    

                <thead>

                    <tr>
                    <th>
                        TOTAL VACINADOS NESTE POSTO DIA
                            <span class="c-circular-progress c-circular-progress"><?php
                                foreach ($vacinadospostodia as $vacinadopostodia) {
                                    echo $vacinadopostodia['vacinadosdiaposto'] . "";
                                } ?> </span>    
                                
                        </th>
                        <th>TOTAL VACINADOS NESTE POSTO
                            <span class="c-circular-progress c-circular-progress"><?php
                                      if(!empty($vacinadosposto)){
                                            echo $vacinadosposto['vacinadosposto'];
                                         }else{
                                            echo "0";
                                         }
                                    ?>                                 
                            </span>
                        </th>
                        <th>VACINADOS HOJE <span class="c-circular-progress"> <?php
                                foreach ($qtdvacinadosdia as $vacinadosdia) {
                                    echo $vacinadosdia['vacinadosdia'] . "";
                                } ?>
                                </span></th>
                        <th>TOTAL VACINADOS NESTA CAMPANHA <span class="c-circular-progress">
                            <?php foreach ($qtdvacinados as $vacinados) {
                                      echo $vacinados['totalvacinados'];
                                    foreach ($consultaTodos as $totalusuarios) {
                                       echo "/".$totalusuarios['totalusuarios'];

                                       $porcentagem = ($vacinados['totalvacinados']/$totalusuarios['totalusuarios'])*100;
                                       echo "<br><span class='span_percent'>".number_format($porcentagem,0,'')."%</span>";
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
                                <input type="submit" value="Consulta Vacinado" class="btn btn-primary">
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
                <?php if(isset($_POST['pesquisavacinado']) && !empty($_POST['pesquisavacinado'])):?>
                       <tbody>                           
                       <?php if(!empty($ifvacinado)): foreach ($ifvacinado as $sevacinado) : ?>
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
                                   <?php echo date('d-m-Y',strtotime($sevacinado['REGV_DATA']))." ".$sevacinado['REGV_HORA']; ?>
                               </td>
                           <?php endforeach;else:?>
                            <td scope="row">
                                   <?php echo "<span class='text-danger'>Nenhum resultado encontrado</span>"; ?>
                               </td>
                        <?php endif; ?>
                           </tr>
                   </tbody>                   
                <?php else: ?>
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
                                    <?php echo date('d-m-Y',strtotime($ultimoVacinados['REGV_DATA']))." ".$ultimoVacinados['REGV_HORA']; ?>
                                </td>
                            <?php endforeach; ?>
                            </tr>
                    </tbody>
                    <?php endif; ?>
            </table>