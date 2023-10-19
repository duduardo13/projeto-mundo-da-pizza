<?php
include_once '../conexao.php';
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
        echo "<script>
							alert('Deletado com sucesso!');
                            window.location.href='index.php'
						  </script>";
                            
	} 
	catch(PDOException $e) 
	{
		echo 'ERROR: ' . $e->getMessage();
	}
        }
       /* if(isset($_POST['Alterar'])) {
            echo "This is Button2 that is selected";
        }

        */
        
/*
if($_GET["deletar"]){ //ao clicar no botão de deletar, o cliente em questão é deletado.
    
    	try 
    
	{
		   
		$delete = $conexao->prepare("DELETE FROM tb_cliente WHERE usuario_cliente='$login'and senha_cliente='$senha");
		$delete->execute();
		echo "<h1>Cliente excluido com sucesso</h1>";
	} 
	catch(PDOException $e) 
	{
		echo 'ERROR: ' . $e->getMessage();
	}
    */

?>
<!doctype html>
<html lang="pt-br">
 <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!--link rel="styelsheet" href="../formatacao/style.css"-->
     <link rel="stylesheet" href="../formatacao/formalterar.css">
     <link rel="stylesheet" type="text/css" href="../formatacao/telacarregamento.css">
   
        <script src="../JS/BuscaCep.js"></script>
         <script src="../JS/validacpf.js"></script>
    <title>Minha Conta</title>
     
 </head>
 <?php

			$select = $conexao->prepare("SELECT * FROM tb_endereco_cliente where cd_endereco ='$cd_endereco'");
			$select->execute();
		
			$row = $select->fetch();
			
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
    
    


<!-- <?php echo $row['nm_cliente']; ?> -->

<div class="container"> <!-- classe responsável por se adaptar ao tamanho da tela e comportar dentro de si, todos os outros elementos -->
      
    
            <form class="form" action="confirmaalterar_endereco.php" method="POST" enctype="multipart/form-data"> <!--Multipart/form-data, para poder capturar arquivos-->
<!------------------------------------------------------------------------------------------------------------------------------------------->
<br><br><fieldset class="fieldset">

    <div class="linha-2">
        
        <div class="col-cadastrese">
            Altere seu endereço
        </div>
        
        <div class="col-logoPizza">
            <img src="../img/logoPizza.png" class="logoPizza cadastro">

        </div>

    </div>
    
            <div class="linha">  <!-- classe responsável por determinar a margem em relação ao item de baixo -->

                    <div class="col-cep">
 
 <input type="text" class="form-control" name="cepCliente" id="cepCliente" aria-describedby="cepCliente" value="<?php echo $row['cep_endereco'];?>" onblur="pesquisacep(this.value);" placeholder="CEP"  required>
                    </div> 
                </div>
<!------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="linha">
                        <div class="col-rua">
                            
 <input type="text" class="form-control" name="ruaCliente" id="ruaCliente" aria-describedby="ruaCliente" value="<?php echo $row['desc_endereco'];?>" placeholder="Rua" required>
                        </div> 


                            <div class="col-numres ">

 <input type="text" class="form-control" name="numresCliente" id="numresCliente" aria-describedby="numresCliente" value="<?php echo $row['numRes_endereco'];?>" placeholder="Nº" required>
                            </div> 
                        </div>
<!------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="linha">
                                <div class="col-bairro">

 <input type="text" class="form-control" name="bairroCliente" id="bairroCliente" aria-describedby="bairroCliente" value="<?php echo $row['nm_bairro'];?>" placeholder="Bairro">
                                </div> 
 
 
            <div class="col-cidade">
 
 <input type="text" class="form-control" name="cidadeCliente" id="cidadeCliente" aria-describedby="cidadeCliente" placeholder="Cidade">
            </div> 
        </div>
<!------------------------------------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="linha">
                    <div class="col-complemento">
 
 <input type="text" class="form-control" name="complementoresCliente" id="complementoresCliente" aria-describedby="complementoresCliente" value="<?php echo $row['complementoRes_endereco'];?>" placeholder="Complemento (Ex: Ap01)" required>
                    </div> 


                        <div class="col-pontoref">
 
 <input type="text" class="form-control" name="pontorefResCliente" id="pontoRefresCliente" aria-describedby="pontorefResCliente" value="<?php echo $row['pontorefRes_endereco'];?>" placeholder="Ponto de Referência" required>
                        </div>
                    </div>
<!------------------------------------------------------------------------------------------------------------------------------------------->

<div class="linha">
    <div class="col-voltar">
 <input type="button"  class="btn btn-second" name="Voltar" value="Voltar"onClick="history.go(-1); return false;">
    </div>
    
    <div class="col-enviar">
 <input type="submit" class="btn btn-primary" value="Alterar">
    </div>

</div>
        </fieldset><br><br><br><br>
                </form>
            
        
    </div>

    <script src="../JS/jquery.js"></script>
<script src="../JS/carregamento.js"></script>
 </body>
</html>
