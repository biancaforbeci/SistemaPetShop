<html>
  <head>

    <title> Reservas Lista </title>
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
    require_once("../views/header.php"); 
    require_once('../controllers/funcoesReservas.php');
    
    
    if(empty($_SESSION['user'])){
        $_SESSION['message']="Nenhum cliente logado";
    }else if($_SESSION['user']=="adm"){
        $clientes= buscarReservas();
    }else{
        $clientes= retornaReservas($_SESSION['user']);
    }       
?>

<?php
        if(isset($_SESSION['message'])) : ?>

    <div class="alert alert-warning">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>

    </div>
<?php endif ?>

<main role="main" class="container">

<br><br>
<br><br>
<br><br>
<br><br>

<h2 style="text-align: center; color: green; font-family: fantasy" >Reservas Feitas</h2>
<table class="table table-hover">
    <tr>
        <th>Número do Pedido</th>  
        <th>Produto</th>    
        <th>Quantidade</th>    
        <th>Data da Compra</th>      
        <th>Total do Pedido</th>       
        <?php if(!empty($_SESSION['user'])){if($_SESSION['user']=="adm"){ ?>
        <th>Cliente</th> 
        <th>Telefone</th>  <?php } } ?>

    </tr>
    <?php
        if(!empty($clientes)){            
             foreach($clientes as $cliente){

    ?>
    <tr>        
        <td><?= $cliente['id'] ?></td>      
        <td><?= $cliente['nome'] ?></td>   
        <td><?= $cliente['qtd'] ?></td>       
        <td><?= $cliente['data_compra'] ?></td> 
        <td><?= "R$".number_format($cliente['total_pedido'], 2, ',', '.')?></td>              
        <?php if(!empty($_SESSION['user'])){if($_SESSION['user']=="adm"){ ?>
        <td><?= $cliente['nome_cliente'] ?></td>
        <td><?= $cliente['telefone'] ?></td>
        <td> </td> <?php } } ?>  
    </tr>
    <?php
    } }
    ?>
</table>
</main>
</body>
</html>