<?php
error_reporting(0);
include_once 'conexao.php';
session_start();

if(!isset($_SESSION['usuario'])){ //se a sessão não existir, manda o usuário para a tela de login
    header("Location: index.php?sem_login");
}

if($_GET["sair"]){ //ao clicar no botão de sair, a sessão é desmontada, mandando o usuário para a tela de login
    header("Location: index.php");
    unset($_SESSION['usuario']);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário Mundo da Pizza</title>
    <link rel="stylesheet" href="formatacao/contafuncionario.css">
</head>
<body class="menu-lateral">
    <div class="navegacao">
        <ul>
            <li class="lista ativo">
                <a href="homefuncionario.php" target="frame">
                    <span class="icone"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="titulo">Início</span>
                </a>
            </li>
            <li class="lista">
                <a href="contafuncionario.php" target="frame">
                    <span class="icone"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="titulo">Conta</span>
                </a>
            </li>
            <li class="lista">
                <a href="pedidosfuncionario.php" target="frame">
                    <span class="icone"><ion-icon name="reader-outline"></ion-icon></span>
                    <span class="titulo">Pedidos</span>
                </a>
            </li>
            <li class="lista">
                <a id="sair" href="paginafuncionario.php?sair=true">
                    <span class="icone"><ion-icon name="log-in-outline"></ion-icon></span>
                    <span class="titulo">Sair</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="container">
        <iframe id="tela" name="frame" src="homefuncionario.php" width="100%" height="100%" style="border:transparent" allowfullscreen></iframe>
    </div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="JS/contafuncionario.js"></script>
</body>
</html>