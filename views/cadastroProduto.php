<html>
  <head>

    <title> Cadastro Produto </title>
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
           
     include_once('../controllers/funcoesProduto.php');

     include_once('../controllers/funcoesCategoria.php');
     
     if(!empty($_SESSION['produto'])){
       $produto=$_SESSION['produto']; 
     }
     
     $id = "";
     $nome = "";
     $raca = "";
     $idade= "";
     $material= "";
     $cor= "";
     $marca= "";
     $tipo= "";
     $categoria= "";
     $preco= "";
     $dimensoes= "";
     $descricao= "";
     $url = "";

      if(!empty($produto)){
           $id = $produto['id'];
          $nome = $produto['nome'];
          $raca = $produto['raca'];
          $idade= $produto['idade'];
          $material= $produto['material'];
          $cor= $produto['cor'];
          $marca= $produto['marca'];
          $tipo= $produto['tipo'];
          $categoria= $produto['id_categoria'];
          $preco= $produto['preco'];
          $dimensoes= $produto['dimensoes'];
          $descricao= $produto['descricao'];
          $url = $produto['imagem'];        
          unset($_SESSION['produto']);
      }      
                   
        if (!empty($_POST)) {
          if(empty($_POST['id'])){  
            if(validar()){     
             $a=salvar($_POST,$_FILES);  
             if($a){
              echo '<script type="text/javascript">alert("Salvo com sucesso !");</script>';
             }else{
              echo '<script type="text/javascript">alert("Ocorreu erro!");</script>';
             }  
            }    
          }else{
            $_POST['imagem']=$url;
            if(validar()){
             $c=editar($_POST,$_FILES);  
             if($c){
              echo '<script type="text/javascript">alert("Editado com sucesso !");</script>';
             }else{
              echo '<script type="text/javascript">alert("Ocorreu erro!");</script>';
             }
            }       
          }    
        }

        if(!empty($_SESSION['message'])){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {          
          $nome = filter_input(INPUT_POST, 'nome');
          $raca = filter_input(INPUT_POST, 'raca');
          $idade = filter_input(INPUT_POST, 'idade');
          $material = filter_input(INPUT_POST, 'material');
          $cor = filter_input(INPUT_POST, 'cor');
          $marca = filter_input(INPUT_POST, 'marca');
          $tipo = filter_input(INPUT_POST, 'tipo');
          $categoria = filter_input(INPUT_POST, 'categoria');
          $preco = filter_input(INPUT_POST, 'preco');
          $dimensoes = filter_input(INPUT_POST, 'dimensoes');
          $descricao = filter_input(INPUT_POST, 'descricao');
          $url = filter_input(INPUT_POST, 'url');   
        }       
       }

        function validar(){
          
                   
          if( empty($_POST['nome']) || empty($_POST['marca']) || empty($_POST['preco'])){
            $_SESSION['message']="Verifique se os campos nome, marca, preço foram preenchidos";
            return false;
          }else{
            return true;
          }
          
        }

        $categorias=listarCat();

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
    <br><br/>  
    <main role="main" class="container">

    <img src="../imagens/cadastroProdutos.jpg" class="mx-auto d-block rounded" alt="Cinque Terre" width="400" height="400"> 
    <br><br/>
    <?php if(empty($produto)){     
         
      ?>   
      <h2 style="text-align: center; color: yellow; font-family: fantasy" >Cadastro de Produto</h2>
    <?php }else{ ?>
      <h2 style="text-align: center; color: yellow; font-family: fantasy" >Edição de Produto</h2>      
    <?php } ?> 
      <form  action="cadastroProduto.php" id="myForm" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?=$id?>"/>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputName">Nome do Produto</label>
                <input type="text" class="form-control" name="nome" id="inputName" placeholder="Name" value="<?=$nome?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputBreed">Raça</label>
                <input type="text" class="form-control" id="inputBreed" name="raca" placeholder="Breed" value="<?=$raca?>">
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label" id="inputAge">Idade</label>
                    <input type="number" class="form-control" name="idade" placeholder="Age" value="<?=$idade?>"/>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputMaterial">Material</label>
                  <input type="text" class="form-control" id="inputMaterial" name="material" placeholder="Material" value="<?=$material?>"> 
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label" id="inputColor">Cor</label>
                    <input type="text" class="form-control" name="cor" placeholder="Color" value="<?=$cor?>"/>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputMarca">Marca</label>
                  <input type="text" class="form-control" id="inputMarca" name="marca" placeholder="Brand" value="<?=$marca?>">
                </div>
              </div>

<?php
function selected( $value, $selected ){
    return $value==$selected ? ' selected="selected"' : '';
}
?>

              <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="sel1">Tipo de Animal:</label>
                     <select class="form-control" id="selectType" name="tipo">
                     <option value="Gatos"<?php echo selected( 'Cachorros', $tipo ); ?>>Gatos </option>
                     <option value="Gatos Recém Nascidos"<?php echo selected( 'Gatos', $tipo); ?>>Gatos Recém Nascidos</option>  
                     <option value="Gatos Filhotes"<?php echo selected( 'Pássaros', $tipo ); ?>>Gatos Filhotes</option>               
                     <option value="Gatos Adolescente"<?php echo selected( 'Roedores', $tipo ); ?>>Gatos Adolescente</option>         
                  </select>
                  </div>


                  <div class="form-group col-md-6">
                     <label for="sel1">Categoria:</label>
                     <select class="form-control" id="selectType" name="categoria">
                     <?php  foreach ($categorias as $c) {  
                      ?>
                        <option value="<?=$c['id']?>"<?php echo selected( $c['id'], $categoria); ?>><?=$c['categoria']?></option> 
                     <?php 
                      } ?>   
                  </select>
                  </div> 
               </div>       
               <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label" id="inputPrice">Preço</label>
                    <input type="text" class="form-control money" name="preco" placeholder="Price" value="<?=$preco?>" />
                </div>
                <div class="form-group col-md-6">
                  <label for="inputDimensao">Dimensões Aproximadas</label>
                  <input type="text" class="form-control" id="inputDimensao" name="dimensoes" placeholder="Dimensions" value="<?=$dimensoes?>"> 
                </div>
              </div> 
              <div class="form-group">
                 <label for="FormControlTextarea">Descrição</label>
                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao"><?php echo $descricao ?></textarea>
             </div>    
              <div class="form-group">
                 <label for="imagem">Imagem do Produto</label>
                 <input type="file" name="imagem" class="form-control" id="imagem" value="<?=$url?>"><span><?php echo "Arquivo anterior :". $url ?></span>
              </div>   

              <?php if(empty($produto)){     
              ?>          
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
   $('.money').mask('#.##0,00', {reverse: true});
</script>

<script>
function limpa() {
  document.getElementById("myForm").reset();
}
</script>


</body>
</html>