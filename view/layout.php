<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <header class="topo">
            <div class="marca" aria-hidden="true">▦</div>
            <h1>Sistema de Produtos</h1>
            <p class="subtitulo">Organize e consulte seus produtos em um só lugar.</p>
        </header>

        <section class="card">
            <?php if ($mensagem !== ''): ?>
                <p class="mensagem<?= $erro ? ' erro' : '' ?>" role="status">
                    <?= htmlspecialchars(($erro ? 'Erro: ' : '') . $mensagem, ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>

            <?php require $conteudo; ?>
        </section>

        <footer class="rodape">Sistema de cadastro de produtos • Arquitetura MVC</footer>
    </main>
</body>
</html>
