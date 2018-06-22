<?php
	session_start();
	include "conexao.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="layout.css">
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
		  <p class="titulo"> Alteração De Usuário </p>
			
			<table>
			
			<?php 
			$consulta = mysql_query ("SELECT cod_usu, nome_usu
				FROM usuarios");
		    
			$linhas = mysql_num_rows ($consulta);
			
			?>
			
			<tr> 
			  <td class="sub_titulo" colspan="2">
	            <?php echo "<h4> $linhas Usuários cadastrados!</h4>"; ?>
			  </td>
			</tr>   
           
            <?php			
			
			  for ($cont=0; $cont < $linhas; $cont++) {
				
				$cod_usu = mysql_result ($consulta, $cont, "cod_usu");
				$nome_usu = mysql_result ($consulta, $cont, "nome_usu");

			
			?>
			 
			 <tr>
			   <td>
			       <a href="exibir_usuarios.php?codigo=<?php echo $cod_usu; ?>"> 
			      <?php  echo "<p> $nome_usu </p>"; ?>
				   </a>
			   </td>
			   <td>
			       <a href="altera_usuarios.php?codigo=<?php echo $cod_usu; ?>"> Alterar </a>
			   </td>
			 </tr>	
			 
			<?php		
				}
			?>
			</table>
				
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