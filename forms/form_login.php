<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário login</title>
</head>
<body>
    <form action="../public/login.php" method="post">
        
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        
        <button type="submit">Entrar</button>
        
    </form>
</body>
</html>