<html>

<head>
    <title>💧 Sistema de Vacinas💧</title>
</head>
<link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/css/bootstrap.css">
<script src="<?= BASE_URL ?>/js/scripts.js" type="text/javascript"></script>
<nav>
    <div class="float-left barra-superior text-black " style="height: 42px;
    background: aliceblue;">
        <h2 class="ml-1">SISVAC-SISTEMA DE VACINAS</h2>
    </div>
    <div class="float-md-right mb-1">
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
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>/login/logout">SAIR</a>
            </li>
            <li class="nav-item mh-100">
                <span class="nav-link text-danger">USUARIO LOGADO:
                    <?php
                    echo $_SESSION['ID'][0][1];
                    ?>
                </span>
            </li>
        </ul>
    </div>
    </div>
</nav>

</html>