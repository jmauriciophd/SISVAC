<div class="container  ml-1 px-2 p-3">           
              <form method="post" id="formBuscar">
                    <div class="mb-3 " >
                        <label for="form" class="form-label" >INFORME NICK OU MATRICULA:</label>
                        <input type="text"  class="form-control" id="valorCampo" onkeypress="executando()" name="valor" index="0" placeholder="CPF/MATRICULA">
                       
                    </div><br><br><br>
                </form> 
            <?php if(!empty($dados)): foreach ($dados as $dado): ?>
            
                <form action="" method="post" enctype="multipart/form">
                <div class="mb-3">
                    <input type="text" value="<?php echo $dado['NOME'];?>"  class="form-control" id="formGroupExampleInput2" placeholder="NOME SERVIDOR">
                </div>
                <div class="mb-3">
                    <input type="text" value="<?php echo $dado['RAMAL'];?>" class="form-control" id="formGroupExampleInput2" placeholder="NOME SERVIDOR">
                </div>
                <div class="mb-3">               
                    <input type="text" value="<?php echo $dado['SITUACAO'];?>" class="form-control" id="formGroupExampleInput2" placeholder="NOME SERVIDOR">
                </div>
                <div class="mb-3">               
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Selecine a vacina</option>
                        <option value="1">Vacina 1</option>
                    </select>
                </div>
                <div class="mb-3">               
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Selecine a capanha</option>
                    <option value="1">CAPANHA DA GRIPE</option>
                    </select>
                </div>
                <div class="mb-3">               
                    <input type="hidden" name="data-vacinacao" class="form-control" id="formGroupExampleInput2" placeholder="NOME SERVIDOR">
                </div>
                <button type="submit" class="btn btn-primary" >SALVAR</button>
                </form>
            <?php endforeach; else: echo "Nenhuma informação encontrada"; endif; ?>
        </div>    