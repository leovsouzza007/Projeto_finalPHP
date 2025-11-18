<?php

    session_start();
    include_once "../config/config.inc.php";

    if ($_SERVER["REQUEST_METHOD"] === 'POST'){
        $nome = $POST['nome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];

        // Realiza a busca do usuário no banco de dados de acordo com o email que é único.
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        // Pega o resultado da consulta ao banco de dados.
        $resultado = $stmt->get_result();
    }

?>