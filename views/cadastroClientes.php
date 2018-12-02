<html>
  <head>

    <title> Cadastro Cliente </title>
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

     
     include_once('../controllers/funcoes.php');
     
     if(!empty($_SESSION['cliente'])){
       $cliente=$_SESSION['cliente'];
     }
     
     $id = "";
     $nome = "";
     $sobrenome = "";
     $telefone = "";
     $endereco = "";
     $logradouro = "";
     $cidade = "";
     $estado = "";
     $cep = "";
     $cpf = "";
     $email ="";
     $senha = "";

      if(!empty($cliente)){
           $id = $cliente['id'];
          $nome = $cliente['nome'];
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
          unset($_SESSION['cliente']); 
      }

     if (!empty($_POST)) {
      if(empty($_POST['id'])){
        if(validar()){
         $a=salvarCliente($_POST);

         if($a){
          echo '<script type="text/javascript">alert("Salvo com sucesso !");</script>';
         }else{
          echo '<script type="text/javascript">alert("Ocorreu erro!");</script>';
         }  

        }else{
          $_SESSION['message']="Verifique se todos os campos foram preenchidos !";
          $_SESSION['num']=1;
        }          
      }else{

        if(validar()){
          $n=editarCliente($_POST);

         if($n){
          echo '<script type="text/javascript">alert("Editado com sucesso !");</script>';
         }else{
          echo '<script type="text/javascript">alert("Ocorreu erro!");</script>';
         }  
        }else{
          $_SESSION['message']="Verifique se todos os campos foram preenchidos !";
          $_SESSION['num']=2;
        }  
      }        
  }

  if(!empty($_SESSION['message'])){
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome');
    $sobrenome = filter_input(INPUT_POST, 'sobrenome');
    $cpf = filter_input(INPUT_POST, 'cpf');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $endereco = filter_input(INPUT_POST, 'endereco');
    $logradouro = filter_input(INPUT_POST, 'logradouro');
    $cidade = filter_input(INPUT_POST, 'cidade');
    $estado = filter_input(INPUT_POST, 'estado');
    $cep = filter_input(INPUT_POST, 'cep');
    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');
    $url = filter_input(INPUT_POST, 'url');
    if(!empty($_SESSION['num'])){
      $n=$_SESSION['num'];
      if($n==2){
        $cliente=2;
        unset($_SESSION['num']); 
      }else{
        unset($_SESSION['num']); 
      }
    }
 }
}


  function validar(){

    if( empty($_POST['nome']) || empty($_POST['sobrenome']) || empty($_POST['cpf']) || empty($_POST['telefone']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['endereco']) || empty($_POST['cidade']) || empty($_POST['estado']) || empty($_POST['cep'])){
      $_SESSION['message']="Verifique se os campos nome, sobrenome, CPF, telefone, email,senha, endereco, cidade, estado e CEP foram preenchidos";
      return false;
    }else{
      return true;
    }
  }
     
    ?>
    <main role="main" class="container">

<?php
        if(isset($_SESSION['message'])) : ?>

    <div class="alert alert-warning">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>

    </div>
<?php endif ?>
    <br><br/>  


    <?php if(empty($cliente)){ ?> 
      <h2 style="text-align: center; color: greenyellow; font-family: fantasy" >Cadastro de Clientes</h2>
    <?php }else{ ?>
        <h2 style="text-align: center; color: greenyellow; font-family: fantasy" >Edição de Cliente</h2>
    <?php } ?> 
      <form  action="cadastroClientes.php" id="myForm" method="POST">
          <input type="hidden" name="id" value="<?=$id?>"/>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputFName">First Name</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="First name" value="<?=$nome?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputLName">Last Name</label>
                <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Last name" value="<?=$sobrenome?>">
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label" id="inputCpf">CPF</label>
                    <input type="text" class="form-control cpf" id="cpf" placeholder="CPF" name="cpf" value="<?=$cpf?>"/>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPhone">Phone</label>
                  <input type="text" class="form-control sp_celphones" id="telefone" placeholder="Phone" name="telefone" value="<?=$telefone?>">
                </div>
              </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?=$email?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Password" value="<?=$senha?>">
                  </div>
                </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputAddress">Address</label>
                  <input type="text" class="form-control" id="endereco"  name="endereco" placeholder="1234 Main St" value="<?=$endereco?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputAddress2">Address 2</label>
                  <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Apartment, studio, or floor" value="<?=$logradouro?>">
                </div>
              </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control"  placeholder="City" name="cidade" id="cidade" value="<?=$cidade?>">
                  </div>

