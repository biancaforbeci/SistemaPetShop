<html>
  <head>

    <title> Detalhes Cliente </title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
   <!-- Theme CSS-->
   <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link href="../vendor/styles/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/animate.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/responsive.css">
<!-- <link href="../css/estilo.css" rel="stylesheet"> -->

  </head>
 <body>
 <?php include_once("../views/header.php");     ?>

<br><br>
<br><br>
<br><br>
<br><br>
    <?php

     
     include_once('../controllers/funcoes.php');

     $cliente="";
     
     if (!empty($_GET)) {
          if($_GET['acao']=='detalhes'){   
          $cliente=buscaCliente($_SESSION['user']);     
          $id = $cliente['id'];
          $nome = $cliente['nome_cliente'];
          $sobrenome = $cliente['sobrenome'];
          $cpf= $cliente['cpf'];
          $telefone= $cliente['telefone'];
          $endereco= $cliente['endereco'];
          $logradouro= $cliente['logradouro'];
          $cidade= $cliente['cidade'];
          $estado= $cliente['estado'];
          $cep= $cliente['cep'];
          $email = $cliente['email'];
          $senha = $cliente['senha'];
      }else if($_GET['acao']=='editar'){
        $id = $_GET['id'];
        buscar($id);
      }
    }
     
    ?>

    <br><br/>  
    <main role="main" class="container">

    <h2 style="text-align: center; color: greenyellow; font-family: fantasy" >Informações do Cliente</h2>
        <form  action="cadastroClientes.php" method="POST">
          <input type="hidden" name="id" value="<?=$id?>"/>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputFName">First Name</label>
                <input type="text" class="form-control" name="nome" id="inputFName" readonly placeholder="First name" value="<?=$nome?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputLName">Last Name</label>
                <input type="text" class="form-control" id="inputLName" name="sobrenome" readonly placeholder="Last name" value="<?=$sobrenome?>">
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label" id="inputCpf">CPF</label>
                    <input type="text" class="form-control cpf"  placeholder="CPF" readonly name="cpf" value="<?=$cpf?>"/>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPhone">Phone</label>
                  <input type="text" class="form-control sp_celphones" id="inputPhone" readonly name="telefone" value="<?=$telefone?>">
                </div>
              </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" readonly placeholder="Email" value="<?=$email?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="senha" readonly placeholder="Password" value="<?=$senha?>">
                  </div>
                </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputAddress">Address</label>
                  <input type="text" class="form-control" id="inputAddress"  name="endereco" readonly placeholder="1234 Main St" value="<?=$endereco?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputAddress2">Address 2</label>
                  <input type="text" class="form-control" id="inputAddress2" name="logradouro" readonly placeholder="Apartment, studio, or floor" value="<?=$logradouro?>">
                </div>
              </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control"  placeholder="City" name="cidade" readonly id="inputCity" value="<?=$cidade?>">
                  </div>

                 <div class="form-group col-md-6">
                    <label for="input">Estado</label>
                    <input type="text" class="form-control" id="inputEstado" name="estado" readonly value="<?=$estado?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control cep" id="inputZip" readonly name="cep" value="<?=$cep?>">
                  </div>

                  <div class="form-group col-md-4">
                  <br>
                    <a  class="btn btn-info leftbtn btn-primary btn-lg btn-block" href="../controllers/funcoes.php?acao=editar&id=<?=$cliente['id']?>">Editar</a>
                 </div>
                </div>
                </div>
                
             </form>                 
      </main>

   

 <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
 <script type="text/javascript" src="js/jquery.mask.min.js"></script>

<script>
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cep').mask('00000-000'); 
    var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
    };

  $('.sp_celphones').mask(SPMaskBehavior, spOptions);
</script>

 </body>
</html>