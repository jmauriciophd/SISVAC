<?php include_once 'header.php'; ?>

<div class="container ml-1 px-2 p-3 "  style="margin-top: 70px;">
      <form action="" method="post" enctype="multipart/form">              
            <div class="mb-3">
                <select name="campanha" class="form-select" required aria-label="">
                    <option required disabled >Selecione a Campanha</option>   
                <?php if(!empty($nome_campanha)) : foreach ($nome_campanha as $campanha) : ?> 
                    <option  value="<?php  echo $campanha['NOME_CAMPANHA']; ?>"> <?php echo $campanha['NOME_CAMPANHA']." de ".date('d-m-Y',strtotime($campanha['PERIODO_INICIAL']))." a ". date('d-m-Y',strtotime($campanha['PERIODO_FINAL'])); ?></option>
                    <?php endforeach;    endif; ?>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" name="local">
                    <option required disabled  value="Selecione o local de vacinação">Selecione o local de vacinação</option>                    
                        <?php  if(!empty($local_vacina)) : foreach ($local_vacina as $local) : ?> 
                        <option class="selected"  value="<?php echo $local['posto_de_vacinacao']; ?>"> <?php  echo $local['posto_de_vacinacao']; ?></option>                          
                    <?php   endforeach;   endif; ?>
                </select>                        
            </div> 
            <div class="mb-3">
                <select class="form-select" name="vacina">
                    <option required disabled  value="Selecione a vacina e o lote">Vacina Aplicada</option> 
                                           
                        <?php  if(!empty($vacina_atual)) : foreach ($vacina_atual as $vacina) : ?> 
                        <option class="selected"  value="<?php echo $vacina['VAC_NOME']; ?>"> <?php  echo $vacina['VAC_NOME']." - ".$vacina['VAC_LOTE']; ?></option>                          
                    <?php   endforeach;   endif; ?>
                </select>                        
            </div> 
         <div class="mb-3">
         <button type="submit" class="btn btn-primary">ACESSAR</button>         
         </div>         
    </form>    
</div>
