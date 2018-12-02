<header class="header">

			<!-- Top Bar -->
			<div class="top_bar">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_container d-flex flex-row align-items-center justify-content-start">
								<div class="logo_container">
									<div class="logo">
										<a href="#">
		     								<div class="alerta"><img src="../imagens/logo.png" width="200" height="100"></div>
										</a>
									</div>
								</div>
								<div class="top_bar_content ml-auto">
								<div class="register_login">
										<div class="register"><a href="../views/cadastroClientes.php">Cadastrar</a></div>
                    

                    <?php 
              
                session_start();

              if(!empty($_SESSION['user'])){ 
                  if($_SESSION['user']=="adm"){                
               ?>
									 <div class="login"><a href=""> Bem-Vindo Admin </h6></div>
                  <a class="btn btn-secondary" href="../controllers/login.php?acao=logout">Logout</a></td> 

              <?php }else { ?>

                  <div class="login"><a href="">Bem-Vindo <?php echo $_SESSION['nomeCli'] ?></h6></div>
                  <a class="btn btn-secondary" href="../controllers/login.php?acao=logout">Logout</a></td> 

            	<?php } }else{ ?>

				<div class="login"><a href="../views/login.php">Login</a></div>

				<?php } ?>

									</div>
								</div>
								<div class="burger">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</div>
							</div>
						</div>
					</div>
				</div>		
			</div>

			<!-- Main Menu -->
			<div class="main_menu">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="main_menu_container d-flex flex-row align-items-center justify-content-start">
								<div class="main_menu_content">
									<ul class="main_menu_list">
										<li class="active hassubs">
											<a href="../views/index.php">Home
												<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
													
												</svg>
											</a>
							   			</li>
										<li><a href="../views/listagemProdutos.php">Produtos
											<svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
												<g>
													
												</g>
											</svg>
										</a></li>
										<li class="hassubs">
											<a href="../views/listagemAgendamentos.php">Agendamentos
												<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
													<g>
														
													</g>
												</svg>
											</a>
										</li>


							<?php 
              
              if(!empty($_SESSION['user'])){ 
                  if($_SESSION['user']=="adm"){ ?>
				  
										<li class="hassubs">
											<a href="../views/cadastroProduto.php">Cadastro
												<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
													<g>
														
													</g>
												</svg>
											</a>
										</li>


										<li class="hassubs">
											<a href="../views/cadastroCategoria.php">Categorias
												<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
													<g>
														
													</g>
												</svg>
											</a>
										</li>

										<li class="hassubs">
											<a href="../views/listagemClientes.php">Clientes
												<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
													<g>
														
													</g>
												</svg>
											</a>
										</li>


										<li class="hassubs">
											<a href="../views/listareservas.php">Reservas
												<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
													<g>
														
													</g>
												</svg>
											</a>
										</li>

							<?php }else { ?>

										<li class="hassubs">
											<a href="../views/detalhesCliente.php?acao=detalhes">Editar Cliente
												<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
													<g>
														
													</g>
												</svg>
											</a>
										</li>


											<li class="hassubs">
											<a href="../views/reservas.php">Reservas
												<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
													<g>
														
													</g>
												</svg>
											</a>
										</li>

										<li class="hassubs">
											<a href="../views/listareservas.php">Reservas Feitas
												<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
													<g>
														
													</g>
												</svg>
											</a>
										</li>


							<?php } }?>

									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Menu -->

			<div class="menu">
				<div class="menu_register_login">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="menu_register_login_content d-flex flex-row align-items-center justify-content-end">
									<div class="register"><a href="#">register</a></div>
									<div class="login"><a href="#">login</a></div>
								</div>
							</div>
						</div>
					</div>
						
				</div>
				<ul class="menu_list">
					<li class="menu_item">
						<div class="container">
							<div class="row">
								<div class="col">
									<a href="#">home</a>
								</div>
							</div>
						</div>
					</li>
					<li class="menu_item">
						<div class="container">
							<div class="row">
								<div class="col">
									<a href="about.html">about us</a>
								</div>
							</div>
						</div>
					</li>
					<li class="menu_item">
						<div class="container">
							<div class="row">
								<div class="col">
									<a href="listings.html">services</a>
								</div>
							</div>
						</div>
					</li>
					<li class="menu_item">
						<div class="container">
							<div class="row">
								<div class="col">
									<a href="news.html">portfolio</a>
								</div>
							</div>
						</div>
					</li>
					<li class="menu_item">
						<div class="container">
							<div class="row">
								<div class="col">
									<a href="contact.html">blog</a>
								</div>
							</div>
						</div>
					</li>
					<li class="menu_item">
						<div class="container">
							<div class="row">
								<div class="col">
									<a href="contact.html">contact</a>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</header>
	</div>
	
	<hr class="featurette-divider">
 <div class="container marketing">
