<?php

    include_once "../config/config.inc.php";

    if ($_SERVER["REQUEST_METHOD"] === 'POST'){
        $nome = $POST['nome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, senha, email) VALUES (?, ?, ?)";
        $stmt
    }
?>