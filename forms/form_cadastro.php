<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário cadastro</title>
</head>
<body>
    <form action="cadastro.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>
        
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>