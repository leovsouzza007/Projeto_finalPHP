<?php

    // Inicialização da sessão -> "Remove" tudo dentro da sessão -> Redireciona para a página principal -> Encerramento
    session_start();
    session_destroy();
    header("Location: index.php");
    exit;
    
?>