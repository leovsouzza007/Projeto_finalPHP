<?php
    include_once "../config/config.inc.php";

    // Variáveis para mostrar a mensagem no HTML.
    $mensagem = "";
    $tipo_mensagem = ""; // 'sucesso' ou 'erro'

    // Pega o nome, senha e email do formulário de cadastro
    if ($_SERVER["REQUEST_METHOD"] === 'POST'){
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];

        // Criptografia da senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Inserção dos dados na tabela
        $sql = "INSERT INTO usuarios (nome, senha, email) VALUES (?, ?, ?)";
        $stmt = $conexao->prepare($sql);

        // Proteção contra SQL Injection.
        // "sss" -> String String String -> nome senha email
        $stmt->bind_param("sss", $nome, $senhaHash, $email);

        if ($stmt->execute()){
            $tipo_mensagem = "sucesso";
            $mensagem = "Cadastro realizado com sucesso!";
        } else{
            $tipo_mensagem = "erro";
            // Ao invés de mostrar a mensagem de erro quando o código dá problema, é mostrado algo mais 'amigável'.
            $mensagem = "Ocorreu um erro ao realizar o cadastro: " . $stmt->error;
        }
        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="pt-br" class="h-full bg-gradient-to-tr from-slate-950 to-slate-800">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status do Cadastro - Hotel PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full font-sans antialiased">
    <div class="flex min-h-full flex-col justify-center items-center px-6 py-12 lg:px-8">
        
        <div class="w-full sm:max-w-[480px] bg-gray-900/80 backdrop-blur-sm rounded-2xl shadow-2xl shadow-indigo-500/20 border border-white/10 p-8 sm:p-10 text-center">
            
            <div class="mb-8">
                <img class="mx-auto h-12 w-auto" src="../assets/img/hp.svg" alt="Hotel PHP Logo">
            </div>

            <!-- Inicialização de estrutura condicional dentro do html -->
            <?php if ($tipo_mensagem === 'sucesso'): ?>
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-green-900/30 mb-6">
                    <svg class="h-8 w-8 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>
                
                <h3 class="text-xl font-bold tracking-tight text-white mb-2">Sucesso!</h3>
                <p class="text-gray-300 mb-8"><?php echo $mensagem; ?></p>
                
                <a href="../forms/form_login.php" class="block w-full rounded-lg bg-indigo-600 px-3 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 hover:shadow-indigo-500/30 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-200">
                    Ir para Login
                </a>

            <?php elseif ($tipo_mensagem === 'erro'): ?>
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-red-900/30 mb-6">
                    <svg class="h-8 w-8 text-red-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>

                <h3 class="text-xl font-bold tracking-tight text-white mb-2">Erro no Cadastro</h3>
                <p class="text-red-200/80 mb-8 text-sm break-words"><?php echo $mensagem; ?></p>

                <div class="grid grid-cols-2 gap-4">
                    <a href="../forms/form_cadastro.php" class="flex w-full justify-center rounded-lg bg-gray-700 px-3 py-2.5 text-sm font-semibold text-white hover:bg-gray-600 transition-colors">
                        Tentar Novamente
                    </a>
                    <a href="../public/index.php" class="flex w-full justify-center rounded-lg bg-transparent border border-gray-600 px-3 py-2.5 text-sm font-semibold text-white hover:bg-gray-800 transition-colors">
                        Voltar ao Início
                    </a>
                </div>

            <?php else: ?>
                <p class="text-gray-400 mb-6">Acesso inválido.</p>
                <a href="../public/index.php" class="text-indigo-400 hover:text-indigo-300">Voltar para a Home</a>
            <!-- Finalização da estrutura condicional -->
            <?php endif; ?>

        </div>
    </div>
</body>
</html>