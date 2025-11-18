<?php

    include_once "../config/config.inc.php";

    if ($_SERVER["REQUEST_METHOD"] === 'POST'){
        $nome = $POST['nome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, senha, email) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        // Proteção contra SQL Injection.
        $stmt->bind_param("sss", $nome, $senhaHash, $email);
        if ($stmt->execute()){
            echo "Cadastro realizado com sucesso!   <a href='../forms/form_login.php'>Ir para login</a>";
        } else{
            echo "Ocorreu um erro ao realizar o cadastro: " . $stmt->error();
        }
        $stmt->close();
    }

?>