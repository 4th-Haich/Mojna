<?php
session_start();
include "conexao.php";
	if ($_SESSION["tipo_usu"] == "1"){
?>		<a href="lista_usuarios.php"><li> Usuários </li> </a>
		<a href="cadastra_usuarios.php"><li>  Cadastrar Usuários  </li> </a>
		<a href="produtos.php"><li> Lista de Produtos </li> </a>
		<a href="cadastra_produto.php"><li> Cadastrar Produtos </li> </a>
		<a href="revelar_produto.php"><li> Alterar Produtos </li> </a>
		<a href="carrinho.php"><li> Carrinho </li> </a>

<?php
	} 
	else{
?>
		<a href="produtos.php"><li> Lista de Produtos </li> </a>
		<a href="carrinho.php"><li> Carrinho </li> </a>
<?php
	}
?>