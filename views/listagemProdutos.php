<html>
  <head>

    <title> Listagem Produtos </title>
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
     
    include_once("../controllers/funcoescategoria.php");
    include_once('../controllers/funcoesProduto.php');

    $produtos= listar();   

    if (!empty($_GET)) {        
    
        if($_GET['acao']=='salvo'){  
            
                echo '<script type="text/javascript">alert("Reservado com sucesso !");</script>';
               
        }
    }

    if (!empty($_POST)) {
       buscaProdutoDigitado($_POST);
    }

?>
<?php include_once("../views/header.php");     ?>

<br><br>
<br><br>
<br><br>
<br><br>

<main role="main" class="container">

<h2 style="text-align: center; color: green; font-family: fantasy" >Produtos Cadastrados</h2>

<form  action="../views/listagemProdutos.php" id="myForm" method="POST">
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
<table class="table table-hover">
    <tr> 
        <th>Foto</th>         
        <th>Produto</th>  
        <th>Raça</th>         
        <th>Cor</th>
        <th>Marca</th> 
        <th>Animal</th>       
        <th>Preço</th>      
        <th>Detalhes</th>
        <?php if(!empty($_SESSION['user'])){
        if($_SESSION['user']=="adm"){  ?>
        <th>Edição</th>
        <th>Exclução</th>  
        <?php }else{ ?>
        <th>Reservar Produto</th>
        <?php } }?>  
    </tr>
    <?php
        if(!empty($produtos)){
           foreach($produtos as $produto){
        
    ?>
    <tr> 
       
        <td> <img src ="../<?= $produto['imagem'] ?>" width="80"> </td>        
        <td><?= $produto['nome'] ?></td>         
        <td><?= $produto['raca'] ?></td>                
        <td><?= $produto['cor'] ?></td>     
        <td><?= $produto['marca'] ?></td>     
        <td><?= $produto['tipo'] ?></td>         
        <td><b><?= "R$".number_format($produto['preco'], 2, ',', '.') ?></b></td>        
        <td><a class="btn btn-info" href="../views/detalhes.php?acao=detalhes&id=<?=$produto['id']?>">Detalhes</a></td>
        <?php if(!empty($_SESSION['user'])){
        if($_SESSION['user']!="adm"){  ?>
        <td><a class="btn btn-info" href="../views/confirmacao.php?acao=confirma&id=<?=$produto['id']?>">Reservar</a></td>
        <?php } }?>
        <?php if(!empty($_SESSION['user'])){
        if($_SESSION['user']=="adm"){  ?>
        <td><a class="btn btn-info" href="../controllers/funcoesProduto.php?acao=editar&id=<?=$produto['id']?>">Editar</a></td>     
        <td><a class="btn btn-danger" href="../controllers/funcoesProduto.php?acao=excluir&id=<?=$produto['id']?>" onclick="return confirm('Você está certo disso?');">Excluir</a></td>      
      <?php } } ?>
    
    </tr>
    <?php
    } }
    ?>
</table>
</main>
</body>
</html>