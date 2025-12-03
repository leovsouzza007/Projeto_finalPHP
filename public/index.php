<?php 

    // Inicialização da sessão caso não esteja iniciada 
    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }

?>

<?php 

    include_once("../includes/header.php");

?>

<?php 

    if (empty($_GET['page'])){
        include_once("principal.php");
    } else{
        // basename é usado para impedir o acesso a pastas indevidas.
        $page = $_GET['page'];
        $pagina = $page . ".php";

        if (file_exists($pagina)){
            include_once($pagina);
        } else{
            // Mensagem de erro caso a página não seja encontrada
            echo '<div class="min-h-[60vh] flex flex-col items-center justify-center text-center px-6">
                    <p class="text-base font-semibold text-indigo-400">404</p>
                    <h1 class="mt-4 text-3xl font-bold tracking-tight text-white sm:text-5xl">Página não encontrada</h1>
                    <p class="mt-6 text-base leading-7 text-gray-400">Desculpe, não conseguimos encontrar a página que você está procurando.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="index.php?page=principal" class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        Voltar ao início</a>
                    </div>
                </div>';
        }
    }

?>

<?php 

    include_once("../includes/footer.php")

?>