<?php
					$consulta = mysql_query("SELECT 
						cod_pro, 
						nome_pro, 
						preco_pro, 
						estoque_pro,
						tipo_pro_cod_tipo_pro, 
						nome_tipo_pro, 
						marca_cod_marca, 
						nome_marca, 
						tamanho_cod_tam ,
						nome_tam 
						FROM produto 
						INNER JOIN tipo_pro 
						ON tipo_pro_cod_tipo_pro = cod_tipo_pro 
						INNER JOIN marca 
						ON marca_cod_marca = cod_marca 
						INNER JOIN tamanho 
						ON tamanho_cod_tam = cod_tam
						ORDER BY cod_pro DESC
						");
													
					$linhas = mysql_num_rows ($consulta);
					echo "<p class='titulo'> $linhas Produtos Cadastrados </p>";
					?>
						<table>
							<tr>
								<td>Código</td>
								<td>Nome</td>
								<td>Tipo</td>
								<td>Marca</td>
								<td>Tamanho</td>
								<td>Preço</td>
								<td>Qtd. em Estoque</td>
							</tr>
							<?php
					for ($cont = 0; $cont < $linhas; $cont++){
							$cod = mysql_result ($consulta, $cont, "cod_pro");
							$nome = mysql_result ($consulta, $cont, "nome_pro");
							$tipo = mysql_result ($consulta, $cont, "nome_tipo_pro");
							$marca = mysql_result ($consulta, $cont, "nome_marca");
							$tamanho = mysql_result ($consulta, $cont, "nome_tam");
							$preco = mysql_result ($consulta, $cont, "preco_pro");
							$estoque = mysql_result ($consulta, $cont, "estoque_pro");
							  echo '<tr>
							<td id="prod">'.$cod.'</td>
                            <td id="prod">'.$nome.'</td>
                            <td id="prod">'.$tipo.'</td>
                            <td id="prod">'.$marca.'</td>
                            <td id="prod">'.$tamanho.'</td>
                            <td id="prod">'.$preco.'</td>
                            <td id="prod">'.$estoque.'</td>
                            <td><a href="carrinho.php?acao=add&codigo='.$cod.'">Adicionar ao Carrinho</a></td>
                            </tr>';
						}
					?>
							</table>
						