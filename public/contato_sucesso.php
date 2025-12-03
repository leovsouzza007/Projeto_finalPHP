<?php
// arquivo: contato_sucesso.php
// este arquivo recebe o POST do form e insere no DB antes de mostrar a página de sucesso

require_once '../config/config.inc.php'; // mantém seu mysqli

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    if ($nome === '' || $email === '' || $mensagem === '') {
        header('Location: contato.php');
        exit;
    }

    // Inserção segura com mysqli
    $sql = "INSERT INTO reclamacoes (nome, email, mensagem) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $mensagem);

    mysqli_stmt_execute($stmt);
    
} else {
    header('Location: contato.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mensagem Recebida</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-gray-950 to-gray-900 min-h-screen flex items-center justify-center px-6 py-20">

  <div class="w-full sm:max-w-[650px] bg-gray-900/80 backdrop-blur-sm rounded-2xl 
              shadow-2xl shadow-indigo-500/20 border border-white/10 p-10 text-center">

    <img class="mx-auto h-14 w-auto mb-6 transition-transform hover:scale-105 duration-200" 
         src="../assets/img/hp.svg" alt="Hotel PHP Logo">

    <h2 class="text-3xl font-bold tracking-tight text-white mb-3">
      Mensagem enviada com sucesso!
    </h2>

    <p class="text-gray-300 text-base leading-relaxed mb-10">
      Agradecemos o seu contato.  
      <br>
      Nossa equipe irá responder o mais breve possível.
    </p>

    <a href="index.php?page=principal"
       class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-6 py-2.5
              text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 
              hover:shadow-indigo-500/30 focus-visible:outline 
              focus-visible:outline-2 focus-visible:outline-offset-2 
              focus-visible:outline-indigo-600 transition-all duration-200">

      Voltar para o início
    </a>

  </div>

</body>
</html>
