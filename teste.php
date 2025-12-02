<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Teste Layout</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col bg-gray-900 text-white">
  <!-- HEADER: usar sticky em vez de absolute para não tirar do fluxo -->
  <header class="sticky top-0 z-50 bg-gray-900/95 backdrop-blur border-b border-gray-800">
    <nav class="max-w-7xl mx-auto flex items-center justify-between p-6 lg:px-8">
      <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">Hotel PHP</span>
          <img src="../assets/img/hp.svg" alt="Logo hotel" class="h-12 w-auto" />
        </a>
      </div>

      <div class="hidden lg:flex lg:gap-x-12">
        <a href="#" class="text-sm font-semibold text-white">Cadastre-se</a>
        <a href="#" class="text-sm font-semibold text-white">Contato</a>
        <a href="#" class="text-sm font-semibold text-white">Sobre nós</a>
        <a href="#" class="text-sm font-semibold text-white">Quartos</a>
      </div>

      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="#" class="text-sm font-semibold text-white">Log in →</a>
      </div>
    </nav>
  </header>

  <!-- MAIN: flex-grow para empurrar footer pra baixo -->
  <main class="flex-grow relative overflow-hidden">
    <div class="relative isolate px-6 pt-14 lg:px-8">
      <div class="mx-auto max-w-7xl py-32 sm:py-48 lg:py-56">
        <div class="text-center">
          <h1 class="text-5xl font-semibold tracking-tight text-white sm:text-7xl">Experiência, Conforto e Sofisticação</h1>
          <p class="mt-8 text-lg text-gray-300">No Hotel PHP, unimos conforto e eficiência.</p>
          <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="#" class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-400">Comece aqui</a>
            <a href="./public/index.php?page=quartos" class="text-sm font-semibold text-white">Nossas Suítes →</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- FOOTER: segue normalmente -->
  <footer class="bg-gray-900 text-gray-400 py-10 border-t border-gray-700">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">
      <div>
        <h3 class="text-white text-lg font-semibold mb-3">Hotel PHP</h3>
        <p class="text-sm">O melhor conforto, atendimento e experiência para você.</p>
      </div>
      <div>
        <h3 class="text-white text-lg font-semibold mb-3">Links Rápidos</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-white transition">Home</a></li>
          <li><a href="#" class="hover:text-white transition">Contato</a></li>
          <li><a href="#" class="hover:text-white transition">Suítes</a></li>
          <li><a href="#" class="hover:text-white transition">Sobre nós</a></li>
        </ul>
      </div>
      <div>
        <h3 class="text-white text-lg font-semibold mb-3">Contato</h3>
        <p class="text-sm">Email: contato@hotelp.com</p>
        <p class="text-sm">Telefone: (83) 90000-0000</p>
      </div>
    </div>

    <div class="text-center text-gray-500 text-xs mt-10 border-t border-gray-700 pt-6">
      © 2025 Hotel PHP — Todos os direitos reservados.
    </div>
  </footer>
</body>
</html>
