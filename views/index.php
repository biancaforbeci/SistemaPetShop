<!DOCTYPE html>
<html lang="en">
<head>
<title>Index</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Invest project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link href="../vendor/styles/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/animate.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/responsive.css">
<link href="css/estilo.css" rel="stylesheet">

</head>
<body>

<?php
        
        include_once("../controllers/funcoesProduto.php");

        $produtos = listar();
    ?>


<div class="super_container">
	
	<!-- Home -->

	<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->

			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slider Item -->
				<div class="owl-item">
					<div class="slider_background" style="background-image:url(../imagens/slide1.jpg)"></div>
					<div class="home_slider_content text-center">
						<h1>Os melhores produtos para o seu gato</h1>
						<div class="home_slider_text"></div>
						<div class="link_button home_slider_button"><a href="../views/listagemProdutos.php">Ver</a></div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item">
					<div class="slider_background" style="background-image:url(../imagens/slide2.jpg)"></div>
					<div class="home_slider_content text-center">
						<h1>Agendamento de Banho e Tosa</h1>
						<div class="home_slider_text">Traga seu gato para nós cuidarmos com carinho</div>
						<div class="link_button home_slider_button"><a href="../views/agendamento.php"> Agendar </a></div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item">
					<div class="slider_background" style="background-image:url(../imagens/slide3.jpg)"></div>
					<div class="home_slider_content text-center">
						<h1>Conheça a nossa missão</h1>
						<div class="home_slider_text">Cuidado e profissionalismo em nosso atendimento.</div>
						<div class="link_button home_slider_button"><a href="../views/missao.php">Ler mais</a></div>
					</div>
				</div>

			</div>

			<div class="home_slider_nav home_slider_prev d-flex flex-column align-items-center justify-content-center"><img src="images/arrow_l.png" alt=""></div>
			<div class="home_slider_nav home_slider_next d-flex flex-column align-items-center justify-content-center"><img src="images/arrow_r.png" alt=""></div>
			
		</div>

		<hr class="featurette-divider">

		<?php
			if (!empty($_POST)) {
				buscaProdutoDigitado($_POST);
			 }
		?>
		
		<!-- Header -->

		<?php

		include_once("../views/header.php");
		?>


<form  action="../views/index.php" id="myForm" method="POST">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
    <br/>
	<div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card card-sm">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" name="palavra" type="search" placeholder="Buscar Produto">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Procurar</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
</div>
</form>
   
<br>
<!-- Three columns of text below the carousel -->
<div class="row">
<?php
if(empty($produtos)){
  echo "Nenhum produto cadastrado !";
}else{
  foreach($produtos as $produto){  
      
?>
  <div class="col-lg-4">
  <div class="card mb-2 shadow-sm">   

<img class="card-img-top flex-auto d-none d-lg-block" src ="../<?= $produto['imagem'] ?>" width="50" height="160">
 
    
    <br/>
    <h3 style="text-align: center; color: blue; font-family: fantasy"><?= $produto['nome'] ?></h3>
    <div class="card text-center" style="width: 19,5rem;">
    <div class="card-body">
    <h2 style="text-align: center; color: red; font-family: fantasy"><?php echo 'R$ '. number_format($produto['preco'], 2, ',', '.')?> </h2>
    <a class="btn btn-info" href="../views/detalhes.php?acao=detalhes&id=<?=$produto['id']?>">Detalhes</a></td>
    <a class="btn btn-success" href="../views/confirmacao.php?acao=confirma&id=<?=$produto['id']?>">Reservar</a></td>
    </div>
    </div>
    </div>
  </div><!-- /.col-lg-4 -->
  <?php } }?>
  </div>
</div>
</div>

  


<hr class="featurette-divider">

<div class="news">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">A empresa</div>
						<div class="section_title">Por que escolher a HyperPet ?</div>
					</div>
				</div>
			</div>
			<div class="row news_row">
				
				<!-- News Item -->
				<div class="col-lg-4 news_col">
					<div class="news_item">
						<div class="news_image">
							<img src="../imagens/coracao.jpg" alt="" width="100" height="100">
						</div>
						<div class="news_content">
							<div class="news_title">Cuidado com o seu Pet</div>
							<div class="news_text">
								<p>Preparados para atender com carinho e dedicação seu gato.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- News Item -->
				<div class="col-lg-4 news_col">
					<div class="news_item">
						<div class="news_image">
							<img src="../imagens/coracao.jpg" alt="" width="100" height="100">
						</div>
						<div class="news_content">
							<div class="news_title">Produtos de Qualidade</div>
							<div class="news_text">
								<p>Possuimos uma variedade de produtos com marcas de qualidade.</p>
							</div>
						</div>						
					</div>
				</div>

				<!-- News Item -->
				<div class="col-lg-4 news_col">
					<div class="news_item">
						<div class="news_image">
							<img src="../imagens/coracao.jpg" alt="" width="100" height="100">
						</div>
						<div class="news_content">
							<div class="news_title">Banho e Tosa</div>
							<div class="news_text">
								<p>Com preços especiais, nossa empresa realiza serviços de banho e tosa em gatos.</p>
							</div>
						</div>						
					</div>
				</div>

			</div>
		</div>
	</div>


<hr class="featurette-divider">


<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h2 style="color: orange; font-family: fantasy">Missão</h2>
      <p>"Oferecer atendimento veterinário capacitado e produtos de qualidade, cuidando com respeito, carinho e dedicação, visando sempre atender nossos clientes de forma diferenciada e com profissionalismo." </p>
      <p><a class="btn btn-secondary" href="missao.php" role="button">Mais informações &raquo;</a></p>
    </div>
    <div class="col-md-4">
      <h2 style="color: orange; font-family: fantasy">Visão</h2>
      <p>"Ser reconhecida como centro veterinário de referência no segmento pet, através da excelência em nossos serviços e inovação constante da nossa empresa."
      <br/><b>Clique abaixo para saber mais.</b></p><br>
      <p><a class="btn btn-secondary" href="visao.php" role="button">Mais informações &raquo;</a></p>
    </div>
    <div class="col-md-4">
      <h2 style="color: orange; font-family: fantasy">Contato</h2>
      <p>
      <img src="../imagens/gato.jpg" class="rounded" alt="Cinque Terre" width="220" height="220"> 
      </p>
      <p><a class="btn btn-secondary" href="contato.php" role="button">Contato &raquo;</a></p>
    </div>
  </div>

  <hr>

</div> 


<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>

<script>
   $('.money').mask('#.##0,00', {reverse: true});
</script>


<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/owl.carousel.js"></script>
<script src="../js/easing.js"></script>
<script src="../js/parallax.min.js"></script>
<script src="../js/custom.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>