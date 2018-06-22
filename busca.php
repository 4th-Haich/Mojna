<?php
	session_start();
	include "conexao.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="layout.css">
		
		<script language="javascript" type="text/javascript">
		  function validar() {
		  var nome = form_altera_pro.nome.value;
		  var preco = form_altera_pro.preco.value;
		  var estoque = form_altera_pro.estoque.value;
		  var marca = form_altera_pro.marca_cod_marca.value;
		  var tipo = form_altera_pro.tipo.value;
		  var tamanho = form_altera_pro.tamanho_cod_tam.value;

			if (nome=="") {
				alert ("Preencha o campo nome");
				form_altera_pro.nome.focus();

				return false;
			}
			
			if (preco=="") {
			  alert ("Preencha o campo preço");
			  form_altera_pro.preco.focus();

			  return false;
			}

			if (estoque=="") {
				alert ("Preencha o campo estoque");
				form_altera_pro.estoque.focus();

				return false;
			}
			
			if (marca=="") {
				alert ("Preencha o campo marca");
				form_altera_pro.marca_cod_marca.focus();

				return false;
			}
			
			if (tipo=="") {
			  alert ("Preencha o campo tipo");
			  form_altera_pro.tipo.focus();

			  return false;
			}

			if (tamanho=="") {
				alert ("Preencha o campo tamanho");
				form_altera_pro.tamanho_cod_tam.focus();

				return false;
			}
		  }
		</script>  
	</head>
	<body>
		<div class="header">
			<a href="index.php" id="home"><h1>Mojna</h1></a>
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

                <h4>Resultados da Busca</h4>
			<?php 
				$busca = $_GET["busca"];
				$busca_query = str_replace("", "%", $busca);
				
				$pesquisa = mysql_query ("SELECT 
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
					WHERE 
					(
					(nome_pro LIKE '%".$busca_query."%')
					OR
					(preco_pro LIKE '%".$busca_query."%')
					OR
					(estoque_pro LIKE '%".$busca_query."%')
					OR
					(nome_tipo_pro LIKE '%".$busca_query."%')
					OR
					(estoque_pro LIKE '%".$busca_query."%')
					OR
					(nome_marca LIKE '%".$busca_query."%')
					OR
					(nome_tam LIKE '%".$busca_query."%')					
					)
					
					ORDER BY cod_pro DESC");
					
					$linhas = mysql_num_rows($pesquisa);
					echo "A pesquisa retornou $linhas resultados.";
					while ($resultado = mysql_fetch_array($pesquisa)){
						?><table>
							<tr>
								<td>Código</td>
								<td>Nome</td>
								<td>Tipo</td>
								<td>Marca</td>
								<td>Tamanho</td>
								<td>Preço</td>
								<td>Qtd. em Estoque</td>
							</tr>
							<?php
							echo '<tr>
							<td id="prod">'.$resultado["cod_pro"].'</td>
                            <td id="prod">'.$resultado["nome_pro"].'</td>
                            <td id="prod">'.$resultado["nome_tipo_pro"].'</td>
                            <td id="prod">'.$resultado["nome_marca"].'</td>
                            <td id="prod">'.$resultado["nome_tam"].'</td>
                            <td id="prod">'.$resultado["preco_pro"].'</td>
                            <td id="prod">'.$resultado["estoque_pro"].'</td>
                            <td><a href="carrinho.php?acao=add&codigo='.$resultado["cod_pro"].'">Adicionar ao Carrinho</a></td>
                            </tr>';
							?>
							</table>
					<?php
					}
					?>
			<a href="index.php"> Voltar </a>
           </div>

		<div class="col-2 col-m-12">
		  <div class="aside">
			<h2>Bem-Vindo</h2>
<?php
				include "valida_login.php";
?>
			<form id="busca" action="busca.php" method="get">
				<br>
				<input type="text" name="busca"><br>
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
