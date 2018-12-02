<html>
  <head>

    <title> Listagem Clientes </title>
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
    
   
    require_once('../controllers/funcoes.php');

    $clientes= listarClientes();
     
?>

<?php include_once("../views/header.php");     ?>

<br><br>
<br><br>
<br><br>
<br><br>

<main role="main" class="container">

<h2 style="text-align: center; color: green; font-family: fantasy" >Clientes Cadastrados</h2>
<table class="table table-hover">
    <tr>            
        <th>Nome</th>  
        <th>Sobrenome</th> 
        <th>CPF</th> 
        <th>Telefone</th>   
        <th>Endereço</th>
        <th>Cidade</th> 
        <th>Estado</th>         
        <th>Edição</th>    
        <th>Exclução</th>    
    </tr>
    <?php
        if(empty($clientes)){
            echo "Vazio";
        }else{
             foreach($clientes as $cliente){

    ?>
    <tr>         
        <td><?= $cliente['nome_cliente'] ?></td>         
        <td><?= $cliente['sobrenome'] ?></td>     
        <td><?= $cliente['cpf'] ?></td>    
        <td><?= $cliente['telefone'] ?></td>     
        <td><?= $cliente['endereco'] ?></td>     
        <td><?= $cliente['cidade'] ?></td>     
        <td><?= $cliente['estado'] ?></td>         
        <td><a class="btn btn-info" href="../controllers/funcoes.php?acao=editar&id=<?=$cliente['id']?>">Editar</a></td>     
        <td><a class="btn btn-danger" href="../controllers/funcoes.php?acao=excluir&id=<?=$cliente['id']?>" onclick="return confirm('Você está certo disso?');">Excluir</a></td>      
    </tr>
    <?php
    } }
    ?>
</table>

</main>
</body>
</html>