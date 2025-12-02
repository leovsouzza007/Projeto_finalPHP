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

    // Se achou 1 usuário
    if ($resultado->num_rows === 1){

        $usuario = $resultado->fetch_assoc();

        // Confirma a senha criptografada
        if (password_verify($senha, $usuario['senha'])){

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: index.php");
            exit;

        } else {
            // Senha errada
            header("Location: ../forms/form_login.php?erro=senha");
            exit;
        }

    } else {
        // Usuário não existe
        header("Location: ../forms/form_login.php?erro=usuario");
        exit;
    }

    $stmt->close();
}

?>
