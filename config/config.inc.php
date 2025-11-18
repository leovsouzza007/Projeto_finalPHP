<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "sistema_hotel";

    $conexao = mysqli_connect($host, $user, $pass, $db);

    if (!$conexao){
        // "die" faz a interrupção do programa, mas antes disso, mostra a mensage abaixo.
        die("Erro ao conectar com o banco de dados:" . mysqli_connect_error());
    }

?>