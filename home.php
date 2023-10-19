<?php
error_reporting(0);
include_once 'conexao.php';
session_start();

if(!isset($_SESSION['usuario'])){ //se a sessão não existir, manda o usuário para a tela de login
    header("Location: index.php?sem_login");
}

if($_GET["sair"]){ //ao clicar no botão de sair, a sessão é desmontada, mandando o usuário para a tela de login
    header("Location: index.php");
    unset($_SESSION['usuario']);
}

?>

<php lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="formatacao/home.css">
    <link rel="stylesheet" href="formatacao/cardapios.css">
    <link rel="stylesheet" href="formatacao/faq.css">
    <link rel="icon" href="img/logo.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="formatacao/telacarregamento.css">

    <title>Sistema web para um restaurante</title>
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



<!-- cabeçalho da página -->

    <header> 
         <!-- Início do Menu -->
            <img class="logo" src="img/logo.png" > <!-- Logo da pizzaria -->

        <div class="menu-responsivo"> <!-- Menu hamburguer para o mobile -->
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>

            <ul class="itens-menu"> <!-- Elementos clicáveis do menu (links de ancoragem) -->
                <li><a href="home.php">Início</a></li>
                <li><a href="home.php#cardapio">Cardápio</a></li>
                <li><a href="home.php#localizacao">Como Chegar</a></li>
                <li><a href="home.php#quemsomos">Quem Somos</a></li>
                <li><a href="home.php#promocoes">Promoções</a></li>
                <li><a href="home.php#faq">FAQ</a></li>

            </ul>
        
        <input type="checkbox" id="check"> <!-- Botão que abre o dropdown -->
            <label for="check">
                <i class="material-symbols-outlined" id="btn-conta">account_circle</i>
                <a class="fechar" id="cancel">X</a>
            </label>
            <div id="account_form"> <!-- Dropdown-->
                <br><h1><a class="material-symbols-outlined">account_circle</a></h1><br>
                <ul id="account_list">
                <form action="#" method="POST">
                    <li><a href="minhaconta.php">Minha Conta</a></li>
                    <li><a href="meuspedidos.php">Meus Pedidos</a></li>
                    <li><a href="cadastro/cadastroEndereco.php">Meus Endereços</a></li>
                    <li><a href="suporte.php">Suporte</a></li>
                    <li><a id="sair" href="home.php?sair=true">Sair</a></li>
                    </form>
                </ul>
                
            </div>

        <!-- <div class="itens-conta">
            <ul><a class="material-symbols-outlined">account_circle</a>
                <li><a id="conta" href="minhaconta.php">Minha Conta</a></li>
                <li><a id="conta" href="meuspedidos.php">Meus Pedidos</a></li>
                <li><a id="conta" id="sair" href="home.php?sair=true">Sair</a></li>        
            </ul>
        </div> -->

                <!-- <li><img class="account" src="../img/account.png"></li> -->
         <!-- Fim do Menu -->
    </header>

<!--início do Carrossel-->
<br><br><br><br>
<section class="galeria" id="#inicio">
    <div class="imagens">
        <img src="img/carousel1.png" alt="Imagem 1">
        <img src="img/carousel2.png" alt="Imagem 1">
        <img src="img/carousel4.png" alt="Imagem 1">
    </div>    
</section>
<!--Fim do Carrossel-->


<!-- Início dos Cardápios -->
<section class="cardapios" id="cardapio">
    <div class="container-cardapio">
        <br><br><h1>Cardápios</h1><br>
        <div class="linha-cardapio">
            <div class="coluna-tradicional">
                <a href="cardapios/cardapio.php#tradicional"><img src="img/cardapiotradicional.png"></a>
            </div>
            <div class="coluna-especial">
                <a href="cardapios/cardapio.php#doce"><img src="img/cardapioespecial.png"></a>
            </div>
            <div class="coluna-doce">
                <a href="cardapios/cardapio.php#especial"><img src="img/cardapiodoce.png"></a>
            </div>
        </div>
    </div>
    <br><br>
