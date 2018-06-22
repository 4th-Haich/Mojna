<?php
	include "conexao.php";
	
    $cpf = $_POST ["cpf"]; 
    $nome = $_POST ["nome"];
    $login = $_POST ["login"]; 
    $senha = $_POST ["senha"];
	$cod = $_POST["codigo"];
	
		$altera = mysql_query("UPDATE usuarios
							   SET cpf_usu = '$cpf',
								   nome_usu = '$nome',
								   login_usu = '$login',
								   senha_usu = '$senha'
							   WHERE cod_usu = '$cod'");
							   
		if ($altera == true){
			echo "<script> alert ('Usuário $nome alterado com sucesso')</script>";
			echo "<script> location.href = ('lista_usuarios.php')</script>";
			exit();
		} else {
			echo "<script> alert ('Ocorreu um erro no servidor! Tente novamente!!')</script>";
			echo "<script> location.href = ('administracao.php')</script>";
		}
?>