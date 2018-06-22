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
		  var cpf = form_cadastra_usuarios.cpf.value;
		  var nome = form_cadastra_usuarios.nome.value;
		  var login = form_cadastra_usuarios.login.value;
		  var senha = form_cadastra_usuarios.senha.value;
		  
            if (cpf=="") {
			  alert ("Preencha o campo CPF");
			 form_cadastra_usuarios.cpf.focus();

			  return false;
			}

			if (nome=="") {
				alert ("Preencha o campo nome");
				form_cadastra_usuarios.nome.focus();

				return false;
			}
			
			if (login=="") {
			  alert ("Preencha o campo login");
			 form_cadastra_usuarios.login.focus();

			  return false;
			}

			if (senha=="") {
				alert ("Preencha o campo senha");
				form_cadastra_usuarios.senha.focus();

				return false;
			}
		  }
		</script>
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
						<form action="processa_cadastra_usuarios.php" method="post" name="form_cadastra_usuarios">
						<p class="titulo">
						    Formulário de Cadastro de Usuário
						</p>
					<TABLE >	
						<TR>
						   <TD>
							  CPF:
						   </TD>
						   <TD>
							 <INPUT TYPE="TEXT" NAME="cpf">
						   </TD>
					    </TR>
						
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
							   Login:
						   </TD>
						    <TD>
							   <INPUT TYPE="TEXT" NAME="login">
						   </TD>
					    </TR>
						
						<TR>
						   <TD>
							   Senha:
						   </TD>
						    <TD>
							   <INPUT TYPE="PASSWORD" NAME="senha">
						   </TD>
					    </TR>
						<TR>
						   <TD>
							   Tipo:
						   </TD>
						    <TD>
							   <select NAME="tipo">
                                    <option value="1" selected>Administrador</option>
                                    <option value="2">Funcionário</option>>
                                </select>
						   </TD>
					    </TR>
								

					   
						 <TR>
						   <TD colspan="2" class="botao2">
							   <INPUT TYPE="SUBMIT" VALUE="Cadastrar Usuário" onclick="return validar()">
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