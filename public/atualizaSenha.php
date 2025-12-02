<?php

require_once("../config/config.inc.php");

$email       = $_POST['email'];
$senha_atual = $_POST['senha_atual'];
$senha_nova  = $_POST['senha_nova'];

// busca usuário
$sql = "SELECT senha FROM usuarios WHERE email = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 0) {
    die("Usuário não encontrado.");
}

$stmt->bind_result($senha_hash);
$stmt->fetch();

// verifica senha atual
if (!password_verify($senha_atual, $senha_hash)) {
    die("Senha atual incorreta!");
}

// nova hash
$nova_hash = password_hash($senha_nova, PASSWORD_DEFAULT);

// update
$sql = "UPDATE usuarios SET senha = ? WHERE email = ?";
$stmt2 = $conexao->prepare($sql);
$stmt2->bind_param("ss", $nova_hash, $email);
$stmt2->execute();

?>

<!DOCTYPE html>
<html lang="pt-br" class="h-full bg-gradient-to-tr from-slate-950 to-slate-800">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senha Alterada - Hotel PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full font-sans antialiased">

<div class="flex min-h-full flex-col justify-center items-center px-6 py-12 lg:px-8">

    <div class="w-full sm:max-w-[480px] bg-gray-900/80 backdrop-blur-sm rounded-2xl shadow-2xl shadow-indigo-500/20 border border-white/10 p-8 sm:p-10 text-center">

        <img class="mx-auto h-12 w-auto transition-transform hover:scale-105 duration-200" 
             src="../assets/img/hp.svg" alt="Hotel PHP Logo">

        <h2 class="mt-6 text-2xl font-bold tracking-tight text-white">
            Senha Alterada!
        </h2>

        <p class="mt-4 text-gray-300 text-sm leading-6">
            Sua senha foi atualizada com sucesso.<br>
            Agora você pode fazer login novamente.
        </p>

        <div class="mt-10">
            <a href="../forms/form_login.php"
               class="inline-flex w-full justify-center rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 hover:shadow-indigo-500/30 focus-visible:outline-2 focus-visible:outline-indigo-600 transition-all duration-200">
                Voltar ao Login
            </a>
        </div>

    </div>

</div>

</body>
</html>";