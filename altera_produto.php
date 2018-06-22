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
							<?php 
				$cod = $_GET ["codigo"];
                
                $pesquisa = mysql_query ("SELECT 
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
					   
				$nome_pro = mysql_result ($pesquisa, 0, "nome_pro");
				$preco_pro = mysql_result ($pesquisa, 0, "preco_pro"); 
				$estoque_pro = mysql_result ($pesquisa, 0, "estoque_pro");
				$marca_cod_marca = mysql_result ($pesquisa, 0, "nome_marca");
				$tipo = mysql_result ($pesquisa, 0, "nome_tipo_pro");
				$tamanho_cod_tam = mysql_result ($pesquisa, 0, "nome_tam");

				
				?>						   
				
                <form action="processa_altera_produto.php" name="form_altera_pro" method= "post">
                <p class="titulo">
                  Formulário de Alteração de Produtos
                </p>
				
				<input type='hidden' name='codigo' value="<?php echo $cod; ?>">
				<table>
				   <tr>
				     <td>
					   Nome: 
					 </td>
					 <td>
					   <input type='text' name='nome' value="<?php echo $nome_pro; ?>">
					 </td>
				   </tr>
				   
				   <tr>
				     <td>
					   Preço:  
					 </td>
					  <td>
					   <input type='text' name='preco' value="<?php echo $preco_pro; ?>">
					 </td>
				   </tr>
				   
				   <tr>
				     <td>
					   Estoque:  
					 </td>
					 <td>
					   <input type='text' name='estoque' value="<?php echo $estoque_pro; ?>">
					 </td>
				   </tr>
				   
				   <tr>
				     <td>
					   Marca:
					 </td>
					 <td>
					   <?php $pesquisa = mysql_query("SELECT cod_marca, nome_marca 
																FROM marca");?>
									<select name="marca"><option><?php echo $marca_cod_marca;?></option>
										<?php while($selec = mysql_fetch_array($pesquisa)) { ?> 
										<option value="<?php echo $selec['cod_marca'] ?>"><?php echo $selec['nome_marca'] ?></option> <?php } ?>
									</select>

					 </td>
				   </tr>
				   
				   <tr>
				     <td>
					   Tipo:
					 </td>
					 <td>
					   <?php $pesquisa = mysql_query("SELECT cod_tipo_pro, nome_tipo_pro 
																FROM tipo_pro");?>
									<select name="tipo"><option><?php echo $tipo;?></option>
										<?php while($selec = mysql_fetch_array($pesquisa)) { ?> 
										<option value="<?php echo $selec['cod_tipo_pro'] ?>"><?php echo $selec['nome_tipo_pro'] ?></option> <?php } ?>
									</select>
					 </td>
				   </tr>
				   
				   <tr>
				     <td>
					   Tamanho:
					 </td>
					 <td>
					   <?php $pesquisa = mysql_query("SELECT cod_tam, nome_tam
																FROM tamanho");?>
									<select name="tamanho"><option><?php echo $tamanho_cod_tam;?></option>
										<?php while($selec = mysql_fetch_array($pesquisa)) { ?> 
										<option value="<?php echo $selec['cod_tam'] ?>"><?php echo $selec['nome_tam'] ?></option> <?php } ?>
									</select>
					 </td>
				   </tr>
				   
				    <tr>
				     <td class="botao2" colspan=2>
					   <input type='submit' value="Alterar Produto" onclick="return validar()">
					 </td>
				   </tr>
				</table>		 
			    </form> 
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
