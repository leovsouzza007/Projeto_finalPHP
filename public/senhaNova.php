<?php
$email = $_POST['email'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br" class="h-full bg-gradient-to-tr from-slate-950 to-slate-800">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Senha - Hotel PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full font-sans antialiased">
<div class="flex min-h-full flex-col justify-center items-center px-6 py-12 lg:px-8">

    <div class="w-full sm:max-w-[480px] bg-gray-900/80 backdrop-blur-sm rounded-2xl shadow-2xl shadow-indigo-500/20 border border-white/10 p-8 sm:p-10">

        <div class="sm:mx-auto sm:w-full sm:max-w-sm mb-10">
            <a href="../public/index.php?page=principal" class="block text-center">
                <img class="mx-auto h-12 w-auto transition-transform hover:scale-105 duration-200" src="../assets/img/hp.svg" alt="Hotel PHP Logo">
            </a>
            <h2 class="mt-6 text-center text-2xl/9 font-bold tracking-tight text-white">Alterar Senha</h2>
            <p class="mt-2 text-center text-sm text-gray-400">
                Email: <?= htmlspecialchars($email) ?>
            </p>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="atualizaSenha.php" method="POST">

                <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">

                <div>
                    <label for="senha_atual" class="block text-sm/6 font-medium text-gray-200">Senha Atual</label>
                    <div class="mt-2 relative">
                        <input type="password" name="senha_atual" id="senha_atual" required
                               class="block w-full rounded-lg bg-white/5 pl-3 py-2 text-base text-white outline outline-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:outline-indigo-500 sm:text-sm/6 transition duration-200">
                    </div>
                </div>

                <div>
                    <label for="senha_nova" class="block text-sm/6 font-medium text-gray-200">Nova Senha</label>
                    <div class="mt-2 relative">
                        <input type="password" name="senha_nova" id="senha_nova" required
                               class="block w-full rounded-lg bg-white/5 pl-3 py-2 text-base text-white outline outline-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:outline-indigo-500 sm:text-sm/6 transition duration-200">
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="flex w-full justify-center rounded-lg bg-indigo-600 px-3 py-2.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 hover:shadow-indigo-500/30 focus-visible:outline-2 focus-visible:outline-indigo-600 transition-all duration-200">
                        Alterar Senha
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-400">
                <a href="form_login.php" class="font-semibold text-indigo-400 hover:text-indigo-300 transition-colors">Voltar ao login</a>
            </p>
        </div>

    </div>

</div>
</body>
</html>
