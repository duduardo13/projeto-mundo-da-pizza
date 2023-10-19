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

// Pegando o código do Cliente da Session
$select = $conexao->prepare("SELECT * FROM tb_cliente where usuario_cliente='$login'and senha_cliente='$senha'");
			$select->execute();
		
			$row = $select->fetch();
            $cdcliente = $row['cd_cliente'];




?>
<!doctype html>
<html lang="pt-br">
 <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!--link rel="stylesheet" href="../formatacao/style.css"-->
     <link rel="stylesheet" href="../formatacao/formendereco.css">
     <link rel="stylesheet" type="text/css" href="../formatacao/telacarregamento.css">
        <script src="../JS/BuscaCep.js"></script>
         <script src="../JS/validacpf.js"></script>
    <title>Cadastro Endereço</title>
     
 </head>
 <body>

<!--PreLoader-->
<div id="preloader">
        
    <div id="status">&nbsp;</div>
    <div class="loader">

            <div class="carregando"></div>
           

    </div>

</div>
<!--PreLoader-->



<div class="container"> <!-- classe responsável por se adaptar ao tamanho da tela e comportar dentro de si, todos os outros elementos -->
      
    
            <form class="form" action="#" method="POST" enctype="multipart/form-data"> <!--Multipart/form-data, para poder capturar arquivos-->
<!------------------------------------------------------------------------------------------------------------------------------------------->
<br><br><fieldset class="fieldset">

    <div class="linha-2">
        
        <div class="col-cadastrese">
            Cadastre seu endereço
        </div>
        
        <div class="col-logoPizza">
            <img src="../img/logoPizza.png" class="logoPizza cadastro">

        </div>

    </div>
    
            <div class="linha">  <!-- classe responsável por determinar a margem em relação ao item de baixo -->

                    <div class="col-cep">
 
 <input type="text" class="form-control" name="cepCliente" id="cepCliente" aria-describedby="cepCliente" onblur="pesquisacep(this.value);" placeholder="CEP" required>
                    </div> 
                </div>
<!------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="linha">
                        <div class="col-rua">
                            
 <input type="text" class="form-control" name="ruaCliente" id="ruaCliente" aria-describedby="ruaCliente" placeholder="Rua" required>
                        </div> 


                            <div class="col-numres ">

 <input type="text" class="form-control" name="numresCliente" id="numresCliente" aria-describedby="numresCliente" placeholder="Nº" required>
                            </div> 
                        </div>
<!------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="linha">
                                <div class="col-bairro">

 <input type="text" class="form-control" name="bairroCliente" id="bairroCliente" aria-describedby="bairroCliente" placeholder="Bairro">
                                </div> 
 
 
            <div class="col-cidade">
 
 <input type="text" class="form-control" name="cidadeCliente" id="cidadeCliente" aria-describedby="cidadeCliente" placeholder="Cidade">
            </div> 
        </div>
<!------------------------------------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="linha">
                    <div class="col-complemento">
 
 <input type="text" class="form-control" name="complementoresCliente" id="complementoresCliente" aria-describedby="complementoresCliente" placeholder="Complemento (Ex: Ap01)" required>
                    </div> 


                        <div class="col-pontoref">
 
 <input type="text" class="form-control" name="pontorefResCliente" id="pontoRefresCliente" aria-describedby="pontorefResCliente" placeholder="Ponto de Referência" required>
                        </div>
                    </div>
<!------------------------------------------------------------------------------------------------------------------------------------------->

<div class="linha">
    <div class="col-voltar">
 <input type="button"  class="btn btn-second" name="Voltar" value="Voltar para a página inicial "onClick="history.go(-1); return false;">
    </div>
    
    <div class="col-enviar">
 <input type="submit" class="btn btn-primary" value="Cadastrar">
    </div>

</div>
        </fieldset><br><br><br><br>
                </form>
            
        
    </div>


    <script src="../JS/jquery.js"></script>
<script src="../JS/carregamento.js"></script>
 </body>
</html>

<?php


if(!empty($_POST)){
   // date_default_timezone_set('America/Sao_Paulo');
   

$cep = $_POST['cepCliente'];
$desc = $_POST['ruaCliente'];
$num = $_POST['numresCliente'];
$comp = $_POST['complementoresCliente'];
$ponto = $_POST['pontorefResCliente'];
$bairro = $_POST['bairroCliente'];


		
					/*upload da foto
					$ext = strtolower(substr($foto['name'],-4)); //Pegando extensão do arquivo 
				
					echo $novo_nome = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo 
		
					move_uploaded_file($foto['tmp_name'], $dir.$novo_nome);//Fazer upload do arquivo 
                    					
					$caminhoIMG = $dir.$novo_nome;*/



$stmt = $conexao->prepare("INSERT INTO tb_endereco_cliente(cep_endereco, desc_endereco, numRes_endereco,complementoRes_endereco,pontorefRes_endereco, nm_bairro,cd_cliente_endereco) 
VALUES(?,?,?,?,?,?,?)");


$stmt->bindParam(1, $cep);
$stmt->bindParam(2, $desc);
$stmt->bindParam(3, $num);
$stmt->bindParam(4, $comp);
$stmt->bindParam(5, $ponto);
$stmt->bindParam(6, $bairro);
$stmt->bindParam(7, $cdcliente);





          	$stmt->execute();
					
					echo "<script>
							alert('Cadastrado com Sucesso!');
                            window.location.href='../home.php'
						  </script>";
				}
			

?>