<?php 

    require_once("../config/config.inc.php");

    // Faz a seleção dos quartos que tiverem a "ocupação" como "Disponível"
    $sql = "SELECT * FROM quartos WHERE status = 'Disponível'";
    $resultado = $conexao->query($sql);

?>

<body class="h-full font-sans antialiased bg-gradient-to-tr from-slate-950 to-slate-800">

    <div class="flex min-h-full flex-col justify-center items-center px-6 py-20 lg:px-8 mt-20">

        <div class="w-full sm:max-w-[750px] bg-gray-900/80 backdrop-blur-sm rounded-2xl shadow-2xl shadow-indigo-500/20 border border-white/10 p-10">

            <h2 class="text-center text-3xl font-bold text-white mb-10 tracking-wide">
                Quartos Disponíveis
            </h2>

            <!-- Inicialização de uma estrutura condicional if dentro do html até sua finalização -->
            <!-- Condição de ter pelo menos 1 quarto cadastrado e disponível como consequência  -->
            <?php if ($resultado->num_rows > 0): ?>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    
                    <thead class="bg-gray-800/70">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-200">ID</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-200">Nome</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-200">Descrição</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-200">Preço</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-200">Capacidade</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-200">Ação</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-800">
                        <!-- Inicialização de um loop while dentro do html até a sua finalização -->
                        <?php while ($q = $resultado->fetch_assoc()): ?>
                        <tr class="hover:bg-white/5 transition">

                            <td class="px-6 py-4 text-gray-300">
                                <?= $q['id']; ?>
                            </td>

                            <td class="px-6 py-4 text-gray-100 font-semibold">
                                <?= htmlspecialchars($q['nome']); ?>
                            </td>

                            <td class="px-6 py-4 text-gray-400 max-w-xs">
                                <?= nl2br(htmlspecialchars($q['descricao'])); ?>
                            </td>

                            <td class="px-6 py-4 text-indigo-400 font-bold">
                                R$ <?= number_format($q['preco'], 2, ',', '.'); ?>
                            </td>

                            <td class="px-6 py-4 text-gray-300">
                                <?= $q['capacidade']; ?> pessoas
                            </td>

                            <td class="px-6 py-4">
                                <a href="#"
                                class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg 
                                        shadow-md hover:shadow-indigo-500/30 transition">
                                    Reservar
                                </a>
                            </td>

                        </tr>
                        <!-- Finalização do loop while dentro do html -->
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <!-- Caso a condição cima não seja cumprida, vai ser mostrado a mensagem abaixo -->
            <?php else: ?>

            <div class="flex flex-col justify-center items-center min-h-[300px] text-center">
                <p class="text-gray-300 text-xl font-semibold">
                    Nenhum quarto disponível no momento.
                </p>

                <p class="text-gray-500 mt-2">
                    Tente novamente mais tarde ou entre em contato com a recepção.
                </p>
            </div>

            <!-- Finalização da estrutura condicional dentro do html -->
            <?php endif; ?>

        </div>
    </div>
</body>