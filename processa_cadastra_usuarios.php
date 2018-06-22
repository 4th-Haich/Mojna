<?php
  include "conexao.php";
  
  $cpf = $_POST ["cpf"]; 
  $nome = $_POST ["nome"];
  $login = $_POST ["login"]; 
  $senha = $_POST ["senha"];
  $tipo = $_POST["tipo"];
  
    $consulta = mysql_query ("select login_usu from usuarios where login_usu = '$login' ");
    $linhas = mysql_num_rows ($consulta);
	
	$consulta2 = mysql_query ("select cpf_usu from usuarios where cpf_usu = '$cpf' ");
    $linhas2 = mysql_num_rows ($consulta2);
	
    if (($linhas==1) || ($linhas2==1)) {
	  if ($linhas==1) {
        echo"<script> alert ('LOGIN já cadastrado!')</script>";
	    echo"<script> location.href = ('cadastra_usuarios.php')</script>";

	    exit(); 
	
      } else {
          echo"<script> alert ('CPF já cadastrado!')</script>";
	      echo"<script> location.href = ('cadastra_usuarios.php')</script>";

	      exit(); 
	
        } 
	} else {
  
        $cadastra = mysql_query ("insert into usuarios(nome_usu, cpf_usu, login_usu, senha_usu, tipo_usu_cod_tipo_usu )
                                  values ('$nome' , '$cpf', '$login' , '$senha', '$tipo' )");
						
      if ($cadastra == true) {
	    echo"<script> alert ('Usuário $nome cadastrado com sucesso!')</script>";
	    echo"<script> location.href = ('cadastra_usuarios.php')</script>";
	   
	   exit();
	  }  
	   else {
	   echo"<script> alert ('Ocorreu um erro no servidor')</script>";
	   echo"<script> location.href = ('administracao.php')</script>";
	  }
	}
?>