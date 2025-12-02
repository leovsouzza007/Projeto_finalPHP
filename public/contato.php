
    <div class="flex min-h-full flex-col justify-center items-center px-6 py-20 lg:px-8 mt-20">
        <div class="w-full sm:max-w-[750px] bg-gray-900/80 backdrop-blur-sm rounded-2xl shadow-2xl shadow-indigo-500/20 border border-white/10 p-10">
            <div class="text-center mb-10">
                <img class="mx-auto h-14 w-auto transition-transform hover:scale-105 duration-200" 
                     src="../assets/img/hp.svg" alt="Hotel PHP Logo">
                <h2 class="mt-6 text-3xl font-bold tracking-tight text-white">
                    Entre em Contato
                </h2>
                <p class="mt-3 text-gray-300 text-sm">
                    Preencha o formulário abaixo e retornaremos o mais rápido possível.
                </p>
            </div>

            <form action="contato_sucesso.php" method="POST" class="space-y-6">

                <div>
                    <label for="nome" class="block text-sm/6 font-medium text-gray-200">Nome</label>
                    <div class="mt-2 relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                 class="size-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                      d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        <input type="text" name="nome" id="nome" required
                               class="block w-full rounded-lg bg-white/5 pl-10 pr-3 py-2 text-base text-white
                                      outline outline-1 -outline-offset-1 outline-white/10 
                                      placeholder:text-gray-500 focus:outline focus:outline-2
                                      focus:-outline-offset-2 focus:outline-indigo-500
                                      sm:text-sm/6 transition duration-200">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-200">Email</label>
                    <div class="mt-2 relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                 class="size-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                      d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <input type="email" name="email" id="email" required
                               class="block w-full rounded-lg bg-white/5 pl-10 pr-3 py-2 text-base text-white
                                      outline outline-1 -outline-offset-1 outline-white/10 
                                      placeholder:text-gray-500 focus:outline focus:outline-2
                                      focus:-outline-offset-2 focus:outline-indigo-500
                                      sm:text-sm/6 transition duration-200">
                    </div>
                </div>

                <div>
                    <label for="mensagem" class="block text-sm/6 font-medium text-gray-200">Mensagem</label>
                    <div class="mt-2 relative">
                        <textarea name="mensagem" id="mensagem" rows="5" required
                                  class="block w-full rounded-lg bg-white/5 pl-3 pr-3 py-2 text-base text-white
                                         outline outline-1 -outline-offset-1 outline-white/10 
                                         placeholder:text-gray-500 focus:outline focus:outline-2
                                         focus:-outline-offset-2 focus:outline-indigo-500
                                         sm:text-sm/6 transition duration-200 resize-none"></textarea>
                    </div>
                </div>

                <button type="submit"
                        class="flex w-full justify-center rounded-lg bg-indigo-600 px-3 py-2.5
                               text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 
                               hover:shadow-indigo-500/30 focus-visible:outline 
                               focus-visible:outline-2 focus-visible:outline-offset-2 
                               focus-visible:outline-indigo-600 transition-all duration-200">
                    Enviar Mensagem
                </button>

            </form>
        </div>
    </div>