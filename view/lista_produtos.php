<h2>Produtos cadastrados</h2>
<p class="descricao">Confira os produtos adicionados ao sistema.</p>

<?php if (empty($produtos)): ?>
    <div class="vazio">Nenhum produto cadastrado ainda.</div>
<?php else: ?>
    <div class="tabela-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="preco">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<div class="acoes">
    <a class="botao botao-principal" href="index.php">Cadastrar outro produto</a>
</div>
