<html>
  <head>
    <title> Agendamento </title>
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
    
    include_once('../controllers/funcoesAgendamento.php');
    include_once('../controllers/funcoesReservas.php');

    if(!empty($_SESSION['agenda'])){
      $agendamento=$_SESSION['agenda'];
    }
    
    $id = "";
    $pet = "";
    $age = "";
    $porte = "";
    $raca = "";
    $animal = "";
    $dtAgendamento = "";
    $servico = "";
    $hora = "";

     if(!empty($agendamento)){
          $id = $agendamento['id'];
         $pet = $agendamento['pet'];
         $age = $agendamento['age'];
         $porte = $agendamento['porte'];
         $raca = $agendamento['raca'];
         $animal = $agendamento['animal'];
         $dtAgendamento = $agendamento['dtAgendamento'];
         $servico = $agendamento['servico'];
         $hora = $agendamento['hora'];
         unset($_SESSION['agenda']); 
     }


     
        if(!empty($_POST)){
            if(empty($_POST['id'])){    
                if(validar()){
                   $a=salvar($_POST,$_SESSION['user']);

               if($a){
                echo '<script type="text/javascript">alert("Salvo com sucesso !");</script>';
               }else{
                echo '<script type="text/javascript">alert("Ocorreu erro!");</script>';
               }  

               }
        }else{
            if(validar()){

              $n=editar($_POST);

            if($n){
              echo '<script type="text/javascript">alert("Salvo com sucesso !");</script>';
             }else{
              echo '<script type="text/javascript">alert("Ocorreu erro!");</script>';
             }  
            }            
        }   
      }              
   
      if(!empty($_SESSION['message'])){
     if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
      $id = filter_input(INPUT_POST, 'id');
      $pet = filter_input(INPUT_POST, 'pet');
      $age = filter_input(INPUT_POST, 'age');
      $porte = filter_input(INPUT_POST, 'porte');
      $raca = filter_input(INPUT_POST, 'raca');
      $animal = filter_input(INPUT_POST, 'animal');
      $dtAgendamento = filter_input(INPUT_POST, 'dtAgendamento');
      $servico = filter_input(INPUT_POST, 'servico');
      $hora = filter_input(INPUT_POST, 'hora');
   }
  }
    
    function validar(){
      date_default_timezone_set('America/Sao_Paulo');
      $now = date("Y-m-d");
      $escolhida = $_POST['dtAgendamento'];      

      if( empty($_POST['pet']) || empty($_POST['age']) || empty($_POST['porte']) || empty($_POST['raca']) || empty($_POST['animal'])  || empty($_POST['dtAgendamento']) || empty($_POST['hora']) ){
        $_SESSION['message']="Verifique se todos os campos foram preenchidos";
        return false;
      }else if ( strtotime($escolhida) < strtotime($now)  || (date("w", strtotime($escolhida)) == 0)  ) {
        $_SESSION['message']="Não trabalhamos aos domingos e verifique a data de agendamento!";
        return false;
      }else if((strtotime($_POST['hora']) < strtotime('08:00')) || (strtotime($_POST['hora']) > strtotime('18:00')) ){
      $_SESSION['message']="O horário de funcionamento é da 8h as 18h, verifique o campo da hora !";
      return false;
      }else{
        return true;
      }
    }

        $lista=retornaValores();
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



<h2 style="text-align: center; color: green; font-family: fantasy" >Preços Banho</h2>
<table class="table table-hover">
    <tr>      
        <th>Serviço</th>       
        <th>Porte</th>  
        <th>Pelagem</th> 
        <th>Preço</th>        
    </tr>
    <?php
        if(empty($lista)){
            echo "Vazio";
        }else{
             foreach($lista as $x){

    ?>
    <tr>         
        <td><?= $x['servico'] ?></td>         
        <td><?= utf8_encode($x['porte']) ?></td>     
        <td><?= $x['pelagem'] ?></td>
        <td><b><?= "R$".number_format($x['preco'], 2, ',', '.')?></b></td>       
    </tr>  
    <?php
    } }
    ?> 
