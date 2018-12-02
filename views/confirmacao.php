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
    <?php
     
     include_once('../controllers/funcoesCategoria.php');
     include_once('../controllers/funcoesProduto.php');
     include_once('../controllers/funcoesReservas.php');

     if (!empty($_GET)) {
        $id = $_GET['id'];
        if($_GET['acao']=='confirma'){     

          $produto = detalhes($id);
          $id = $produto['id'];
          $nome = $produto['nome'];
          $raca = $produto['raca'];
          $idade= $produto['idade'];
          $material= $produto['material'];
          $cor= $produto['cor'];
          $marca= $produto['marca'];
          $tipo= $produto['tipo'];
          $c=buscarCat($produto['id_categoria']);         
          $categoria=$c['categoria'];
          $preco= $produto['preco'];
          $dimensoes= $produto['dimensoes'];
          $descricao= $produto['descricao'];         

        }     
    } 
    
    if (!empty($_POST)) {  
          
            session_start();
            if (empty($_SESSION['carrinho'])) {
              $_SESSION['carrinho'] = array();
           }           
            array_push($_SESSION['carrinho'],$_POST);
               
            header("location: ../views/listagemProdutos.php?acao=salvo");
          
    }
    

    ?>
    <?php include_once("../views/header.php");     ?>

<br><br>
<br><br>
<br><br>
<br><br> 


    <main role="main" class="container">     
    
    <form  action="../views/confirmacao.php" id="myForm" method="POST">
    <img src="../<?=$produto['imagem']?>" class="mx-auto d-block rounded" alt="Cinque Terre" width="400" height="400">   
    <h2 style="text-align: center; color: grey; font-family: fantasy" >Confirmação de Reserva do Produto</h2>         
    
          <input type="hidden" name="id" value="<?=$id?>"/>
          <input name="qtdSession" type="hidden" value="1">
          <input name="subtotal" type="hidden" value="<?=$produto['preco']?>">
          <input type="hidden" name="imagem" value="<?=$produto['imagem']?>"/>
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
                    <input type="text" class="form-control money" name="preco" placeholder="Price" value="<?=$preco?>" readonly/>
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

             <hr/>
            
            <a class="btn btn-info left" href="../views/index.php">Retornar</a>


            <input type ="submit" class="btn btn-success right" value = "Confirmar" style="float:right">                    
        </form>
      </main>
<br/>

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>

<script>
   $('.money').mask('#.##0,00', {reverse: true});
</script>

</body>
</html>