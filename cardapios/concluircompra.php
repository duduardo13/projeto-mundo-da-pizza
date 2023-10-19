<?php
include_once '../conexao.php';

session_start();


$login = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


//$cart = json_decode("<script>document.write(localStorage.getItem('cart'))</script>");


// $cart = filter_input(INPUT_POST, 'cart');
// $decoded = json_decode($cart, true);
// var_dump($decoded);

//$foda = json_decode($cart)



//foreach ($foda as $key => $value) {
 //   echo $value->name;
//}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../formatacao/formconcluircompra.css">
    <link rel="icon" href="../img/logo.ico">
    <link rel="stylesheet" type="text/css" href="../formatacao/telacarregamento.css">
    
    <title>Finalizar Compra</title>
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



<div class="container"> <!-- classe responsável por se adaptar ao tamanho da tela e comportar dentro de si, todos os outros elementos -->
      
    
    <form class="form" action="#" method="POST" enctype="multipart/form-data"> <!--Multipart/form-data, para poder capturar arquivos-->
<!------------------------------------------------------------------------------------------------------------------------------------------->
<br><br><fieldset class="fieldset">

<div class="linha-2">

<div class="col-finalizar">
    Finalizar Compra
</div>

<div class="col-logoPizza">
    <img src="../img/logoPizza.png" class="logoPizza finalizar">

</div>


</div>

    <div class="linha">  <!-- classe responsável por determinar a margem em relação ao item de baixo -->
        <div class="col-nome">
<input type="text" class="form-control" name="nomeCliente" id="nomeCliente" aria-describedby="nomeCliente" placeholder="Nome" value="<?php echo $row['nm_cliente'];?>"  readonly="true" required>
        </div>
    </div>

<!------------------------------------------------------------------------------------------------------------------------------------------->

    <div class="linha">
        <div class="col-celular">
        <input type="tel" class="form-control" name= "celularCliente" id="celularCliente" aria-describedby="celularCliente" placeholder="Celular" value="<?php echo $row['cel_cliente'];?>" readonly="true"required>
        </div>                               
    </div>
<!------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="linha">
        <div class="col-cpf">
            <input type="text" class="form-control" name="cpfCliente" id="cpfCliente" aria-describedby="cpfCliente" onblur="alert(TestaCPF(this.value));" 
            onkeypress='return event.charCode >= 48 && event.charCode <= 57'
            placeholder="CPF" value="<?php echo $row['cpf_cliente'];?>" maxlength="11"  readonly="true">
        </div>
    </div>
<!------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="linha">
                <div class="col-endereco">
                   

                    <select id="endereco" name="endereco" class="endereco" required>
                      <option>Selecione o endereço</option>
                      <?php
                      try{
                    $select_endereco = $conexao->query("SELECT * FROM tb_endereco_cliente where cd_cliente_endereco='$cdcliente'");
                    while($row_endereco = $select_endereco->fetch()){
                     echo "<option value=".$row_endereco['cd_endereco'].">".$row_endereco['desc_endereco']."</option>";
                    }
                }
                catch(PDOException$e) 
                {
                echo 'ERROR: ' . $e->getMessage();
                }
                      ?>
                    </select>
                </div> 
            </div> <br><br>
<!------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="linha">
        <div class="col-pagamento">
            Método de Pagamento:
        </div>
    </div> <br>
<!------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="linha">
        <div class="col-metodoCartao">
            <input type="radio" name="pagamento" value="Cartão" id="metodopagid"  required>

                <label for="metodopagid" class="metodopag" >Cartão na Entrega</label>

        </div> 
    </div>
    
<!------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="linha">
        <div class="col-metodoDinheiro">
            <input type="radio" name="pagamento" value="Dinheiro" id="metodopagid2"  required>
            <label for="metodopagid2" class="metodopag">Dinheiro na Entrega</label>
        </div>
    </div>

