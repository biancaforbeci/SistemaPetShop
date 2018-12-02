<html>
  <head>

    <title> Agendamentos </title>
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
    require_once('../controllers/funcoesAgendamento.php');
    
    
    if(empty($_SESSION['user'])){
        $_SESSION['message']="Nenhum cliente logado";
    }else if($_SESSION['user']=="adm"){
        $clientes= listar();
    }else{
        $clientes= buscar($_SESSION['user']);
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

<h2 style="text-align: center; color: green; font-family: fantasy" >Agendamentos</h2>
<table class="table table-hover">
    <tr>
        <th>Data</th>  
        <th>Hora</th>    
        <th>Pet</th>  
        <th>Porte</th> 
        <th>Raça</th>  
        <th>Animal</th>              
        <th>Serviço</th>
        <th>Preço</th>
        <?php if(!empty($_SESSION['user'])){if($_SESSION['user']=="adm"){ ?>
        <th>Cliente<th> <?php } } ?>
        <th>Edição</th>    
        <th>Exclução</th> 

    </tr>
    <?php
        if(!empty($clientes)){            
             foreach($clientes as $cliente){

    ?>
    <tr>
        <td><?= $cliente['dtAgendamento'] ?></td> 
        <td><?= $cliente['hora'] ?></td>      
        <td><?= $cliente['pet'] ?></td>          
        <td><?= $cliente['porte'] ?></td> 
        <td><?= $cliente['raca'] ?></td>     
        <td><?= $cliente['animal'] ?></td>     
        <td><?= $cliente['servico'] ?></td> 
        <td><?= "R$".number_format($cliente['preco'], 2, ',', '.') ?></td>   
        <?php if(!empty($_SESSION['user'])){if($_SESSION['user']=="adm"){ ?>
        <td><?= $cliente['nome_cliente'] ?></td>
        <td> </td> <?php } } ?>  
        <td><a class="btn btn-info" href="../controllers/funcoesAgendamento.php?acao=editar&id=<?=$cliente['id']?>">Editar</a></td>     
        <td><a class="btn btn-danger" href="../controllers/funcoesAgendamento.php?acao=excluir&id=<?=$cliente['id']?>" onclick="return confirm('Você está certo disso?');">Excluir</a></td>           
    </tr>
    <?php
    } }
    ?>
</table>

<a class="btn btn-info left" href="../views/agendamento.php">Novo Agendamento</a>
</main>
</body>
</html>