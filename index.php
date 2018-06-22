<?php
session_start();
include "conexao.php";
if ($_SESSION["login"] == true) {
	if ($_SESSION["tipo_usu"] == 1){
		echo "<script>location.href =('administracao.php')</script>";
		exit();
	}
	else{
		echo "<script>location.href =('produtos.php')</script>";
		exit();
	}
}
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="layout.css" />
		<link rel="stylesheet" type="text/css" href="menu.css" />
		<link rel="stylesheet" type="text/css" href="texto.css" />

		<script language="javascript" type="text/javascript">
	    function validar() {
	    var login = form_login.login.value;
	    var senha = form_login.senha.value;

	    if (login=="") {
	      alert ("Preencha o campo com seu login");
	      form_login.login.focus();

		  return false;
	    }

	      if (senha=="") {
	        alert ("Preencha o campo com sua senha");
	        form_login.senha.focus();

		    return false;
	    }
	  }
		</script>

	</head>
	<body class="fundo"> 
	    <div id="fundo_index">
		     <img src="imagem_fundo.jpg"  height="100%" width="100%">   
		  <div id="conteudo_index">
			<form action="processa_login.php" method="post" name="form_login">
				<table>
					<tr>
						  <td>
						        <b> Login: </b>
						  </td>
						  <td>
						        <input type="text" name="login" class="caixa_texto" size="10">
						  </td>
						</tr>
						<tr>
						
						</tr>
						<tr>
							<td>
						         <b> Senha:	</b>
							</td>
							<td>
						         <input type="password" name="senha" class="caixa_texto"  size="10">	
							</td>
						</tr>
						<tr>
						
						</tr>
						<tr class="botao">
						    <td>
						    
							</td>
							<td colspan=2>
								<input type="submit" value="Entrar" class="botao_bonito" onclick="return validar()">
							</td>
					</tr>
				</table>					
			</form>
		  </div>
		</div>
	</body>
</html>