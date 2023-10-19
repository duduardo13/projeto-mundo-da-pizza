<?php
include_once 'conexao.php';
session_start();

if(!isset($_SESSION['usuario'])){ //se a sessão não existir, manda o usuário para a tela de login
    header("Location: index.php?sem_login");
}

if($_GET["sair"]){ //ao clicar no botão de sair, a sessão é desmontada, mandando o usuário para a tela de login
    header("Location: index.php");
    unset($_SESSION['usuario']);
}
$login = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

$nome = $_SESSION['cliente'];
$cel = $_SESSION['celular'];
$endereco = $_SESSION['endereco'];     
$formPag = $_SESSION['metodoPag'];
$produto = $_SESSION['produto'];
$qtproduto = $_SESSION['quantidade'];
$valor = $_SESSION['valor'];


/*
JOIN FEITO PARA RETORNAR TODAS AS COLUNAS DO PEDIDO

            SELECT a.nm_cliente, a.cel_cliente, b.desc_endereco, c.formPag_pedido, d.qt_produto, e.nm_produto FROM tb_cliente as a 
JOIN tb_endereco_cliente as b on a.cd_cliente = b.cd_cliente_endereco 
JOIN tb_pedido as c on a.cd_cliente = c.cd_cliente 
JOIN tb_item as d on c.cd_item = d.cd_item
JOIN tb_produto as e on d.cd_produto = e.cd_produto
WHERE c.cd_cliente = 30 and c.cd_pedido = 17
*/

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="formatacao/contafuncionario.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">


    <title>Minha Conta</title>
</head>
<?php
	$select = $conexao->prepare("SELECT * FROM tb_cliente where usuario_cliente='$login'and senha_cliente='$senha'");
			$select->execute();
		    $row = $select->fetch();
            $cdcliente = $row['cd_cliente'];
?>
<body>

<main>
    <section class="perfil">

        <div class="bem-vindo"> 
                <div class="icone-home-func"><img class="logohomefunc" width="250px" height="250px" src="img/logo.png"></div>
                <div class="oi"> Bem vindo, Mundo da Pizza!</div>
                

        </div>

    </section>
</main>

</body>
</html>