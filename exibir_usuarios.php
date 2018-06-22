<?php
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

						<?php 
			$cod = $_GET["codigo"];
			
			$pesquisa = mysql_query ("SELECT cod_usu,
			                                 cpf_usu,
			                                 nome_usu, 
											 login_usu, 
											 senha_usu											 
			                         FROM usuarios
									 WHERE cod_usu = '$cod'");
									 
			$cod_usu = mysql_result ($pesquisa, 0, "cod_usu");						 
		    $cpf_usu = mysql_result ($pesquisa, 0, "cpf_usu");
			$nome_usu = mysql_result ($pesquisa, 0, "nome_usu");
			$login_usu = mysql_result ($pesquisa, 0, "login_usu");
			$senha_usu = mysql_result ($pesquisa, 0, "senha_usu");
		
		    ?>
						<p class="titulo"> Usuário: <?php echo "$nome_usu" ?>
						</p>
						
			<table>
			  <tr>
                <td>
                  <?php echo "<p> Código: </p>"; ?>
                <td>				
				<td>
                  <?php echo "<p> $nome_usu  </p>"; ?>
                <td>
			  </tr>
			  
			   <tr>
                <td>
                  <?php echo "<p> CPF: </p>"; ?>
                <td>	
                  <td>
                  <?php echo "<p> $cpf_usu  </p>"; ?>
                <td>				
			  </tr>
			  
			   <tr>
                <td>
                  <?php echo "<p> Nome: </p>";?>
                <td>	
                 <td>
                  <?php echo "<p> $nome_usu  </p>";?>
                <td>				
			  </tr>
			  
			   <tr>
                <td>
                  <?php echo "<p> Login: </p>"; ?>
                <td>	
                <td>
                  <?php echo "<p> $login_usu </p>"; ?>
                <td>				
			  </tr>
			  
			   <tr>
                <td>
                  <?php echo "<p> Senha: </p>"; ?>
                <td>	
				<td>
                  <?php echo "<p> $senha_usu </p>"; ?>
                <td>
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