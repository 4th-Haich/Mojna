<?php
	session_start();
	include "conexao.php";
	
	
	$cpf = $_POST["cpf"];

	
	$pesquisa =  mysql_query ("SELECT * FROM `vendas` ORDER BY cod_vendas DESC LIMIT 1");
									$cod_fetch = mysql_fetch_assoc ($pesquisa);
									
	$inserecpf = mysql_query ("INSERT INTO vendas (cpf)
                                  values ('$cpf')");
					
	if ($inserecpf == true){
			echo "<script> alert ('CPF $cpf inserido com sucesso!')</script>";
			echo "<script> location.href = ('produtos.php')</script>";
			exit();
		} else {
			echo "<script> alert ('Ocorreu um erro no servidor! Tente novamente!!')</script>";
			echo "<script> location.href = ('dados_cliente.php')</script>";
		}
	

?>