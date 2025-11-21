<?php

    session_start();
    include_once "../config/config.inc.php";

    if ($_SERVER["REQUEST_METHOD"] === 'POST'){
        $email  = $_POST['email'];
        $senha  = $_POST['senha'];

        // Busca usuário por meio do email
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1){

            $usuario = $resultado->fetch_assoc();

            // Confirma a senha criptografada
            if (password_verify($senha, $usuario['senha'])){

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: index.php");
                exit;

            } else {
                echo "Senha incorreta!";
            }

        } else {
            echo "Usuário não encontrado!";
        }

        $stmt->close();
    }

?>
