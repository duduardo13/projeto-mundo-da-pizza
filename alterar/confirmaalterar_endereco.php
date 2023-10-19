<?php

include_once ('../conexao.php');


$cep = $_POST['cepCliente'];
$desc = $_POST['ruaCliente'];
$numRes = $_POST['numresCliente'];
$bairro = $_POST['bairroCliente'];
$complementoRes = $_POST['complementoresCliente'];
$pontorefRes = $_POST['pontorefresCliente'];


	try 
	{
		   
		$stmt = $conexao->prepare("UPDATE tb_endereco_cliente SET cep_endereco = :cepCliente,
													 desc_endereco = :ruaCliente,
                                                     numRes_endereco = :numresCliente,
                                                     complementoRes_endereco = :complementoresCliente,
                                                     pontorefRes_endereco = :pontorefresCliente 
                                                     :cd_cliente WHERE desc_endereco = :ruaCliente AND numRes_endereco = :numresCliente");

        
		
		$stmt->execute(array( ':cepCliente' => $cep,
							 ':ruaCliente' => $desc,
                             ':numresCliente' => $numRes,
							 ':bairroCliente' => $bairro,
                             ':complementoresCliente' => $complementoRes,
                             ':pontorefRes_Cliente' => $pontorefRes));
        
		echo "<script>
							alert('Alterado com Sucesso!');
                            window.location.href='../minhaconta.php'
						  </script>";
        
	} 
	catch(PDOException $e) 
	{
		echo 'Error: ' . $e->getMessage();
	}
	
 ?>