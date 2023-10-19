<?php
include_once 'conexao.php';
?>

<!doctype html>
<html lang="pt-br">
 <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!--link rel="stylesheet" href="../formatacao/style.css"-->
     <link rel="stylesheet" href="formatacao/formcontato.css">
     <link rel="stylesheet" type="text/css" href="formatacao/telacarregamento.css">
    <title>Suporte Cliente - S.W Restaurante</title>
     
 </head>
 

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
    
  
            <form class="form" action="enviargmail.php" method="POST" enctype="multipart/form-data"> <!--Multipart/form-data, para poder capturar arquivos-->
         
   <br><br><fieldset class="fieldset">

    <div class="linha-2">
        
        <div class="col-suporte">
            Formulário de Contato
        </div>
        
        <div class="col-logoPizza">
            <img src="img/logoPizza.png" class="logoPizza cadastro">

        </div>


    </div>
        <div class="linha">
            <div class="col-nome">
                <input class="form-control" type="text" name="nomeCliente" placeholder="Nome:" required maxlength="25" minlength="5"></input> <br>
            </div>
        </div>

        <div class="linha">
            <div class="col-email">
                <input class="form-control" type="text" name="emailCliente" placeholder="E-mail:"></input> 
            </div><br>
        </div>

        
        <div class="linha">
            <div class="col-telefone">
                <input class="form-control" type="tel" name="celularCliente" placeholder="Telefone:"></input> 
            </div><br>
        </div>


<div class="linha">
    <div class="col-text">
        <textarea class ="formText"  name="MensagemG" id="mensagem" placeholder="Digite aqui sua mensagem"></textarea>
    </div>
</div>

<div class="linha">
    <div class="col-voltar">
 <input type="button"  class="btn btn-second" name="Voltar" value="Voltar "onClick="history.go(-1); return false;">
    </div>


   <div class="col-enviar">
 <input type="button" class="btn btn-primary" value="Enviar" onClick="history.go(-1); return false;">


    </div>
 </form>
 <div>

 <script src="JS/jquery.js"></script>
<script src="JS/carregamento.js"></script>
</body>
 </html>
 	


  









