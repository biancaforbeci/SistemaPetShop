<html lang="en">
<head>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <!-- Base + Vendors CSS -->
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
<main>

 <?php include_once("../views/header.php");     ?>

<br><br>
<br><br>
<br><br>
<br><br> 

<?php
	    include_once("../controllers/funcoesReservas.php"); 
		$total;
		if (!empty($_SESSION['carrinho'])) {        
			$itens=$_SESSION['carrinho'];
			
		}	

		if(!empty($_GET)){
		
			if($_GET['acao']=='excluir'){
			$id = $_GET['id'];
			foreach($_SESSION['carrinho'] as $indice => $itemRemover){
			    if($id == $itemRemover['id']){				  
				 unset($_SESSION['carrinho'][$indice]);				 
			    }
			}
			echo '<script type="text/javascript">alert("Retirado com sucesso !");</script>';
			echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=../views/reservas.php'>";
			}

			if($_GET['acao']=='aumentar'){		
				 $id=$_GET['id'];
				 
				 $arraySession = $_SESSION['carrinho'];

				 for($i=0; $i < count($arraySession); $i++){
					 $arrayTemp=$arraySession[$i];
					 if($arrayTemp['id'] == $id){						
						 $arrayTemp['qtdSession']=$arrayTemp['qtdSession']+1;
						 $arrayTemp['subtotal']= $arrayTemp['qtdSession']*$arrayTemp['preco'];
					 }
					 $arraySession[$i]=$arrayTemp;
				 }
			
				$_SESSION['carrinho']=$arraySession;				
				echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=../views/reservas.php'>"; 
			}


			if($_GET['acao']=='diminuir'){		
				$id=$_GET['id'];
				
				$arraySession = $_SESSION['carrinho'];

				for($i=0; $i < count($arraySession); $i++){
					$arrayTemp=$arraySession[$i];
					if($arrayTemp['id'] == $id){					   
						$arrayTemp['qtdSession']=$arrayTemp['qtdSession']-1;
						$arrayTemp['subtotal']= $arrayTemp['qtdSession']*$arrayTemp['preco'];
					}
					$arraySession[$i]=$arrayTemp;
				}
		   
			   $_SESSION['carrinho']=$arraySession;				
			   echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=../views/reservas.php'>"; 
		   }
			
		}
		
		if (!empty($_POST)) {	
			$a=salvarItensReservados($_SESSION['user'],$_SESSION['carrinho'],$_POST);	
			if($a){
				echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=../views/obrigada.php'>"; 
			}	

		}
		
?>

<h2 style="text-align: center; color: blue; font-family: fantasy" >Confirmar retirada das reservas</h2>


<form  action="../views/reservas.php" id="myForm" method="POST">	
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Produto</th>
							<th style="width:10%">Preço</th>
							<th style="width:8%">Quantidade</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%">Ações</th>
						</tr>
					</thead>
					<?php
        if(empty($itens)){
		echo "Nenhum produto reservado !";
        }else{
		
		$total = array_sum(array_column($itens, 'subtotal'));
             foreach($itens as $item){
		     
				 
    ?>
     <input name="id_produto" type="hidden"  class="form-control text-center" value="<?=$item['id']?>">
    <input name="subtotal" type="hidden" class="form-control text-center" value="<?=$item['subtotal']?>">
    <input name="total" type="hidden" class="form-control text-center" value="<?=$total?>">

					<tbody>
						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-4"> <img class="card-img-top rounded-circle" src="../<?= $item['imagem'] ?>" alt="Generic placeholder image" width="70" height="150"></div>
									<div class="col-sm-7">
										<h4 class="nomargin"><?= $item['nome']?></h4>
									</div>
								</div>
							</td>
							<td id="x" name="preco" value="<?= $item['preco']?>" data-th="Price"> <?php echo 'R$'.$item['preco']?>        </td>
							<td data-th="Quantity">
							<div class="container">
							    
							<a href="../views/reservas.php?acao=aumentar&id=<?= $item['id'] ?>" class="btn btn-light btn-custom" name="mais" id="mais" value="+" > + </a>

								<input name="qtd"  readonly type="number" id="format" class="form-control text-center" min="1" value="<?=$item['qtdSession']?>">
							<a href="../views/reservas.php?acao=diminuir&id=<?= $item['id'] ?>" class="btn btn-light btn-custom" name="menos" id="menos" value="-" >- </a>
							 
	
					                 							 
							</div>
							
							</td>
							<td class="text-center"><input type="text" readonly class="form-control text-center" id="totalItem" value="<?php echo 'R$'.number_format($item['subtotal'], 2, ',', '.')?>" /> </td>
						    <td class="actions" data-th="">
							<div class="btn-group">
								<a  href="../views/reservas.php?acao=excluir&id=<?=$item['id']?>" onclick="return confirm('Você está certo disso?');"> <img src="../imagens/lixeira.png" width="70" height="70"/>     </a>							
							</div>
							</td>
						</tr>
					</tbody>
					<?php
 						 } }
   					 ?>	
					<?php	if(!empty($itens)){ ?>
 					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong></strong></td>
						</tr>
						<tr>
							<td><a href="../views/listagemProdutos.php" class="btn btn-warning"><i class="fa fa-angle-left"></i>Escolher mais produtos</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong><input type="text" readonly class="form-control text-center" id="total" value="<?="R$".number_format($total, 2, ',', '.') ?>" /></strong></td>
							<td><input type="submit" value="Confirmar" class="btn btn-success"></td>
						</tr>
					</tfoot>
					<?php  }  ?>	
				</table>	
							
</div>
</form>
</main>
</body>
</html>