<?php
	session_start();
	
	if(!isset($_SESSION['carrinho'])){
	 $_SESSION['carrinho'] = array();
	}
 
	if(isset($_GET['acao'])){
		if($_GET['acao'] == 'add'){
			$codigo = intval($_GET['codigo']);
			if(!isset($_SESSION['carrinho'][$codigo])){
				$_SESSION['carrinho'][$codigo] = 1;
			}else{
				$_SESSION['carrinho'][$codigo] += 1;
			}
		} 
	if($_GET['acao']== 'del'){
		$codigo = intval($_GET['codigo']);
		if(isset($_SESSION['carrinho'][$codigo])){
			unset($_SESSION['carrinho'][$codigo]);
		}
	 }
	 if($_GET['acao']== 'up'){
		if(is_array($_POST['prod'])){
			foreach($_POST['prod'] as $codigo => $qtd){
				$codigo = intval($codigo);
				$qtd = intval($qtd);
				if(!empty($qtd) || $qtd <>0){
					$_SESSION['carrinho'][$codigo] = $qtd;
					}else{
					unset($_SESSION['carrinho'][$codigo]);
					}
				}
			}
		}
	}	
	include "conexao.php";

	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="layout.css">

	</head>
	<body>
		<div class="header">
			<a href="index.php">
				<a href="index.php" id="home"><h1>Mojna</h1></a>
			</a>
			</div>
			<div class="row">
				<div class="col-2 col-m-3 menu">
					<ul>
						<?php
							include "menu_ad.php";
						?>
					</ul>
				</div>

				<div class="col-8 col-m-9">
					
				<table>
					<tr>
						<td>Nome</td >
						<td>Quantidade</td >
						<td>Preço</td >
						<td>SubTotal</td>
						<td></td>
					</tr>
					
					<form action="?acao=up" method="post">
						
						<?php
							if(count($_SESSION['carrinho'])== 0){
								echo '<tr><td> Não há produtos no carrinho </tr></tr>';
								}else{	
									foreach($_SESSION['carrinho'] as $codigo => $qtd){
										$sql = "SELECT * FROM produto WHERE cod_pro= '$codigo'";
										$qr = mysql_query($sql) or die (mysql_error());
										$ln = mysql_fetch_assoc($qr);
								
										$nome = $ln['nome_pro'];
										$preco = $ln['preco_pro'];
										$sub = $ln['preco_pro'] * $qtd;
										$total = $total + $sub;
									echo 
										'<tr>
											<td>'.$nome.'</td>
											<td><input type="text" size="3" name="prod['.$codigo.']" value="'.$qtd.'"/></td>
											<td>R$ '.$preco.';</td>
											<td>R$ '.$sub.';</td>
											<td><a href="?acao=del&codigo='.$codigo.'">Remover</a></td>
										</tr>';
									}
								}echo'<tr>
											<td>Total</td><td></td></td><td></td><td align="right">R$ '.$total.';</td><td"></td>
									</tr>';
									if(isset ($_POST["finalizar"])){
									$insert_vendas = mysql_query ("INSERT INTO `vendas` (`data_vendas`, `total`, `cpf`) VALUES ('2016-11-30', '$total', NULL);");
										foreach($_SESSION['carrinho'] as $codigo => $qtd){
											
											$pesquisa =  mysql_query ("SELECT * FROM `vendas` ORDER BY cod_vendas DESC LIMIT 1");
											$cod_fetch = mysql_fetch_assoc ($pesquisa);
											$cod_vendas = $cod_fetch['cod_vendas'];
											$insert_AC_vendas = mysql_query("INSERT INTO `vendas_has_produto` (`vendas_cod_vendas`, `produto_cod_pro`, `qtd_pro`) VALUES ('$cod_vendas', '$codigo', '$qtd');");
										}if ($insert_vendas == true and $insert_AC_vendas = true){
											echo "<script> alert ('Venda cadastrado com sucesso') </script>";
											echo "<script> location.href = ('dados_cliente.php') </script>";
											unset($_SESSION['carrinho']);
										}else {
											echo "<script> alert ('Falha no banco de dados, tente novamente mais tarde') </script>";
											echo "<script> location.href = ('carrinho.php') </script>";
										}
									}
							
				?>
						<tr>
							<td>
							<input type="submit" value="Atualizar Carrinho" />
							</td>
						</tr>
					</form>
						<tr>
							<td>
								<form action="?acao=" method="post">
									
									<input type="submit" name="finalizar" value="Finalizar Compra"/>
									
								</form>
							</td>
						</tr>
						<tr>
							<td>
								<a href="produtos.php">Continuar Comprando</a>
							</td>
						</tr>
					</table>
					</div>

						<div class="col-2 col-m-12">
							<div class="aside">
								<h2>Bem-Vindo</h2>
								<?php
				include "valida_login.php";
				
?>
								<form id="busca" action="busca.php" method="get">
									<br>
										<input type="text" name="busca">
											<br>
												<input type="submit" value="Buscar">
												</form>
											</div>
										</div>

									</div>

									<div class="footer">
										<p>Copyright(C) Mojna 2016</p>
									</div>
								</body>
							</html>
							