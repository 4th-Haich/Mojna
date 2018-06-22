<?php
  include "conexao.php";
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" type="text/css" href="layout.css">
			
		<script language="javascript" type="text/javascript">
		  function validar() {
		  var cpf = form_altera_usu.cpf.value;
		  var nome = form_altera_usu.nome.value;
		  var login = form_altera_usu.login.value;
		  var senha = form_altera_usu.senha.value;
		  
            if (cpf=="") {
			  alert ("Preencha o campo CPF");
			  form_altera_usu.cpf.focus();

			  return false;
			}

			if (nome=="") {
				alert ("Preencha o campo nome");
				form_altera_usu.nome.focus();

				return false;
			}
			
			if (login=="") {
			  alert ("Preencha o campo login");
			  form_altera_usu.login.focus();

			  return false;
			}

			if (senha=="") {
				alert ("Preencha o campo senha");
				form_altera_usu.senha.focus();

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
						<h1>Lista</h1>
						<?php 
				$cod = $_GET ["codigo"];				
               
			   $pesquisa = mysql_query ("SELECT usuarios.cod_usu, cpf_usu, nome_usu, 
                login_usu, senha_usu, usuarios.tipo_usu_cod_tipo_usu , nome_tipo_usu 
                FROM usuarios 
                INNER JOIN tipo_usu 
                ON usuarios.tipo_usu_cod_tipo_usu = tipo_usu.cod_tipo_usu
				 WHERE usuarios.cod_usu = '$cod'");

				$cpf_usu = mysql_result ($pesquisa, 0, "cpf_usu");
				$nome_usu = mysql_result ($pesquisa, 0, "nome_usu");
				$login_usu = mysql_result ($pesquisa, 0, "login_usu");
				$senha_usu = mysql_result ($pesquisa, 0, "senha_usu");				
				
				?>						   

						<form action="processa_altera_usuarios.php" name="form_altera_usu" method= "post">
							<p class="titulo">
                  Formulário de Alteração de Usuário
							</p>

							<input type='hidden' name='codigo' value="<?php echo $cod; ?>">
									
                <table>
				   <tr>
				     <td>
					   CPF: 
					 </td>
					 <td>
					   <input type='text' name='cpf' value="<?php echo $cpf_usu; ?>">
					 </td>
				   </tr>
				   
				   <tr>
				     <td>
					   Nome: 
					 </td>
					 <td>
					   <input type='text' name='nome' value="<?php echo $nome_usu; ?>">
					 </td>
				   </tr> 
				   
				   <tr>
				     <td>
					   Login:
					 </td>
					 <td>
					   <input type='text' name='login' value="<?php echo $login_usu; ?>">
					 </td>
				   </tr>
				   
				   <tr>
				     <td>
					   Senha:
					 </td>
					 <td>
					   <input type='password' name='senha' value="<?php echo $senha_usu; ?>">
					 </td>
				   </tr>
				   
				    <tr>
				     <td class="botao2" colspan=2>
					   <input type='submit' value="Alterar Usuário" onclick="return validar()">
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