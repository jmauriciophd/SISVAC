<html>
<head>
    <title>💧 Sistema de Vacinas💧</title>
</head>

<link rel="stylesheet" href="<?php echo BASE_URL ?>/css/style.css">
<link rel="stylesheet" href="<?=BASE_URL ?>/css/main.css">
<link rel="stylesheet" href="<?=BASE_URL ?>/css/bootstrap.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/5f592adc23.js" crossorigin="anonymous"></script>
<body>
<nav>
    <div class="float-left barra-superior text-black " style="height: 42px;
    background: aliceblue;">
        <h2 class="ml-1 mx-md-1"><?php echo NOME_SIS;?></h2>
    </div>
    <div class="bg-light float-md-right mb-1 mt-1 mx-md-1">
        <?php
        if (isset($_SESSION['nome_campanha']) && !empty($_SESSION['nome_campanha']) && isset($_SESSION['local_vacinacao']) && !empty($_SESSION['local_vacinacao'])) {
            echo " <strong>CAMPANHA ATUAL :</strong>  " . $_SESSION['nome_campanha'] .  "   <strong>LOCAL ATUAL :</strong> " . $_SESSION['local_vacinacao'];
        }  ?>
    </div>
    <div class="barra-menu  mb-3" style="margin-top: 15px;margin-bottom: 15px;">
        <ul class="nav nav-tabs center">
            <li class="nav-item">                
                <a class="nav-link " href="<?= BASE_URL ?>"><i class="fa-solid fa-house-user"></i> HOME</a>
            </li>
            <li class="conteudo_dropdow-principal nav-link nav-item">
                <i class="fa-solid fa-user-plus"></i>
                <span class="dropdown-toggle"
                    data-toggle="dropdown"">CADASTROS  </span>                              
                 <ul class="conteudo_dropdown">
                    <li><a class="nav-link " href="<?= BASE_URL ?>/home/usuarios">CADASTRAR USUARIO</a></li>
                    <li><a class="nav-link" href="<?= BASE_URL ?>/home/campanha">CADASTRAR CAMPANHA</a></li>
                    <li><a class="nav-link" href="<?= BASE_URL ?>/home/vacina">CADASTRAR VACINA</a></li>
                </ul>                              
            </li> 
            <li class="nav-item">
            <a class="nav-link " href="<?= BASE_URL ?>/home/relatorios"><i class="fas fa-history"></i> RELATORIOS</a>
            </li>      
            <li class="conteudo_dropdow-principal nav-link text-danger" >
                <i class="fa-solid fa-user-check"></i>
                <span class="dropdown-toggle"
                    data-toggle="dropdown"">USUARIO LOGADO:
                    <?php
                    echo $_SESSION['ID'][0][1];
                    ?>                    
                </span>
                <ul class="conteudo_dropdown">
                    <li><a class="nav-link" href="<?php echo BASE_URL."/home/alteraSenha"; ?>">Alterar senha</a></li>
                    <li><a class="nav-link" href="<?= BASE_URL ?>/login/logout"><i class="fa-solid fa-arrow-right-from-arc"></i>SAIR</a></li>
                </ul>
                
            </li>           
        </ul>
    </div>
    </div>
</nav>
</body>
