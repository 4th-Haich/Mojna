<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Não foi possível conectar no servidor de Banco de dados: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>	