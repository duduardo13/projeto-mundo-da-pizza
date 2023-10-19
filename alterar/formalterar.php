<?php
session_start();
include_once '../conexao.php';


if(!isset($_SESSION['usuario'])){ //se a sessão não existir, manda o usuário para a tela de login
    header("Location: index.php?sem_login");
}

if($_GET["sair"]){ //ao clicar no botão de sair, a sessão é desmontada, mandando o usuário para a tela de login
    header("Location: index.php");
    unset($_SESSION['usuario']);
}
$login = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

 $select = $conexao->prepare("SELECT * FROM tb_cliente where usuario_cliente='$login' and senha_cliente='$senha'");
			$select->execute();
                $row = $select->fetch();
 
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
      
    
            <form class="form" action="confirmaalterar.php" method="POST" enctype="multipart/form-data"> <!--Multipart/form-data, para poder capturar arquivos-->
<!------------------------------------------------------------------------------------------------------------------------------------------->
<br><br><fieldset class="fieldset">

    <div class="linha-2">
        
        <div class="col-cadastrese">
        Editar minha conta
        </div>
        
        <div class="col-logoPizza">
            <img src="../img/logoPizza.png" class="logoPizza cadastro">

        </div>


    </div>
    
            <div class="linha">  <!-- classe responsável por determinar a margem em relação ao item de baixo -->
                <div class="col-nome">
 <input type="text" class="form-control" name="nomeCliente" id="nomeCliente" aria-describedby="nomeCliente" placeholder="Nome" value="<?php echo $row['nm_cliente'];?>" required>
                </div>
            </div>
        
<!------------------------------------------------------------------------------------------------------------------------------------------->

            <div class="linha">
                <div class="col-celular">
                <input type="tel" class="form-control" name= "celularCliente" id="celularCliente" aria-describedby="celularCliente" placeholder="Celular" value="<?php echo $row['cel_cliente'];?>"  required>
                </div> 

                <div class="col-cpf"> 
                                    <input type="text" class="form-control" name="cpfCliente" id="cpfCliente" aria-describedby="cpfCliente" onblur="alert(TestaCPF(this.value));" 
                                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                                            placeholder="CPF" maxlength="11" value="<?php echo $row['cpf_cliente'];?>" readonly='true' required>
                                </div>
                              
            </div>
<!------------------------------------------------------------------------------------------------------------------------------------------->

            
<!------------------------------------------------------------------------------------------------------------------------------------------->
              


                           
<!------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="linha">

                                
                                <div class="col-usuario">
 
 <input type="text" class="form-control" name="usuarioCliente" id="usuarioCliente" aria-describedby="usuarioCliente" placeholder="Usuario" value="<?php echo $row['usuario_cliente'];?>"  required>
                             </div>


                                 <div class="col-senha">
 
 <input type="password" class="form-control" name="senhaCliente" id="senhaCliente" aria-describedby="senhaCliente" placeholder="Senha" value="<?php echo $row['senha_cliente'];?>"  required>
                                    </div>
                                </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------

                                        <div class="mb-3">

 <label for=" "><b>Foto</b></label><input type="file" name="imgUsuario" id=" ">
                                        </div> <br>
-------------------------------------------------------------------------------------------------------------------------------------------->

<div class="linha">
    <div class="col-voltar">
 <input type="button"  class="btn btn-second" name="Voltar" value="Voltar" onClick="history.go(-1); return false;">
    </div>
    
    <div class="col-enviar">
 <input type="submit" name='Alterar' class="btn btn-primary" value="Alterar">
    </div>

</div>
        </fieldset><br><br><br><br>
                </form>
            
        
    </div>

    <script src="../JS/jquery.js"></script>
<script src="../JS/carregamento.js"></script>
 </body>
</html>
