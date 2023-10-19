<?php
include_once '../conexao.php';

?>
<!doctype html>
<html lang="pt-br">
 <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!--link rel="stylesheet" href="../formatacao/style.css"-->
     <link rel="stylesheet" href="../formatacao/formcadastro.css">
        <script src="../JS/BuscaCep.js"></script>
         <script src="../JS/validacpf.js"></script>
         <link rel="stylesheet" type="text/css" href="../formatacao/telacarregamento.css">
    <title>Cadastro Cliente - S.W Restaurante</title>
     
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
            Crie sua conta
        </div>
        
        <div class="col-logoPizza">
            <img src="../img/logoPizza.png" class="logoPizza cadastro">

        </div>


    </div>
    
            <div class="linha">  <!-- classe responsável por determinar a margem em relação ao item de baixo -->
                <div class="col-nome">
 <input type="text" class="form-control" name="nomeCliente" id="nomeCliente" aria-describedby="nomeCliente" placeholder="Nome" required>
                </div>
            </div>
        
<!------------------------------------------------------------------------------------------------------------------------------------------->

            <div class="linha">
                <div class="col-celular">
                <input type="tel" class="form-control" name= "celularCliente" id="celularCliente" aria-describedby="celularCliente" placeholder="Celular" required>
                </div>                               
            </div>
<!------------------------------------------------------------------------------------------------------------------------------------------->

                <div class="linha">
                    <div class="col-cpf"> 
 <input type="text" class="form-control" name="cpfCliente" id="cpfCliente" aria-describedby="cpfCliente" onblur="alert(TestaCPF(this.value));" 
 onkeypress='return event.charCode >= 48 && event.charCode <= 57'
 placeholder="CPF" maxlength="11" required>
                </div> <br>

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

                           
<!------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="linha">
                                <div class="col-usuario">
 
 <input type="text" class="form-control" name="usuarioCliente" id="usuarioCliente" aria-describedby="usuarioCliente" placeholder="Usuario" required>
                             </div>


                                 <div class="col-senha">
 
 <input type="password" class="form-control" name="senhaCliente" id="senhaCliente" aria-describedby="senhaCliente" placeholder="Senha" required>
                                    </div>
                                </div>

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
   
$nome = $_POST['nomeCliente'];
$cpf = $_POST['cpfCliente'];
$cep = $_POST['cepCliente'];
$desc = $_POST['ruaCliente'];
$num = $_POST['numresCliente'];
$bairro = $_POST['bairroCliente'];
$comp = $_POST['complementoresCliente'];
$ponto = $_POST['pontorefResCliente'];
$cel = $_POST['celularCliente'];
$usuario = $_POST['usuarioCliente'];
$senha = $_POST['senhaCliente'];

$stmt = $conexao->prepare("INSERT INTO tb_cliente(nm_cliente, cpf_cliente, cel_cliente, usuario_cliente, senha_cliente) 
VALUES(?,?,?,?,?)");

$stmt->bindParam(1, $nome);
$stmt->bindParam(2, $cpf);
$stmt->bindParam(3, $cel);
$stmt->bindParam(4, $usuario);
$stmt->bindParam(5, $senha);


$stmt->execute();
//Invenção minha a partir daqui
$select = $conexao->prepare("SELECT * FROM tb_cliente where cpf_cliente ='$cpf'");
			$select->execute();
            $row = $select->fetch();
            $cdcliente = $row['cd_cliente'];

            $stmt2 = $conexao->prepare("INSERT INTO tb_endereco_cliente(cep_endereco, desc_endereco, numRes_endereco, complementoRes_endereco, pontorefRes_endereco, nm_bairro, cd_cliente_endereco) 
VALUES(?,?,?,?,?,?,?)");

            $stmt2->bindParam(1, $cep);
            $stmt2->bindParam(2, $desc);
            $stmt2->bindParam(3, $num);
            $stmt2->bindParam(4, $comp);
            $stmt2->bindParam(5, $ponto);
            $stmt2->bindParam(6, $bairro);
            $stmt2->bindParam(7, $cdcliente);

            $stmt2->execute();
					
					echo "<script>
							alert('Cadastrado com Sucesso!');
                            window.location.href='../index.php'
						  </script>";
				}
			
?>


