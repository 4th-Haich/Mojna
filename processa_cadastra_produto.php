<?php
	include "conexao.php";
	
    $nome = $_POST ["nome"];
    $preco = $_POST ["preco"];
    $estoque = $_POST ["estoque"]; 
    $marca = $_POST ["marca"];
	$tamanho = $_POST ["tamanho"];
	$tipo = $_POST["tipo"];
					   
	$cadastra = mysql_query ("INSERT INTO produto
									(nome_pro, 
									preco_pro, 
									estoque_pro, 
									marca_cod_marca,
									tipo_pro_cod_tipo_pro, 
									tamanho_cod_tam)
                                  values ('$nome', '$preco', '$estoque', 
								  '$marca','$tipo', '$tamanho')");
						
      if ($cadastra == true) {
	    echo"<script> alert ('$nome cadastrado com sucesso!')</script>";
	    echo"<script> location.href = ('cadastra_produto.php')</script>";
	   
	   exit();
	  }  
	   else {
	   echo"<script> alert ('Ocorreu um erro no servidor')</script>";
	   echo"<script> location.href = ('cadastra_produto.php')</script>";
	  }
?>