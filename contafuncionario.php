<?php
//error_reporting(0); 

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



if(isset($_POST['Deletar'])) {
      
       try 
	{
		$delete = $conexao->prepare("DELETE FROM tb_cliente WHERE usuario_cliente='$login'and senha_cliente='$senha'");
        $delete->execute();
        echo "<script>window.alert('Cliente deletado com sucesso!'); window.location.href='index.php'</script>";
                            
	} 
	catch(PDOException $e) 
	{
		echo 'ERROR: ' . $e->getMessage();
	}}
    if(isset($_POST['Deletar_endereco'])) {
      
       try 
	{
		$delete = $conexao->prepare("DELETE FROM tb_endereco_cliente WHERE cd_cliente_endereco='$cdcliente''");
        $delete->execute();
        echo "<script>window.alert('Endereço deletado com sucesso!'); window.location.href='index.php'</script>";
                            
	} 
	catch(PDOException $e) 
	{
		echo 'ERROR: ' . $e->getMessage();
	}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <div class="link"> Edite aqui seu perfíl</div>
        </div>

    <div class="dados">
        <div class="defi"> <div class="conta" >Definições da Conta  </div> </div>
        <div class="editar"></form> </div>
        <div class="linha"> <div class="infos"> Minhas Informações: </div>
         <!-- <div class="editar"> <button class= "alterar_endereco" onclick="window.location.href = 'alterar/formalterar_endereco.php'"> Alterar </button> |<form method="POST"><button class="excluir" name='Deletar_endereco' href=""> Excluir </button></form> </div> -->
    </div>


        <div class="linha">
          
            <div class="col-dados">
                <div class="nome">Nome: <?php echo $row['nm_cliente'];?> </div>
                <div class="cpf"> CPF: <?php echo $row['cpf_cliente'];?> </div>
                <div class="cel">Celular : <?php echo $row['cel_cliente'];?></div>
                <div class="cpf"> Usuário: <?php echo $row['usuario_cliente'];?> </div>
                <div class="cel">Senha : <?php echo $row['senha_cliente'];?></div>
            <button class= "alterar" onclick="window.location.href = 'alterar/formalterar.php'"><ion-icon name="brush-outline"></ion-icon> Alterar Conta</button>
            <button class="excluir" name='Deletar' href=""><ion-icon name="trash-outline"></ion-icon> Excluir Conta</button>
            </div>

    </div>
    </section>
</main>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>