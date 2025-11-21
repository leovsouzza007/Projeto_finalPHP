<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel PHP</title>
</head>
<body>
    <?php 

        if (!isset($_SESSION)){
            session_start();
        }

    ?>

    <header>
        <h1>Hotel PHP</h1>

        <nav>
            <a href="index">Home</a>

            <?php if (isset($_SESSION['id'])): ?>
                <p>Olá, <?php echo $_SESSION['nome']; ?>! </</p>
                <a href="logout.php">Sair</a>

            <?php else: ?>
                <a href="../forms/form_login.php">Login</a>
                <a href="../forms/form_cadastro.php">Cadastro</a>
            
            <?php endif; ?>
        </nav>
    </header>