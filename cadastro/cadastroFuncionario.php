<?php include_once '../conexao.php'; 
?>
<!doctype html>
<html lang="pt-br">
 <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro Funcionário - S.W Restaurante</title>
     
 </head>
 <body>

 <br> <h1>Cadastro do Funcionário</h1> <br>
    
<div class="container"> <!-- classe responsável por se adaptar ao tamanho da tela e comportar dentro de si, todos os outros elementos -->
    <div class="row"> <!-- classe responsável por controlar a coluna na horizontal  -->
        <div class="col-md"> <!-- classe responsável por uma coluna -->
    
            <form action="#" method="POST" enctype="multipart/form-data"> <!--Multipart/form-data, para poder capturar arquivos-->
<!------------------------------------------------------------------------------------------------------------------------------------------->

            <div class="mb-3">  <!-- classe responsável por determinar a margem em relação ao item de baixo -->
 
 <input type="text" class="form-control" name="usuarioFuncionario" id="usuarioFuncionario" aria-describedby="usuarioFuncionario" placeholder="Usuario" required>
            </div> <br>
<!------------------------------------------------------------------------------------------------------------------------------------------->

                    <div class="mb-3">
 
 <input type="password" class="form-control" name="senhaFuncionario" id="senhaFuncionario" aria-describedby="senhaFuncionario" placeholder="senha" required>
                    </div> <br>
<!------------------------------------------------------------------------------------------------------------------------------------------->

 <input type="submit" class="btn btn-primary" value="Cadastrar" >
 <input type="button"  class="btn btn-primary" name="Voltar" value="Voltar "onClick="history.go(-1); return false;">

            </form>
        </div>
    </div>
</div>

<?php

if(!empty($_POST)){
   // date_default_timezone_set('America/Sao_Paulo');
   
$usuario = $_POST['usuarioFuncionario'];
$senha = $_POST['senhaFuncionario'];

		
					/*upload da foto
					$ext = strtolower(substr($foto['name'],-4)); //Pegando extensão do arquivo 
				
					echo $novo_nome = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo 
		
					move_uploaded_file($foto['tmp_name'], $dir.$novo_nome);//Fazer upload do arquivo 
                    					
					$caminhoIMG = $dir.$novo_nome;*/



$stmt = $conexao->prepare("INSERT INTO tb_funcionario(usuario_funcionario, senha_funcionario) 

VALUES(?,?)");

$stmt->bindParam(1, $usuario);
$stmt->bindParam(2, $senha);



          	$stmt->execute();
					
					/*echo "<script>
							alert('Cadastrado com Sucesso!');
                            window.location.href='../home.php';
						  </script>";*/
				}
?>