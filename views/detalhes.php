<html>
  <head>

    <title> Detalhes </title>
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
     
     include_once('../controllers/funcoesCategoria.php');
     include_once('../controllers/funcoesProduto.php');   
     
    ?>
    <br><br/>  
    <main role="main" class="container">  
    
       
      <img src="../<?=$produto['imagem']?>" class="mx-auto d-block rounded" alt="Cinque Terre" width="400" height="400"> 
    
    <br><br/>      
    <h2 style="text-align: center; color: yellow; font-family: fantasy" >Detalhes do Produto</h2>         
      
          <input type="hidden" name="id" value="<?=$id?>"/>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputName">Nome do Produto</label>
                <input type="text" class="form-control" name="nome" id="inputName" placeholder="Name" value="<?=$nome?>" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="inputBreed">Raça</label>
                <input type="text" class="form-control" id="inputBreed" name="raca" placeholder="Breed" value="<?=$raca?>" readonly>
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label" id="inputAge">Idade</label>
                    <input type="number" class="form-control" name="idade" placeholder="Age" value="<?=$idade?>" readonly/>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputMaterial">Material</label>
                  <input type="text" class="form-control" id="inputMaterial" name="material" placeholder="Material" value="<?=$material?>" readonly> 
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label" id="inputColor">Cor</label>
                    <input type="text" class="form-control" name="cor" placeholder="Color" value="<?=$cor?>" readonly/>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputMarca">Marca</label>
                  <input type="text" class="form-control" id="inputMarca" name="marca" placeholder="Brand" value="<?=$marca?>" readonly>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label" id="inputColor">Animal</label>
                    <input type="text" class="form-control" name="cor" placeholder="Color" value="<?=$tipo?>" readonly/>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputMarca">Categoria</label>
                  <input type="text" class="form-control" id="inputMarca" name="marca" placeholder="Brand" value="<?=$categoria?>" readonly>
                </div>
              </div>
               <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label" id="inputPrice">Preço</label>
                    <input type="text" class="form-control money" name="preco" placeholder="Price" value="<?="R$".number_format($preco, 2, ',', '.')?>" readonly/>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputDimensao">Dimensões Aproximadas</label>
                  <input type="text" class="form-control" id="inputDimensao" name="dimensoes" placeholder="Dimensions" value="<?=$dimensoes?>" readonly> 
                </div>
              </div> 
              <div class="form-group">
                 <label for="FormControlTextarea">Descrição</label>
                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly name="descricao"><?php echo $descricao ?></textarea>
             </div>    
      </main>

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>

<script>
   $('.money').mask('#.##0,00', {reverse: true});
</script>


</body>
</html>