</table>




    
    <br><br/>  
    <main role="main" class="container">
    
    <?php if(empty($agendamento)){ ?> 
      <h2 style="text-align: center; color: blue; font-family: fantasy" >Agendamento de Banho e Tosa</h2>
    <?php }else{ ?>
      <h2 style="text-align: center; color: blue; font-family: fantasy" >Edição de Agendamento</h2>
    <?php } ?> 
      <form  action="../views/agendamento.php" id="myForm" method="POST">
          <input type="hidden" name="id" value="<?=$id?>"/>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputPetName">Nome do Pet</label>
                <input type="text" class="form-control" name="pet" value="<?=$pet?>" id="inputPetName" placeholder="PET name">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPetAge">Idade</label>
                <input type="number" class="form-control" id="inputPetAge" value="<?=$age?>" name="age" placeholder="PET Age">
              </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                     <label for="sel1">Porte:</label>
                     <select class="form-control" id="selectType" name="porte">
                     <option value="Pequeno"<?php echo selected( 'Pequeno', $porte ); ?>>Pequeno</option>
                     <option value="Médio"<?php echo selected( 'Médio', $porte ); ?>>Médio</option>  
                     <option value="Grande"<?php echo selected( 'Grande', $porte); ?>>Grande</option>            
                  </select>
                  </div>
                <div class="form-group col-md-6">
                  <label for="inputPetBreed">Raça</label>
                  <input type="text" class="form-control phone_with_ddd" value="<?=$raca?>" id="inputPetBreed" name="raca" placeholder="PET Breed">
                </div>
              </div>

<?php
function selected( $value, $selected ){
    return $value==$selected ? ' selected="selected"' : '';
}
?>

              <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail">Data do Agendamento</label>
                    <input type="date" class="form-control" id="inputEmail" value="<?=$dtAgendamento?>" name="dtAgendamento">
                  </div>   
                  <div class="form-group col-md-6">
                    <label for="inputHora">Hora</label>
                    <input type="text" class="form-control time" placeholder="Hour" id="inputHora" value="<?=$hora?>" name="hora">
                  </div>  
               </div>       
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="sel1">Selecione o animal de estimação:</label>
                     <select class="form-control" id="selectType" name="animal">
                     <option value="Curta"<?php echo selected( 'Curta', $animal ); ?>>Curta</option>
                     <option value="Longa"<?php echo selected( 'Longa', $animal ); ?>>Longa</option> 
                     <option value="Extra longa"<?php echo selected( 'Extra longa', $animal ); ?>>Extra Longa</option>                 
                  </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="sel1">Tipo de Servico:</label>
                     <select class="form-control" id="selectType" name="servico">
                     <option value="Banho"<?php echo selected( 'Banho', $servico ); ?>>Banho</option>
                     <option value="Tosa"<?php echo selected( 'Tosa', $servico ); ?>>Tosa</option>  
                     <option value="Banho e Tosa"<?php echo selected( 'Banho e Tosa', $servico); ?>>Banho e Tosa</option>            
                  </select>
                  </div>
               </div>  

              <hr>

              <?php                
              
              if(!empty($_SESSION['carrinho'])){        ?>

              <h3 style="text-align: center; color: red; font-family: arial" > Percebemos que você possui reserva, deseja confirmar a retirada ? </h3>

              <

                <div class="form-group col-md-6">
                     <label for="sel1">Reservas:</label>
                     <select class="form-control" id="selectType" name="categoria">
                     <?php  foreach ($_SESSION['carrinho'] as $c) {  
                      ?>
                        <option><?=$c['nome']?></option> 
                     <?php 
                      } ?>   
                  </select>
                  </div> 

            <div class="form-group col-md-6">
              <td><a href="../views/reservas.php" class="btn btn-success"><i class="fa fa-angle-right"></i>Confirmar</a></td>
              </div> 

<br>
              <hr>
              <?php } ?>

                <input type="submit" value="Agendar" class="btn btn-primary" />
                <?php if(empty($agendamento)){ ?> 
                <input type="button" class="btn btn-info" value="Limpar dados" onClick="limpa()">
                <?php } ?> 

                


              </form>                 
      </main>


    
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.mask.min.js"></script>

<script>
   $('.time').mask('00:00:00');
</script>

<script>
function limpa() {
  document.getElementById("myForm").reset();
}
</script>

</body>
</html>