</section>
<!-- Fim dos cardápios -->

<!--Como chegar-->

<section class="localizacao" id="localizacao"><br>
    <h1 class="titulo-localizacao">Como chegar</h1><br><br>
<div class="mapa">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3645.0252034747928!2d-46.424588185007146!3d-23.994887084469433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce1c38fddcc473%3A0x9b0756e7aad3fd18!2sMundo%20Fatias%20Pizzaria!5e0!3m2!1spt-BR!2sbr!4v1663903843825!5m2!1spt-BR!2sbr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>

</section>
<!--fim do como chegar-->

<!--Promoções-->
<section class="promocoes" id="promocoes">
    <div class="container-promo">
        <br><br><h1 class="texto-promocoes">Promoções</h1><br>
        <div class="linha-promocoes">
                <p><h1 class="texto-promocoes2"> Siga-nos no Instagram para receber</p><p> promoções novas toda semana!</h1></p>  
            <div class="coluna-promocao1"></div>
            
<div class="coluna-promocao2">
            <div class="widget-instagram"><div style="position:relative;max-width:350px;min-width:100px;"><blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/Ce2BCbSgfF6/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:350px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/Ce2BCbSgfF6/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/Ce2BCbSgfF6/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by 🔺 Pizzaria &amp; Açaiteria 🔻 (@mundodapizzapg)</a></p></div></blockquote><script async src="//platform.instagram.com/en_US/embeds.js"></script><div style="position: absolute;width: 80%;bottom:2px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"></div></div>
    </div>
    </div>
    </div>
    <div class="coluna-promocao3"></div>
    <br><br>
</section>
<!--fim do promoções-->

<!-- Início quem somos -->
<div class="container-qs">
        <img src="img/qmsomos.png" class="estabelecimento">
        <section class="quemsomos" id="quemsomos">
        <div class="linha-quemsomos">
            <div class="colun-quem">
                <p class="quem">Bem-vindo ao <strong class="destaque">Mundo da Pizza!</strong> Criado em 2020, nosso estabelecimento tem como objetivo proporcionar aos nossos clientes uma experiência gastronômica inesquecível por meio de pizzas deliciosas e um excelente custo-benefício.

                    Aqui no <strong class="destaque">Mundo da Pizza</strong>, prezamos pela qualidade dos ingredientes utilizados em nossas receitas e pela excelência no atendimento ao cliente. Buscamos sempre inovar e oferecer o melhor para nossos clientes, e é por isso que agora contamos com um novo serviço de <strong class="destaque">delivery online.</strong> Agora você pode desfrutar de nossas pizzas incríveis no conforto da sua casa, sem abrir mão da qualidade e do sabor que você já conhece.
                    </p>
                <br>
                <p class="somos">Além disso, para deixar a sua experiência ainda mais completa, estamos sempre lançando novas <strong class="destaque">promoções</strong> e descontos especiais para nossos clientes. Queremos garantir que todos possam desfrutar das nossas delícias sem se preocupar com o preço.

                    Então, se você está procurando por pizzas deliciosas e um atendimento excepcional, o <strong class="destaque">Mundo da Pizza </strong> é o lugar certo para você. Acesse agora mesmo nosso <strong class="destaque"> delivery online </strong> e faça o seu pedido. Estamos ansiosos para te surpreender!</p>
            </div>
            <div class="colun-somos">
            <img src="img/logoPizza.png">
            </div>
        </div>
       <div class="linha-mvv">
            <div class="cou-missao">
                <p class="t-missao">Missão</p>
                <br>
                <p class="c-missao">Servir seus clientes com honestidade e entusiasmo, proporcionando boas memórias e um bom atendimento a todos os nossos consumidores.</p>
            
            </div><br>
            <div class="cou-visao">
                <p class="t-visao">Visão</p>
                <br>
                <p class="c-visao">Ser um estabelecimento obstinado em atender as necessidades dos clientes e consumidores sempre agregando valores e proporcionando satisfatórias refeições.</p>
            </div><br>
            <div class="cou-valores">
                <p class="t-valores">Valores</p>
                <br>
                <p class="c-valores">Comprometimento Honestidade Custo-Benefício Padrão Qualidade.</p>
            </div>

        </div>
    </section>
    </div>
    
