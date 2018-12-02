<!doctype html>
<html>
  <head>
    <title>PET SHOP</title>

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

  <?php include_once("../views/header.php");     ?>

<br><br>
<br><br>
<br><br>
<br><br>


    <?php
        include_once("../controllers/funcoesReservas.php");
        if (!empty($_GET)) {        
          if($_GET['acao']=='enviar'){
             $resp=salvarItensReservados($_SESSION['user'],$_SESSION['carrinho']);
             if($resp){
              unset($_SESSION['carrinho']); 
              echo "<script>alert('Salvo com sucesso, favor retirar na loja !');</script>";
              }else{
               echo "<script>alert('Tente novamente !');</script>";
              }
          }
        }
    ?>

  <main role="main">

<p>

<div class="container">
    <div class="col-md-6">
    <img src="../imagens/carimbo.jpg" class="mx-auto d-block rounded" alt="Cinque Terre" width="500" height="400"> 
        <h2 style="text-align: center; color: red; font-family: fantasy">Estamos separando com carinho !</h2> 
    </div>
    <div class="col-md-6">
        <div class="configdiv">
        <div class="btn-group center">
        <p><a class="btn btn-primary btn-lg" href="contato.php" role="button">Ver nossa localização &raquo;</a></p>
        <br/>
        <p><a class="btn btn-success btn-lg" href="agendamento.php" role="button">Agendar banho e tosa &raquo;</a></p>
        </div>
        </div>
    </div>
</div>

  </main>
  <br><br/>
<footer class="container">
<p>&copy; PET SHOP 2018-2019</p>
</footer>

  </html>