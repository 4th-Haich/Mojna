<?php
	session_start();
	include "conexao.php";

	$login = $_POST["login"];
	$senha = $_POST["senha"];

	$pesquisa = mysql_query("SELECT login_usu, senha_usu, tipo_usu_cod_tipo_usu
				  FROM usuarios
				  WHERE login_usu = '$login' and senha_usu = '$senha'"); 
				  
				$linhas = mysql_num_rows ( $pesquisa);
				  
				  if ( $linhas == true) {
					$_SESSION["login"] = $login;
					$tipo = mysql_fetch_assoc($pesquisa);
					$_SESSION["tipo_usu"]= $tipo["tipo_usu_cod_tipo_usu"];
					if($tipo["tipo_usu_cod_tipo_usu"] == 1){
						echo"<script> location.href = ('administracao.php') </script>";
					}
					else{
						echo "<script> location.href = ('produtos.php') </script>>";
					}
					
				  } 
					else {
					 echo"<script> alert('Login ou Senha Incoretos Digite novamente')</script>";
				 
					 echo"<script> location.href = ('index.php') </script>";
					}

?>