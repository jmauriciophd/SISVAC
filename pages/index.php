<html>
    <head><title>💧 Sistema de Vacinas do STJ 💧</title></head>
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/bootstrap.css">
     <script src="js/scripts.js" type="text/javascript"></script>
    <body>
          <?php 
            require_once 'config.php';   
            $resultados = new indexController();   
            $dados =$resultados->consultarDados();            
        ?>
       <!-- Just an image -->
       <nav>  
        <span class="barra-superior" ><h2>SISVAC-SISTEMA DE VACINAS STJ</h2></span></nav>
       <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " href="usuarios.php">CADASTRAR USUARIO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/campanha.php">CADASTRAR CAPANHA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/vacina.php">CADASTRAR VACINA</a>
        </li>       
        </ul>
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

    </body>   
</html>