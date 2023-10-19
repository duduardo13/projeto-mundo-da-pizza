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
		$delete_endereco = $conexao->prepare("DELETE FROM tb_endereco_cliente WHERE cd_cliente_endereco='$cdcliente' AND cd_endereco ='$cdendereco'");
        $delete_endereco ->execute();
        echo "<script>window.alert('Endereço deletado com sucesso!'); window.location.href='minhaconta.php'</script>";
                            
	} 
	catch(PDOException $e) 
	{
		echo 'ERROR: ' . $e->getMessage();
	}}

    if(isset($_POST['Alterar_endereco'])){
        header("Location: alterar/formalterar_endereco.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formatacao/minhaconta.css">
    <link rel="stylesheet" href="formatacao/home.css">
    <link rel="stylesheet" href="formatacao/modalEndereco.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="formatacao/telacarregamento.css">


    <title>Minha Conta</title>
</head>
<?php

	$select = $conexao->prepare("SELECT * FROM tb_cliente where usuario_cliente='$login'and senha_cliente='$senha'");
			$select->execute();
		    $row = $select->fetch();
            $cdcliente = $row['cd_cliente'];

            
			
	 ?>
<body>

<!--PreLoader-->
<div id="preloader">
        
    <div id="status">&nbsp;</div>
    <div class="loader">

            <div class="carregando"></div>
           

    </div>

</div>
<!--PreLoader-->




<header> 
         <!-- Início do Menu -->
            <img class="logo" src="img/logo.png" > <!-- Logo da pizzaria -->

        <div class="menu-responsivo"> <!-- Menu hamburguer para o mobile -->
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>

            <ul class="itens-menu"> <!-- Elementos clicáveis do menu (links de ancoragem) -->
                <li><a href="home.php">Início</a></li>
                <li><a href="home.php#cardapio">Cardápio</a></li>
                <li><a href="home.php#localizacao">Como Chegar</a></li>
                <li><a href="home.php#quemsomos">Quem Somos</a></li>
                <li><a href="home.php#promocoes">Promoções</a></li>
                <li><a href="home.php#faq">FAQ</a></li>

            </ul>
        
        <input type="checkbox" id="check"> <!-- Botão que abre o dropdown -->
            <label for="check">
                <i class="material-symbols-outlined" id="btn-conta">account_circle</i>
                <a class="fechar" id="cancel">X</a>
            </label>
            <div id="account_form"> <!-- Dropdown-->
                <br><h1><a class="material-symbols-outlined">account_circle</a></h1><br>
                <ul id="account_list">
                <form action="#" method="POST">
                    <!-- <li><a href="minhaconta.php">Minha Conta</a></li> -->
                    <li><a href="meuspedidos.php">Meus Pedidos</a></li>
                    <li><a href="cadastro/cadastroEndereco.php">Meus Endereços</a></li>
                    <li><a href="suporte.php">Suporte</a></li>
                    <li><a id="conta" id="sair" href="home.php?sair=true">Sair</a></li>
                    </form>
                </ul>
                
            </div>

    
    </header> <br><br><br><br><br>

<main>
    <section class="perfil">

    
        <div class="boas-vindas"> 
                <div class="icone"><i class="material-symbols-outlined" id="btn-conta1">account_circle</i></div>
                <div class="ola"> Olá, <?php echo $row['nm_cliente'];?>!</div>
                <div class="link"> Edite aqui seu perfíl ou <a class="peca" href="home.php#cardapio"> faça seu pedido</a></div>
        </div>

    <div class="dados">
        <div class="defi"> <div class="conta" >Definições da Conta  </div> </div>
        <div class="editar"> <button class= "alterar" onclick="window.location.href = 'alterar/formalterar.php'"> Alterar </button> |<form method="POST"><button class="excluir" name='Deletar' href=""> Excluir</button></form> </div>
        <div class="linha"> <div class="infos"> Minhas Informações </div>
        <div class="infos"> Meus Endereços </div>
         <!-- <div class="editar"> <button class= "alterar_endereco" onclick="window.location.href = 'alterar/formalterar_endereco.php'"> Alterar </button> |<form method="POST"><button class="excluir" name='Deletar_endereco' href=""> Excluir </button></form> </div> -->
    </div>


        <div class="linha">
          
            <div class="col-dados">
                <div class="nome"><b>Nome: </b> <?php echo $row['nm_cliente'];?> </div>
                <div class="cpf"> <b>CPF: </b>  <?php echo $row['cpf_cliente'];?> </div>
                <div class="cel"><b>Celular: </b>  <?php echo $row['cel_cliente'];?></div>
                <div class="cpf"> <b>Usuário: </b>  <?php echo $row['usuario_cliente'];?> </div>
                <div class="cel"><b>Senha: </b>  <?php echo $row['senha_cliente'];?></div>
            </div>

            <div class="col-enderecos">
                <div class="endereco">
            <?php
        
        $select_endereco = $conexao->prepare("SELECT * FROM tb_endereco_cliente where cd_cliente_endereco='$cdcliente'");
        $select_endereco -> execute();
        $row_endereco = $select_endereco->fetch();
    {
			echo "<b>Cep: </b>".$row_endereco['cep_endereco'];
			echo "<br><b>Rua: </b>".$row_endereco['desc_endereco'];
			echo "<br><b>Número: </b>".$row_endereco['numRes_endereco'];
            echo "<br><b>Bairro: </b>".$row_endereco['nm_bairro'];

			echo "<br>";

            
  
  	
    }
            ?>
          <div class="linha">
            
                <div class="ver-mais">

                <button class="btn-modal-endereco" onclick="abrirModal('dv-modal-endereco')">Ver mais</button> 

                </div>
            
        </div>
             </div>
            </div>

        </div>
    </div>
    
   
    <div id="dv-modal-endereco" class="modal-ende">
        <div class="modal-endereco">

            <div class="modal-endereco-header">
                <h1>Meus Endereços</h1>
            </div>

            <div class="modal-endereco-body">
               <?php
     
            try{

        $select_endereco = $conexao->query("SELECT * FROM tb_endereco_cliente where cd_cliente_endereco='$cdcliente'");
        while($row_endereco = $select_endereco->fetch()){

        echo "<div class= 'editar'> <form method='POST'> <button class= 'alterar' name='Alterar_endereco'> Alterar </button> | <button class='excluir' name='Deletar_endereco'> Excluir </button></form> </div>";
        echo "<p>";

            $cdendereco = $row_endereco['cd_endereco'];
			echo "<br><b>Cep: </b>".$row_endereco['cep_endereco'];
			echo "<br><b>Rua: </b>".$row_endereco['desc_endereco'];
			echo "<br><b>Número: </b>".$row_endereco['numRes_endereco'];
			echo "<br><b>Complemento: </b>".$row_endereco['complementoRes_endereco'];
			echo "<br><b>Ponto de referencia: </b>".$row_endereco['pontorefRes_endereco'];
            echo "<br><b>Bairro: </b>".$row_endereco['nm_bairro'];

			echo "<br>";
        }
    }

catch(PDOException$e) 
 {
     echo 'ERROR: ' . $e->getMessage();
 }
 
            ?>
            </div>

            <div class="modal-endereco-footer">
                <button class="btn-modal-endereco" onclick="fecharModal('dv-modal-endereco')"> Fechar </button>
            </div>

            </div>    
    </div>

    </section>
</main>
  <!-- Início do Rodapé do site-->
<footer class="footer-distributed">

			<div class="footer-left">

				<h3>Mundo<span> da Pizza</span></h3>

				<p class="footer-links">
                <a href="home.php">Início</a>
                <a href="home.php#cardapio">Cardápio</a>
                <a href="home.php#localizacao">Como Chegar</a>
                <a href="home.php#quemsomos">Quem Somos</a>
                <a href="home.php#promocoes">Promoções</a>
                <a href="home.php#faq1">FAQ</a>
				</p>

				<p class="footer-company-name">Mundo da Pizza © 2020</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Av. Irmãos Adorno 577</span> Praia Grande - SP</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+55 13 99652-0020</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:lucorrenti@gmail.com">lucorrenti@gmail.com</a></p>
				</div>

			</div>


			<div class="footer-right">

				<p class="footer-company-about">
					<span>Sobre nós</span>
					A pizzaria Mundo da pizza é um estabelecimento recente, localizada na Praia Grande, que se compromete em proporcionar uma saborosa refeição custo beneficio, para qualquer amante de pizza.
				</p>
                <br>

					<a href="https://l.instagram.com/?u=https%3A%2F%2Fwa.me%2Fmessage%2FORZ7GHSVX6AON1&e=ATOlJodd4qD8UM99XUDe9AOA0zbfH9Uyi_Mb0EhPSMoTuh6vWtqy1Vr_k_WDEUeOxbQ5o9fpTbsZTexkfwQSQTNvBL0Q36ya&s=1"  target="_blank">
                    <img class="whatsapp" src="img/whatsapp.png"></a>
					 <a href="https://www.instagram.com/mundodapizzapg/?utm_source=ig_embed&ig_rid=5c19d8b7-af2a-47b1-91af-b1d5e23f9c06"  target="_blank">
                     <img class="instagram" src="img/Instagram.png"></a>
	

			
			</div>

		</footer>


<!-- Fim do Rodapé do site-->

    <script src="formatacao/menumobile.js"></script>
    <script src="formatacao/script.js"></script>
    <script src="formatacao/modalEndereco.js"></script>
    <script src="JS/jquery.js"></script>
<script src="JS/carregamento.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>