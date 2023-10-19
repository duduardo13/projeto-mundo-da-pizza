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



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="formatacao/contafuncionario.css">
    <link rel="stylesheet" href="formatacao/home.css">
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
        <div class="boas-vindas"> 
                <div class="icone"><i class="material-symbols-outlined" id="btn-conta1">account_circle</i></div>
                <div class="ola"> Olá, <?php echo $row['nm_cliente'];?>!</div>
                <div class="link"> Consulte todos os pedidos</div>
        </div>

        <?php
        try{
 $select_pedidos = $conexao->query("SELECT a.nm_cliente, a.cel_cliente, b.desc_endereco, b.cep_endereco, b.numRes_endereco, c.cd_pedido , c.formPag_pedido, c.vl_pedido  ,d.qt_produto, e.nm_produto FROM tb_cliente as a 
 JOIN tb_endereco_cliente as b on a.cd_cliente = b.cd_cliente_endereco 
 JOIN tb_pedido as c on a.cd_cliente = c.cd_cliente 
 JOIN tb_item as d on c.cd_pedido = d.cd_pedido
 JOIN tb_produto as e on d.cd_produto = e.cd_produto
 WHERE c.cd_endereco = b.cd_endereco");
 while($row_pedidos = $select_pedidos->fetch())
{
    $cdpedidost = $row_pedidos['cd_pedido'];
    if(isset($_POST['muda_st'])) {
      
        try 
     {
        $stmt = $conexao->prepare("UPDATE tb_pedido SET st_pedido = 'Entregue' WHERE cd_pedido ='$cdpedidost';");
        $stmt -> execute();           
     } 
     catch(PDOException $e) 
     {
         echo 'ERROR: ' . $e->getMessage();
     }}
    echo  "<div class='dados'>";
    echo   "<div class='defi'> <div class='conta' >Pedido:".$row_pedidos['cd_pedido']. "</div>";
    echo "</div>";

    echo     "<div class='linha'> <div class='infos'> Pedido efetuado </div>";
    echo    "<div class='infos'> Entrega do Pedido: </div>";
    echo   "</div>";


       


    echo "<div class='linha'>";
     echo "<div class='col-dados'>";
     echo "<div class='info-pedido'>";
               
     echo "<b>Nome: </b>".$row_pedidos['nm_cliente']."<br>";
     echo "<b>Celular: </b>".$row_pedidos['cel_cliente']."<br>";
     echo "<b>Pedidos: </b>".$row_pedidos['nm_produto']."<br>";
     echo "<b>Quantidade: </b>".$row_pedidos['qt_produto']."<br>";
     echo "<b>Preço: </b>".$row_pedidos['vl_pedido'];
    
     echo "</div>";
    echo "</div> ";

        echo "<div class='col-entrega'> ";
        echo "<div class='info-entrega'> ";


        echo "<b>Cep: </b>".$row_pedidos['cep_endereco']."<br>";
        echo "<b>Endereço para entrega: </b>".$row_pedidos['desc_endereco']."<br>";
        echo "<b>Número da Residencia: </b>".$row_pedidos['numRes_endereco']."<br>";
        echo "<br><b>Forma de pagamento: </b>".$row_pedidos['formPag_pedido'];
        
        echo "<div class='col-btn'>
                <div class='btn-entregue'><form method='POST'><button name='muda_st' href=''><ion-icon name='checkmark-circle-outline'></ion-icon> Pedido Entregue </button></form></div>
            </div>";

        echo "</div>";
        echo "</div> ";
        echo "</div>";
        echo "</div>";
    }
}
catch(PDOException$e) 
{
echo 'ERROR: ' . $e->getMessage();
}

        ?> 

    </section>
</main>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>