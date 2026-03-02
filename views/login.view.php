<div class="mt-6 grid grid-cols-2 gap-2">
    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Login</h1>
        <form class="p-4 space-y-4" method="POST">
            <?php if ($validacoes = flash()->get('validacoes_login')): ?>
                <div class="border-red-800 bg-red-900 text-red-400 px-4 py-1 rounded-md border-2">
                    <ul>
                        <li>dê uma olhada nos erros abaixo</li>
                        <?php foreach ($validacoes as $validacao): ?>
                            <li><?= $validacao ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1 text-xl" for="">Email</label>
                <input
                    type="text"
                    name="email"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 focus:outline-none px-2 py-1"
                    placeholder="Email">
            </div>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1 text-xl" for="">Senha</label>
                <input
                    type="password"
                    name="senha"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 focus:outline-none px-2 py-1"
                    placeholder="Senha">
            </div>
            <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-700">Logar</button>
        </form>

    </div>
    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Registro</h1>
        <form class="p-4 space-y-4" method="POST" action="/registrar">
            <?php if ($validacoes = flash()->get('validacoes_registrar')): ?>
                <div class="border-red-800 bg-red-900 text-red-400 px-4 py-1 rounded-md border-2">
                    <ul>
                        <li>dê uma olhada nos erros abaixo</li>
                        <?php foreach ($validacoes as $validacao): ?>
                            <li><?= $validacao ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1 text-xl" for="">Nome</label>
                <input
                    type="text"
                    name="nome"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 focus:outline-none px-2 py-1"
                    placeholder="Nome">
            </div>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1 text-xl" for="">Email</label>
                <input
                    type="text"
                    name="email"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 focus:outline-none px-2 py-1"
                    placeholder="Email">
            </div>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1 text-xl" for="">Confirme seu Email</label>
                <input
                    type="email"
                    name="email_confirmacao"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 focus:outline-none px-2 py-1"
                    placeholder="Confirmação do email">
            </div>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1 text-xl" for="">Senha</label>
                <input
                    type="password"
                    name="senha"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 focus:outline-none px-2 py-1"
                    placeholder="Senha">
            </div>
            <button
                type="reset"
                class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-700">Cancelar
            </button>
            <button
                type="submit"
                class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-700">Cadastrar
            </button>
        </form>

    </div>

</div>