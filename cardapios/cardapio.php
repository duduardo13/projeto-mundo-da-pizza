<?php


	if (!empty($_POST)) 
	{
		include_once 'conexao.php';
		$login = $_POST['usuario_cliente'];
		$senha = $_POST['senha_cliente'];
		
		$rs = $conexao->query("SELECT * FROM tb_cliente where usuario_cliente='$login'and senha_cliente='$senha'");


		$rs -> execute();
		
        if (($login == "super") && ($senha = "usuario"))
        {
           
            header('Location:home.php');
            }

		if($rs->fetch(PDO::FETCH_ASSOC) == true)
		{
             
			header('Location:home.php');
		}
		else
		{
			echo"<script>alert('Nome de usuário ou senha incorreto');</script>";
		}
	}

?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo.ico" />

    <title>Cardápio</title>
    <link rel="stylesheet" href="../formatacao/style.css" />
    <link rel="stylesheet" href="../formatacao/home.css" />
    <link rel="stylesheet" type="text/css" href="../formatacao/telacarregamento.css">
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



    <!-- modelos de pizza na lista e no carrinho -->
    <div class="models">

        <!-- pizza na lista -->
        <div class="pizza-item">
            <a href="">
                <div class="pizza-item--img"><img src="" /></div>
                <div class="pizza-item--add">+</div>
            </a>
            <div class="pizza-item--price">R$ --</div>
            <div class="pizza-item--name">--</div>
            <div class="pizza-item--desc">--</div>
        </div>

        <!-- pizza no carrinho -->
        <div class="cart--item">
            <img src="" />
            <div class="cart--item-nome">--</div>
            <div class="cart--item--qtarea">
                <button class="cart--item-qtmenos">-</button>
                <div class="cart--item--qt">1</div>
                <button class="cart--item-qtmais">+</button>
            </div>
        </div>

    </div>
    <!-- /models -->

    <!-- .menu-openner aparecera no modo mobile -->
    <header>
        <img src="../images/logo.png" class="logo"><!-- Logo da pizzaria -->
        <div class="menu-responsivo"> <!-- Menu hamburguer para o mobile -->
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>
            <ul class="itens-menu"> <!-- Elementos clicáveis do menu (links de ancoragem) -->
                <li><a href="../home.php">Home</a></li>
                <li><a href="../home.php#cardapio">Cardápio</a></li>
                <li><a href="../home.php#localizacao">Como Chegar</a></li>
                <li><a href="../home.php#quemsomos">Quem Somos</a></li>
                <li><a href="../home.php#promocoes">Promoções</a></li>
                <li><a href="../home.php#faq">FAQ</a></li>
            </ul>
             
            <div class="menu-openner"><span>0</span>🛒</div> 
        
        
    </header>
    <!-- /menu-openner -->

    <!-- conteudo principal -->
    <main>
    <section id="recomendacao">
                <h1>Confira nosso Cardápio!</h1><br><br>

                <p> O <strong class="destaque">Mundo da Pizza </strong> é o lugar perfeito para os amantes de pizza. Aqui, temos uma variedade de opções deliciosas que agradam a todos os paladares. Temos opções tradicionais, doces e especiais para que você possa escolher a sua preferida.</p>
<br>
<p>Se você é um fã de pizzas clássicas, recomendamos as nossas opções tradicionais, como a mussarela, quatro queijos e calabresa. Essas pizzas são feitas com ingredientes frescos e de alta qualidade, combinando sabores que vão deixar você com água na boca.</p>
<br>
<p>Para aqueles que têm um paladar mais doce, não deixe de experimentar nossas pizzas doces, como a de banana com canela ou a de chocolate com morango. Estas pizzas são uma excelente opção para a sobremesa ou para quem gosta de misturar sabores doces e salgados.</p>
<br>
<p>Para aqueles que procuram algo diferente, nossas pizzas especiais são as melhores opções. Experimente a pizza de quarenta e oito queijos! Nossas pizzas especiais são feitas com ingredientes selecionados e combinações únicas de sabores, que com certeza vão agradar a todos.</p>
<br>    
<p>Não importa o seu gosto, o <strong class="destaque">Mundo da Pizza </strong> tem a pizza perfeita para você. Experimente nossas opções tradicionais, doces e especiais, e deixe o seu paladar se deliciar com as nossas pizzas incríveis. Venha nos visitar ou faça seu pedido pelo <strong class="destaque">delivery online</strong> e saboreie as melhores pizzas da cidade.</p>


        </section>


        <section id="tradicional">

            <br><br>
        <h1>Pizzas Tradicionais</h1>
            <br><br>
        <div class="pizza-area"></div>

        </section>
        <section id="doce">
            <br><br>
        <h1>Pizzas Doces</h1>
        <br><br>
        <div class="pizza-area-doce" ></div>

        </section>

        <section  id="especial">
            <br><br>
        <h1>Pizzas Especiais</h1>
        <br><br>
        <div class="pizza-area-especial"></div>

        </section>
    </main>
    <!-- /conteudo principal -->

    <!-- aside do carrinho -->
    <aside>
        <div class="cart--area">
            <div class="menu-closer">❌</div>
            <h1>Suas Pizzas</h1>
            <div class="cart"></div>
            <div class="cart--details">
                <div class="cart--totalitem subtotal">
                    <span>Subtotal</span>
                    <span>R$ --</span>
                </div>
                <div class="cart--totalitem desconto">
                    <span>Desconto</span>
                    <span>R$ --</span>
                </div>
                <div class="cart--totalitem total big">
                    <span>Total</span>
                    <span>R$ --</span>
                </div>
                <div class="cart--finalizar">Finalizar a compra</div>
            </div>
        </div>
    </aside>
    <!-- /aside do carrinho -->

    <!-- janela modal .pizzaWindowArea -->
    <div class="pizzaWindowArea">
        <div class="pizzaWindowBody">
        
            <div class="pizzaBig">
                <img src="" />
            </div>
            <div class="pizzaInfo">
                <h1>--</h1>
                <div class="pizzaInfo--desc">--</div>
                <div class="pizzaInfo--pricearea">
                    <div class="pizzaInfo--sector">Preço</div>
                    <div class="pizzaInfo--price">
                        <div class="pizzaInfo--actualPrice">R$ --</div>
                        <div class="pizzaInfo--qtarea">
                            <button class="pizzaInfo--qtmenos">-</button>
                            <div class="pizzaInfo--qt">1</div>
                            <button class="pizzaInfo--qtmais">+</button>
                        </div>
                    </div>
                </div>
                <div class="pizzaInfo--addButton">Adicionar ao carrinho</div>
                <div class="pizzaInfo--cancelButton">Cancelar</div>
            </div>
        </div>
    </div>
    <!-- /janela modal .pizzaWindowArea -->
    <script src="../JS/pizzas.js"></script>
    <script src="../JS/scriptCarrinho.js"></script>
    <script src="../formatacao/menumobile.js"></script>
    <script src="../JS/jquery.js"></script>
<script src="../JS/carregamento.js"></script>
</body>
</html>