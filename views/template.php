<html>
    <head><title>💧 Sistema de Vacinas do STJ 💧</title></head>
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/bootstrap.css">
     <script src="js/scripts.js" type="text/javascript"></script>
    <body>
    <nav>  
        <span class="barra-superior" ><h2>SISVAC-SISTEMA DE VACINAS STJ</h2></span></nav>
       <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " href="<?=BASE_URL?>usuarios">CADASTRAR USUARIO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=BASE_URL?>campanha">CADASTRAR CAPANHA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=BASE_URL?>home/vacina">CADASTRAR VACINA</a>
        </li>       
        </ul>        
        <div class="container">
          <?php   $this->loadViewIntemplate($viewName,$viewData); ?>
        </div>
    </body>  
</html>