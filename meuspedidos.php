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
    
    <link rel="stylesheet" href="formatacao/meuspedidos.css">
    <link rel="stylesheet" href="formatacao/home.css">
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
                    <li><a href="minhaconta.php">Minha Conta</a></li>
                    <!-- <li><a href="meuspedidos.php">Meus Pedidos</a></li> -->
                    <li><a href="cadastro/cadastroEndereco.php">Meus Endereços</a></li> 
                    <li><a href="suporte.php">Suporte</a></li>
                    <li><a id="conta" id="sair" href="home.php?sair=true">Sair</a></li>
                    </form>
                </ul>
                
            </div>

        <!-- <div class="itens-conta">
            <ul><a class="material-symbols-outlined">account_circle</a>
                <li><a id="conta" href="minhaconta.php">Minha Conta</a></li>
                <li><a id="conta" href="meuspedidos.php">Meus Pedidos</a></li>
                <li><a id="conta" id="sair" href="home.php?sair=true">Sair</a></li>        
            </ul>
        </div> -->

                <!-- <li><img class="account" src="../img/account.png"></li> -->
         <!-- Fim do Menu -->
    </header> <br><br><br><br><br>

<main>
    <section class="perfil">

    
        <div class="boas-vindas"> 
                <div class="icone"><i class="material-symbols-outlined" id="btn-conta1">account_circle</i></div>
                <div class="ola"> Olá, <?php echo $row['nm_cliente'];?>!</div>
                <div class="link"> Consulte aqui seus pedidos</div>
        </div>

        <?php
        try{
 $select_pedidos = $conexao->query("SELECT a.nm_cliente, a.cel_cliente, b.desc_endereco, b.cep_endereco, b.numRes_endereco, c.formPag_pedido, c.st_pedido, c.vl_pedido  ,d.qt_produto, e.nm_produto FROM tb_cliente as a 
 JOIN tb_endereco_cliente as b on a.cd_cliente = b.cd_cliente_endereco 
 JOIN tb_pedido as c on a.cd_cliente = c.cd_cliente 
 JOIN tb_item as d on c.cd_pedido = d.cd_pedido
 JOIN tb_produto as e on d.cd_produto = e.cd_produto
 WHERE c.cd_cliente = '$cdcliente' and c.cd_endereco = b.cd_endereco");
 while($row_pedidos = $select_pedidos->fetch())
{


    echo  "<div class='dados'>";
    echo   "<div class='defi'> <div class='conta' >Pedido </div>";
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

        echo "<b>Situação do pedido: </b>".$row_pedidos['st_pedido']."<br>";
        echo "<b>Cep: </b>".$row_pedidos['cep_endereco']."<br>";
        echo "<b>Endereço para entrega: </b>".$row_pedidos['desc_endereco']."<br>";
        echo "<b>Número da Residencia: </b>".$row_pedidos['numRes_endereco']."<br>";
        echo "<br><b>Forma de pagamento: </b>".$row_pedidos['formPag_pedido'];
        
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
    <script src="JS/jquery.js"></script>
<script src="JS/carregamento.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>