<!-- Fim do quem somos  -->

<section class="faq1" id="faq">
        <br><h1 class="texto-faq">Dúvidas Frequentes</h1><br><br>
 <div class="faq">
        <div class="caixa">
            <button class="alternar">
                Qual a vantagem de se cadastrar no sistema?
                <i class="fas fa-plus icon"></i>
            </button>
            <div class="conteudo">
                <p>Ao se cadastrar o usuário poderá verificar todos os pedidos que foram feitos, além de conseguir entrar na aba de suporte para poder mandar alguma opinião diretamente para os membros desenvolvedores do sistema.</p>
            </div>
        </div>
        <div class="caixa">
            <button class="alternar">
               Aonde posso encontrar as promoções?
                <i class="fas fa-plus icon"></i>
            </button>
            <div class="conteudo">
                <p>Fácil, por meio do instagram do “Mundo da Pizza”, ao seguir você será notificado de promoções assim que forem anunciadas!</p>
            </div>
        </div>
        <div class="caixa">
            <button class="alternar">
                Como eu faço para editar a minha conta?
                <i class="fas fa-plus icon"></i>
            </button>
            <div class="conteudo">
                <p>O processo é simples, basta clicar no ícone do usuário localizado no canto superior direito no topo da página inicial, selecionar a opção "Minha conta" e escolher a função alterar. Ao clicar nessa função, um formulário irá se abrir permitindo que as informações principais da sua conta possam ser modificadas a sua escolha.</p>
            </div>
        </div>
    </div>
</section>

<main></main>

    <!-- Início do Rodapé do site-->
<footer class="footer-distributed">

			<div class="footer-left">

				<h3>Mundo<span> da Pizza</span></h3>

				<p class="footer-links">
                <a href="home.php">Início</a>
                <a href="home.php#cardapio">Cardápio</a>
                <a href="home.php#localizacao">Como Chegar</a>
                <a href="home.php#quemsomos">Quem Somos</a>
                <a href="home.php#promocoes">Promoções</a>
                <a href="home.php#faq1">FAQ</a>
				</p>

				<p class="footer-company-name">Mundo da Pizza © 2020</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Av. Irmãos Adorno 577</span> Praia Grande - SP</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+55 13 99652-0020</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:lucorrenti@gmail.com">lucorrenti@gmail.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>Sobre nós</span>
					A pizzaria Mundo da pizza é um estabelecimento recente, localizada na Praia Grande, que se compromete em proporcionar uma saborosa refeição custo beneficio, para qualquer amante de pizza.
				</p>
                <br>

					<a href="https://l.instagram.com/?u=https%3A%2F%2Fwa.me%2Fmessage%2FORZ7GHSVX6AON1&e=ATOlJodd4qD8UM99XUDe9AOA0zbfH9Uyi_Mb0EhPSMoTuh6vWtqy1Vr_k_WDEUeOxbQ5o9fpTbsZTexkfwQSQTNvBL0Q36ya&s=1"  target="_blank">
                    <img class="whatsapp" src="img/whatsapp.png"></a>
					 <a href="https://www.instagram.com/mundodapizzapg/?utm_source=ig_embed&ig_rid=5c19d8b7-af2a-47b1-91af-b1d5e23f9c06"  target="_blank">
                     <img class="instagram" src="img/Instagram.png"></a>
	

			
			</div>

		</footer>

<!-- Fim do Rodapé do site-->

    <script src="formatacao/menumobile.js"></script>
    <script src="formatacao/script.js"></script>
    <script src="formatacao/faq.js"></script>
    <script src="JS/jquery.js"></script>
<script src="JS/carregamento.js"></script>
</body>
</php>


  









