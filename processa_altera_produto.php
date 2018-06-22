<?php
	include "conexao.php";
	
    $nome = $_POST ["nome"];
    $preco = $_POST ["preco"];
    $estoque = $_POST ["estoque"]; 
    $marca = $_POST ["marca"]; 
	$tipo = $_POST ["tipo"]; 
    $tamanho = $_POST ["tamanho"];
	$cod = $_POST["codigo"];
	
		$altera = mysql_query("UPDATE `produto` 
							SET `nome_pro` = '$nome',
							`preco_pro` = '$preco',
							`estoque_pro` = '$estoque',
							`tipo_pro_cod_tipo_pro` = '$tipo',
							`marca_cod_marca` = '$marca',
							`tamanho_cod_tam` = '$tamanho' 
							WHERE `produto`.`cod_pro` = '$cod1'");
							   
		if ($altera == true){
			echo "<script> alert ('$nome foi alterado com sucesso')</script>";
			echo "<script> location.href = ('revelar_produto.php')</script>";
			exit();
		} else {
			echo "<script> alert ('Ocorreu um erro no servidor! Tente novamente!!')</script>";
			echo "<script> location.href = ('revelar_produto.php')</script>";
		}
?>