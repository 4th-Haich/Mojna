<?php 
    error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	
	mysql_connect ("localhost", "root", "") or 
die ("Não foi possível conectar no servidor de Banco de dados");

    mysql_select_db("balcao") or
die("Não foi possível encontrar o BD");

?>	