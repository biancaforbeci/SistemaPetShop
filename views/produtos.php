<html lang="en">
  <head>
        
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link href="../vendor/styles/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/animate.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/responsive.css">
<link href="css/estilo.css" rel="stylesheet">

    <title>PET SHOP</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/busca.js" >  </script>
    
  </head>

  <body>

    <?php
        
        include_once("../controllers/funcoesProduto.php");
        $produtos = listar();
    ?>

    <br/>

  <main role="main">

  <?php include_once("../views/header.php");     ?>

<br><br>
<br><br>
<br><br>
<br><br>

     
 <div class="container marketing">

   <form method="POST"  id="form-pesquisa" action="busca.php">
        Pesquisar: <input type="text" name="pesquisa" id="pesquisa" placeholder="Digite o nome do produto que deseja pesquisar" >
        <input type="submit" name="enviar" value="Pesquisar" >
   </form>

<div class="resultado">
		
</div>





</main>

<footer class="container">
<p>&copy; PET SHOP 2018-2019</p>
</footer>


<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>

<script>
   $('.money').mask('#.##0,00', {reverse: true});
</script>


</html>