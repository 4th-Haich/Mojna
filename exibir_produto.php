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

		<p class="titulo">Produto </p>			
				<?php 
			$cod = $_GET ["codigo"];
                
                $pesquisa = mysql_query (" SELECT 
						cod_pro, 
						nome_pro, 
						preco_pro, 
						estoque_pro,
						tipo_pro_cod_tipo_pro, 
						nome_tipo_pro, 
						marca_cod_marca, 
						nome_marca, 
						tamanho_cod_tam ,
						nome_tam 
						FROM produto 
						INNER JOIN tipo_pro 
						ON tipo_pro_cod_tipo_pro = cod_tipo_pro 
						INNER JOIN marca 
						ON marca_cod_marca = cod_marca 
						INNER JOIN tamanho 
						ON tamanho_cod_tam = cod_tam 
										   WHERE cod_pro = '$cod'");
					
				$cod_pro = mysql_result ($pesquisa, 0, "cod_pro");
				$nome_pro = mysql_result ($pesquisa, 0, "nome_pro");
				$preco_pro = mysql_result ($pesquisa, 0, "preco_pro");
				$estoque = mysql_result ($pesquisa, 0, "estoque_pro");
				$marca_cod_marca = mysql_result ($pesquisa, 0, "nome_marca");
				$tamanho_cod_tam = mysql_result ($pesquisa, 0, "nome_tam");
				$tipo = mysql_result ($pesquisa, 0, "nome_tipo_pro");
		
		    ?>
			<table>
			  <tr>
                <td>
                  <?php echo "<p> Código: </p>"; ?>
                <td>				
				<td>
                  <?php echo "<p>  $cod_pro  </p>"; ?>
                <td>
			  </tr>
			  
			   <tr>
                <td>
                  <?php echo "<p> Nome: </p>";?>
                <td>	
                 <td>
                  <?php echo "<p> $nome_pro  </p>";?>
                <td>				
			  </tr>
			  
			   <tr>
                <td>
                  <?php echo "<p> Preço: </p>"; ?>
                <td>
				<td>
                  <?php echo "<p> $preco_pro </p>"; ?>
                <td>
			  </tr>
			  
			   <tr>
                <td>
                  <?php echo "<p> Estoque: </p>"; ?>
                <td>
				<td>
                  <?php echo "<p> $estoque </p>"; ?>
                <td>
			  </tr>
			  
			   <tr>
                <td>
                  <?php echo "<p> Marca: </p>"; ?>
                <td>	
				<td>
                  <?php echo "<p> $marca_cod_marca </p>"; ?>
                <td>
			  </tr>
			  
			  <tr>
                <td>
                  <?php echo "<p> Tamanho: </p>"; ?>
                <td>	
				<td>
                  <?php echo "<p> $tamanho_cod_tam </p>"; ?>
                <td>
			  </tr>
			  
			  <tr>
                <td>
                  <?php echo "<p> Tipo: </p>"; ?>
                <td>	
				<td>
                  <?php echo "<p> $tipo </p>"; ?>
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