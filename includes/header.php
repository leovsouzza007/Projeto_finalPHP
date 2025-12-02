<?php
  // Inicia a sessão se ainda não estiver iniciada
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hotel PHP</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col">
  <div class="bg-gray-900">
    <header class="absolute inset-x-0 top-0 z-50 mb-64">
      <nav aria-label="Global" class="max-w-7xl mx-auto flex items-center justify-between p-6 lg:px-8">
        <div class="flex lg:flex-1">
          <a href="index.php?page=principal" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>
            <img src="../assets/img/hp.svg" alt="Logo hotel" class="h-12 w-auto" />
          </a>
        </div>

        <div class="flex lg:hidden">
          <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-200">
            <span class="sr-only">Open main menu</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6">
              <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>

        <div class="hidden lg:flex lg:gap-x-12">
          <a href="../forms/form_cadastro.php" class="text-sm/6 font-semibold text-white">Cadastre-se</a>
          <a href="../public/index.php?page=contato" class="text-sm/6 font-semibold text-white">Contato</a>
          <a href="../public/index.php?page=sobre" class="text-sm/6 font-semibold text-white">Sobre nós</a>
          <a href="../public/index.php?page=quartos" class="text-sm/6 font-semibold text-white">Quartos</a>
        </div>

        <?php if (isset($_SESSION['id'])): ?>
          <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center gap-4">
            <p class="text-sm font-medium text-white">Olá, <?php echo htmlspecialchars($_SESSION['nome'], ENT_QUOTES, 'UTF-8'); ?>!</p>
            <a href="logout.php" class="text-sm/6 font-semibold text-white">Sair</a>
          </div>
        <?php else: ?>
          <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="../forms/form_login.php" class="text-sm/6 font-semibold text-white">Log in <span aria-hidden="true">&rarr;</span></a>
          </div>
        <?php endif; ?>
      </nav>
    </header>