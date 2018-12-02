<html>
<head>
    <title>Cadastro Categoria</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link href="../vendor/styles/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/animate.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="../vendor/styles/responsive.css">
<link href="css/estilo.css" rel="stylesheet">

</head>
<body >

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

<main role="main" class="container">

<?php include_once("../views/header.php");     ?>

<br><br>
<br><br>
<br><br>
<br><br>

<?php

include_once('../controllers/funcoesCategoria.php');
          
     $id = "";
     $cate = "";     

     if (!empty($_GET)) {
        $id = $_GET['id'];
        if($_GET['acao']=='carregar'){     

          $cat = buscarCat($id);
          $id = $cat['id'];
          $cate = $cat['categoria'];         
        }
        if($_GET['acao']=='excluir'){
            excluirCat($id);
        }
    }
     if (!empty($_POST)) {
      if(empty($_POST['id'])){
         $a=salvarCat($_POST);        
            if($a){
                echo '<script type="text/javascript">alert("Salvo com sucesso !");</script>';
            }else{
                echo '<script type="text/javascript">alert("Ocorreu erro!");</script>';
            }  
      }else{
         $n=editarCat($_POST);
            if($n){
                echo '<script type="text/javascript">alert("Salvo com sucesso !");</script>';
            }else{
                echo '<script type="text/javascript">alert("Ocorreu erro!");</script>';
            }
      }        
    }
    
    $categorias = listarCat();

?>


<img src="../imagens/gatolaranja.png" class="mx-auto d-block rounded" alt="Cinque Terre" width="600" height="400"> 
    <br><br/>
    <?php if(empty($cate)){ ?>   
      <h2 style="text-align: center; color: yellow; font-family: fantasy" >Cadastro de Categoria</h2>
    <?php }else{ ?>
      <h2 style="text-align: center; color: yellow; font-family: fantasy" >Edição de Categoria</h2>      
    <?php } ?> 

<form action="../views/cadastroCategoria.php" method="POST">
<input type="hidden" name="id" value="<?=$id?>"/>
<div class="form-group">
    <label for="categoria">Categoria</label>
    <input type="text" name="categoria" class="form-control" 
    id="categoria" placeholder="Category" value="<?=$cate?>"
    required >
</div>
<input type="submit" value="Salvar" class="btn btn-primary" />
</form>

<table class="table">
    <tr>
        <th>ID</th>        
        <th>CATEGORIA</th>        
        <th>&nbsp;</th>    
        <th>&nbsp;</th>    
    </tr>
    <?php
    if(!empty($categorias)){
    foreach ($categorias as $c) {
    
    ?>
    <tr>
        <td><?=$c['id']?></td>        
        <td><?=$c['categoria']?></td>        
        <td><a class="btn btn-primary" href="cadastroCategoria.php?acao=carregar&id=<?=$c['id']?>">Carregar</a></td>     
        <td><a class="btn btn-primary" href="cadastroCategoria.php?acao=excluir&id=<?=$c['id']?>" onclick="return confirm('Você está certo disso?');">Excluir</a></td>     
    </tr>
    <?php
    } }
    ?>

</table>


</main>    
</body>
</html>

