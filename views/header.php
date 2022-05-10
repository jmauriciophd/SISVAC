<html>

<head>
    <title>💧 Sistema de Vacinas💧</title>
</head>

<link rel="stylesheet" href="<?=BASE_URL ?>/css/style.css">
<link rel="stylesheet" href="<?=BASE_URL ?>/css/main.css">
<link rel="stylesheet" href="<?=BASE_URL ?>/css/bootstrap.css">
<script src="<?= BASE_URL ?>/js/scripts.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<nav>
    <div class="float-left barra-superior text-black " style="height: 42px;
    background: aliceblue;">
        <h2 class="ml-1 mx-md-1">SISVAC-SISTEMA DE VACINAS</h2>
    </div>
    <div class="bg-light float-md-right mb-1 mt-1 mx-md-1">
        <?php
        if (isset($_SESSION['nome_campanha']) && !empty($_SESSION['nome_campanha']) && isset($_SESSION['local_vacinacao']) && !empty($_SESSION['local_vacinacao'])) {
            echo " <strong>CAPANHA ATUAL :</strong>  " . $_SESSION['nome_campanha'] .  "   <strong>LOCAL ATUAL :</strong> " . $_SESSION['local_vacinacao'];
        }  ?>
    </div>
    <div class="barra-menu  mb-3">
        <ul class="nav nav-tabs center">
            <li class="nav-item">
                <a class="nav-link " href="<?= BASE_URL ?>">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?= BASE_URL ?>/home/usuarios">CADASTRAR USUARIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>/home/campanha">CADASTRAR CAMPANHA</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>/home/vacina">CADASTRAR VACINA</a>
            </li>            
            <li class="conteudo_dropdow-principal nav-link text-danger">
                <span class="dropdown-toggle"
                    data-toggle="dropdown"">USUARIO LOGADO:
                    <?php
                    echo $_SESSION['ID'][0][1];
                    ?>                    
                </span>
                <ul class="conteudo_dropdown">
                    <li><a class="nav-link" href="<?php echo BASE_URL."/home/alteraSenha"; ?>">Alterar senha</a></li>
                    <li><a class="nav-link" href="<?= BASE_URL ?>/login/logout"><i class="fa-solid fa-arrow-right-from-arc">SAIR</i></a></li>
                </ul>
               
            </li>           
        </ul>
    </div>
    </div>
</nav>

</html>