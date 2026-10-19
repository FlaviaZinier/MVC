<h2>Cadastrar produto</h2>
<p class="descricao">Preencha os campos abaixo para adicionar um produto à lista.</p>

<form method="POST" action="index.php">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="campo">
        <label for="nome">Nome do produto</label>
        <input type="text" id="nome" name="nome" placeholder="Ex.: Caderno universitário" required>
    </div>

    <div class="campo">
        <label for="preco">Preço (R$)</label>
        <input type="number" id="preco" name="preco" min="0" step="0.01" placeholder="Ex.: 19.90" required>
    </div>

    <div class="acoes">
        <button class="botao botao-principal" type="submit">Cadastrar produto</button>
        <a class="botao botao-secundario" href="index.php?acao=listar">Ver produtos cadastrados</a>
    </div>
</form>
