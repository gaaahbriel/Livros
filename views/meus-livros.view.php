<h1 class="mt-6 font-bold text-lg">Meus livros</h1>

<div class="grid grid-cols-4 gap-4">
    <div class="col-span-3 flex flex-col gap-4">
        <?php foreach ($livros as $livro){
            require 'partials/_livro.php';
        } ?>
    </div>
    <div>
        <div class="border border-stone-700 rounded">
            <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Cadastre um novo livro</h1>
            <form class="p-4 space-y-4" method="POST" action="/livro-criar">
                <?php if ($validacoes = flash()->get('validacoes')): ?>
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
                    <label class="text-stone-400 mb-1 text-xl" for="">Título</label>
                    <input type="text" name="titulo" class="border-stone-800 border-2 rounded-md bg-stone-900 focus:outline-none px-2 py-1" placeholder="Título do livro">
                </div>
                <div class="flex flex-col">
                    <label class="text-stone-400 mb-1 text-xl" for="">Autor</label>
                    <input type="text" name="autor" class="border-stone-800 border-2 rounded-md bg-stone-900 focus:outline-none px-2 py-1" placeholder="Autor do lívro">
                </div>
                <div class="flex flex-col">
                    <label class="text-stone-400 mb-1 text-xl" for="">Descrição</label>
                    <textarea type="text" name="descricao" class="border-stone-800 border-2 rounded-md bg-stone-900 focus:outline-none px-2 py-1" placeholder="Descrição do livro"></textarea>
                </div>

                <div class="flex flex-col">
                    <label class="text-stone-400 mb-1 text-xl" for="">Ano de lançamento</label>
                    <select name="ano_de_lancamento" class="border-stone-800 border-2 rounded-md bg-stone-900 focus:outline-none px-2 py-1">
                        <?php foreach (range(1800, date('Y')) as $ano): ?>
                            <option value="<?= $ano ?>"><?= $ano ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-700">
                    Salvar
                </button>
            </form>
        </div>
    </div>
</div>