<?php
function selected( $value, $selected ){
    return $value==$selected ? ' selected="selected"' : '';
}
?>


                  <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="estado" class="form-control" name="estado">                     
                      <option value="AC"<?php echo selected( 'AC', $estado ); ?>>Acre</option>
	                    <option value="AL"<?php echo selected( 'AL', $estado ); ?>>Alagoas</option>
	                    <option value="AP"<?php echo selected( 'AP', $estado ); ?>>Amapá</option>
                    	<option value="AM"<?php echo selected( 'AM', $estado ); ?>>Amazonas</option>
                    	<option value="BA"<?php echo selected( 'BA', $estado ); ?>>Bahia</option>
	                    <option value="CE"<?php echo selected( 'CE', $estado ); ?>>Ceará</option>
                    	<option value="DF"<?php echo selected( 'DF', $estado ); ?>>Distrito Federal</option>
                    	<option value="ES"<?php echo selected( 'ES', $estado); ?>>Espírito Santo</option>
                    	<option value="GO"<?php echo selected( 'GO', $estado ); ?>>Goiás</option>
                    	<option value="MA"<?php echo selected( 'MA', $estado); ?>>Maranhão</option>
                      <option value="MT"<?php echo selected( 'MT', $estado ); ?>>Mato Grosso</option>
                      <option value="MS"<?php echo selected( 'MS', $estado ); ?>>Mato Grosso do Sul</option>
                      <option value="MG"<?php echo selected( 'MG', $estado); ?>>Minas Gerais</option>
                      <option value="PA"<?php echo selected( 'PA', $estado ); ?>>Pará</option>
                      <option value="PB"<?php echo selected( 'PB', $estado ); ?>>Paraíba</option>
                      <option value="PR"<?php echo selected( 'PR', $estado ); ?>>Paraná</option>
                      <option value="PE"<?php echo selected( 'PE', $estado ); ?>>Pernambuco</option>
                      <option value="PI"<?php echo selected( 'PI', $estado ); ?>>Piauí</option>
                      <option value="RJ"<?php echo selected( 'RJ', $estado ); ?>>Rio de Janeiro</option>
                      <option value="RN"<?php echo selected( 'RN', $estado ); ?>>Rio Grande do Norte</option>
                      <option value="RS"<?php echo selected( 'RS', $estado ); ?>>Rio Grande do Sul</option>
                      <option value="RO"<?php echo selected( 'RO', $estado ); ?>>Rondônia</option>
                      <option value="RR"<?php echo selected( 'RR', $estado ); ?>>Roraima</option>
                      <option value="SC"<?php echo selected( 'SC', $estado ); ?>>Santa Catarina</option>
                      <option value="SP"<?php echo selected( 'SP', $estado ); ?>>São Paulo</option>
                      <option value="SE"<?php echo selected( 'SE', $estado ); ?>>Sergipe</option>
                      <option value="TO"<?php echo selected( 'TO', $estado ); ?>>Tocantins</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control cep" id="cep" name="cep"value="<?=$cep?>">
                  </div>
                </div>
                <?php if(empty($cliente)){ ?> 
                <input type="submit" value="Salvar" class="btn btn-primary" />
                <input type="button" class="btn btn-info" value="Limpar dados" onClick="limpa()">
                <?php }else{ ?>
                  <input type="submit" value="Editar" class="btn btn-info" />
                 <?php } ?>                 
              </form>                 
      </main>

 <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
 <script type="text/javascript" src="../js/bootstrap.min.js"></script>
 <script type="text/javascript" src="../js/jquery.mask.min.js"></script>

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



<script>
function limpa() {
  document.getElementById("myForm").reset();
}
</script>

 </body>
</html>



 
