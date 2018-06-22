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
		  var nome = form_cadastra_pro.nome.value;
		  var preco = form_cadastra_pro.preco.value;
		  var estoque = form_cadastra_pro.estoque.value;

			if (nome=="") {
				alert ("Preencha o campo nome");
				form_cadastra_pro.nome.focus();

				return false;
			}
			
			if (preco=="") {
			  alert ("Preencha o campo preço");
			  form_cadastra_pro.preco.focus();

			  return false;
			}

			if (estoque=="") {
				alert ("Preencha o campo estoque");
				form_cadastra_pro.estoque.focus();

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
			<form action="processa_cadastra_produto.php" name="form_cadastra_pro" method="post">
						<p class="titulo">
						    Formulário de Cadastro de Produto
						</p>
					<TABLE >	
					
					    <TR>
						   <TD>
							   Nome:
						   </TD>
						    <TD>
							   <INPUT TYPE="TEXT" NAME="nome">
						   </TD>
					    </TR>
						
						<TR>
						   <TD>
							   Preço:
						   </TD>
						    <TD>
							   <INPUT TYPE="TEXT" NAME="preco">
						   </TD>
					    </TR>
						
						<TR>
						   <TD>
							   Estoque:
						   </TD>
						    <TD>
							   <INPUT TYPE="TEXT" NAME="estoque">
						   </TD>
					    </TR>

						<TR>
						   <TD>
							   Marca:
						   </TD>
						    <TD>
							   <?php $pesquisa = mysql_query("SELECT cod_marca, nome_marca 
																FROM marca");?>
									<select name="marca"> <option>Selecione...</option> 
										<?php while($selec = mysql_fetch_array($pesquisa)) { ?> 
										<option value="<?php echo $selec['cod_marca'] ?>"><?php echo $selec['nome_marca'] ?></option> <?php } ?>
									</select>
							
						   </TD>
					    </TR>
						
						<TR>
						   <TD>
							   Tamanho:
						   </TD>
						    <TD>
							   <?php $pesquisa = mysql_query("SELECT cod_tam, nome_tam 
																FROM tamanho");?>
									<select name="tamanho"> <option>Selecione...</option> 
										<?php while($selec = mysql_fetch_array($pesquisa)) { ?> 
										<option value="<?php echo $selec['cod_tam'] ?>"><?php echo $selec['nome_tam'] ?></option> <?php } ?>
									</select>
								</form>
						   </TD>
					    </TR>
						
						<TR>
						   <TD>
							   Tipo:
						   </TD>
						    <TD>
							   <?php $pesquisa = mysql_query("SELECT cod_tipo_pro, nome_tipo_pro 
																FROM tipo_pro");?>								
									<select name="tipo"> <option>Selecione...</option> 
										<?php while($selec = mysql_fetch_array($pesquisa)) { ?> 
										<option value="<?php echo $selec['cod_tipo_pro'] ?>"><?php echo $selec['nome_tipo_pro'] ?></option> <?php } ?>
									</select>
						   </TD>
					    </TR>
						 
						 <TR>
						   <TD colspan="2" class="botao2">
							   <INPUT TYPE="SUBMIT" VALUE="Cadastrar Acessório" onclick="return validar()">
							   <input type="RESET" value="Limpar">
						   </TD>
					    </TR>
					</TABLE>
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