<?php

include_once '../conexao.php';

$nome = $_POST['nomeCliente'];
$cpf = $_POST['cpfCliente'];
$cel = $_POST['celularCliente'];
$user = $_POST['usuarioCliente'];
$senha = $_POST['senhaCliente'];


	try 
	{
		   
		$stmt = $conexao->prepare("UPDATE tb_cliente SET nm_cliente = :nomeCliente,
													 cpf_cliente = :cpfCliente,
                                                     cel_cliente = :celCliente,
                                                     usuario_cliente = :usuarioCliente,
                                                     senha_cliente = :senhaCliente WHERE usuario_cliente = :usuarioCliente AND senha_cliente = :senhaCliente");

        
		
		$stmt->execute(array( ':nomeCliente' => $nome,
							 ':cpfCliente' => $cpf,
                             ':celCliente' => $cel,
							 ':usuarioCliente' => $user,
                             ':senhaCliente' => $senha));
        
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