<!------------------------------------------------------------------------------------------------------------------------------------------->
<div class="linha">
        <div class="col-metodoPix">
            <input type="radio" name="pagamento" value="Pix" id="metodopagid3"  required>
            <label for="metodopagid3" class="metodopag">Pix na Entrega</label>
        </div>
    </div><br><br>

<!------------------------------------------------------------------------------------------------------------------------------------------->

<div class="selecionados-area"></div>



<div class="linha">
    <div class="col-pedido">
        Pedido:
    </div>
</div>

<div class="linha">
    <div class="pedido-area"> </div>
</div>

<div class="linha">
    <div class="col-valortotal">
     Valor Total:
    </div> 
    <div class="col-total">
        <input type="text" name="total-pagar" id="total-pagar" value="" class="total-form" readonly="true" required>
    </div>
</div>


<div class="linha">
<div class="col-voltar">
<input type="button"  class="btn btn-second" name="Voltar" value="Voltar" onClick="history.go(-1); return false;">
</div>


<div class="col-enviar">
<input type="submit" class="btn btn-primary" value="finalizar compra">
</div>

</div>
</fieldset><br><br><br><br>
        </form>
    

</div>

<div class="modelo">
    
    <div class="pedido-item">

        <div class="col-produto">  <input type="text" name="produto" id="produto" value="" class="pro-form" readonly="true" required> </div>
        <div class="col-quantidade"> <input type="text" name="quantidade" id="quantidade" value="" class="pro-form" readonly="true" required> </div>
        <div class="col-preco">  <input type="text" name="preco" id="preco" value="" class="pro-form" readonly="true" required> </div>
        <div class="col-id">  <input type="text" name="id" id="id" value="" class="pro-form" readonly="true" required>  </div>

    </div>
</div>

<script src="../formatacao/metodopag.js"></script>
<script src="../JS/concluircompra.js"></script>
<script src="../JS/jquery.js"></script>
<script src="../JS/carregamento.js"></script>
</body>
</html>
<?php

if(!empty($_POST)){
   date_default_timezone_set('America/Sao_Paulo');

$nome = $_POST['nomeCliente'];
$cel = $_POST['celularCliente'];
$endereco = $_POST['endereco'];
$formPag = $_POST['pagamento'];
$produto = $_POST['produto'];
$qtproduto = $_POST['quantidade'];
$valor = $_POST['total-pagar'];
$id = $_POST['id'];
$dtpedido = date("Y-m-d H:i:s");



$stmt = $conexao->prepare("INSERT INTO tb_pedido(formPag_pedido,cd_cliente,cd_endereco,dt_pedido,vl_pedido,st_pedido) 
VALUES(?,?,?,?,?,'Em Andamento');");
$stmt->bindParam(1,$formPag);
$stmt->bindParam(2,$cdcliente);
$stmt->bindParam(3,$endereco);
$stmt->bindParam(4,$dtpedido);
$stmt->bindParam(5,$valor);

$stmt -> execute();


$select_cdpedido = $conexao->prepare("SELECT * FROM tb_pedido where dt_pedido ='$dtpedido'");
			$select_cdpedido->execute();
		    $row_cdpedido = $select_cdpedido->fetch();
            $cdpedido = $row_cdpedido['cd_pedido'];




                /* $stmt2 = $conexao->prepare("INSERT INTO tb_item(qt_produto,cd_produto,cd_pedido) 
VALUES(?,?,?);");

$stmt2->bindParam(1,$qtproduto);
$stmt2->bindParam(2,$id);
$stmt2->bindParam(3,$cdpedido);

$stmt2->execute();

            }*/

$stmt2 = $conexao->prepare("INSERT INTO tb_item(qt_produto,cd_produto,cd_pedido) 
VALUES(?,?,?);");

$stmt2->bindParam(1,$qtproduto);
$stmt2->bindParam(2,$id);
$stmt2->bindParam(3,$cdpedido);

$stmt2->execute();
					
					echo "<script>
					    alert('Pedido Cadastrado!');
                        window.location.href='../home.php'
						 </script>";
				}
              

?>
