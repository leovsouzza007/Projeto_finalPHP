<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "sistema_hotel";

    // Conecta com o servidor MySQL
    $conexao = mysqli_connect($host, $user, $pass, $db);
    // Seleciona o banco de dados que vai ser conectado
    $db = mysqli_select_db($conexao, $db);

    if (!$conexao){
        // "die" faz a interrupção do programa, mas antes disso, mostra a mensage abaixo.
        die("Erro ao conectar com o banco de dados:" . mysqli_connect_error());
    }

?>