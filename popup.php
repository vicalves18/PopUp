<html>
	<head>
		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		  <meta charset="UTF-8"/>
		</head>
		<body>  
		  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		  
		  <style>
			.container{
				background-color:rgb(65,105,225);
				display: flex;
				flex-direction: center;
				justify-content: center;
				color: white;
				border-radius:20px;
				widht:auto;
				padding-top:5px;
				margin-left: auto;
				margin-right: auto;
				max-width: 500px;
			}
			h1{
				text-align:center;
			}

		  </style>
		  
		 <!-- Button trigger modal -->
			<button type="button" class="btn btn-primary justify-content-center" data-toggle="modal" data-target="#exampleModalCenter">
			  Entrar
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Login e Senha Fetranspor</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					
					<div class="container">
							  <form method="post" class="formulario">
								  <?php
										require('conexao.php');
										
										date_default_timezone_set('America/Sao_Paulo'); 
										$dt =date('Y-m-d H:i:s', time());
										
										$query="SELECT * FROM consultadados";
										//WHERE id=1
										$result = mysqli_query($link,$query);
										$linha = mysqli_fetch_assoc($result);

										$id =  $linha['id'];
										//$idc = $linha['idc'];
										$empresa = $linha['empresa'];
										$cnpj = $linha['cnpj'];
										$login = $linha['login'];
										$senha = $linha['senha'];
										$dataatu = $linha['data_atualizacao'];	
									?>
								  <div class="form-row">
								  
									<div class="form-group col-md-6">
										<label for="Empresa">Empresa</label>
										<?php $empres = (!empty($empresa)) ? $empresa : ''; ?>
										<input type="text" class="form-control" readonly name="emp" id="empresa" value="<?php echo htmlentities($empres);?>"></input>
									</div>
									<div class="form-group col-md-6">
										<label for="CPNJ">CNPJ</label>
										<?php $rzs = (!empty($cnpj)) ? $cnpj : ''; ?>
										<input type="text" class="form-control" readonly name="razaosocial" id="cnpj" value="<?php echo htmlentities($rzs);?>">
									</div>
									<div class="form-group col-md-6">
									  <label for="Login">Login</label>
									  <?php $lg = (!empty($login)) ? $login : ''; ?>
									  <input type="text" class="form-control" name="log" id="login" value="<?php echo htmlentities($lg);?>">
									</div>
									<div class="form-group col-md-6">
									  <label for="inputPassword4">Senha</label>
									  <?php $snh = (!empty($senha)) ? $senha : ''; ?>
									  <input type="text" class="form-control" name="password" id="inputPassword4" value="<?php echo htmlentities($snh);?>">
									</div>
									<div class="form-group col-md-6">
						
									  <label for="atualiza">Data de útima atualização</label>
									  <input class="form-control" id="atualiza" readonly name="dataatualiz" value="<?php echo $dt;?>"></input>						
									</div>
								   </div>
										
									<div class="modal-footer">
										<button type="submit" class="btn btn-outline-success" name="atualiza" onclick="alert('Cadastro atualizado com sucesso!')">Atualizar</button>
															
														<?php
														if(isset($_POST['atualiza'])){
															$dtatual=$_POST['dataatualiz'];
															$empr=$_POST['emp'];
															$rzsocial=$_POST['razaosocial'];
															$logi=$_POST['log'];
															$pass=$_POST['password'];										
															echo '<br>'.$empr.'<br>';

															$sql = "UPDATE consultadados SET empresa='".$empr."',cnpj='".$rzsocial."',login = '".$logi."', senha = '".$pass."',data_atualizacao='".$dtatual."' WHERE id = ".$id;
															
															echo '<br>'.$sql.'<br>';
															
															mysqli_query($link, $sql);
														}
													
														?>		
										<button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
									 </div>
										
							</form>
					</div>
					
				  </div>
				  
				</div>
			  </div>
			</div>
		</body>
</html>


