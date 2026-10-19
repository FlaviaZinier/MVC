<?php
require_once __DIR__ . '/../model/Produto.php';

class ProdutoController {

    /**
     * Ponto de entrada chamado pelo index.php.
     * Interpreta a requisição e decide o que fazer e qual View mostrar.
     */
    public function tratar(string $metodo, array $get, array $post): void {
        // Cadastro: processa, guarda o resultado e redireciona (evita reenvio ao dar F5).
        if ($metodo === 'POST' && ($post['acao'] ?? '') === 'cadastrar') {
            $this->processarCadastro($post);
            return;
        }

        $acao = $get['acao'] ?? 'formulario';

        if ($acao === 'listar') {
            $this->exibirLista();
        } else {
            $this->exibirFormulario();
        }
    }

    /**
     * Valida a entrada, aciona o Model e devolve o resultado
     * com o tipo da mensagem separado do texto.
     *
     * @return array{sucesso: bool, texto: string}
     */
    public function cadastrar(string $nome, string $preco): array {
        try {
            $preco = str_replace(',', '.', trim($preco));
            if (!is_numeric($preco) || !is_finite((float)$preco)) {
                throw new InvalidArgumentException("Informe um preço válido.");
            }

            $produto = new Produto($nome, (float)$preco);
            Produto::adicionar($produto);

            return ['sucesso' => true, 'texto' => "Produto cadastrado com sucesso!"];
        } catch (InvalidArgumentException $e) {
            return ['sucesso' => false, 'texto' => $e->getMessage()];
        }
    }

    public function listar(): array {
        return Produto::listar();
    }

    // ---------------------------------------------------------------
    // Ações internas: cada uma escolhe a View e entrega os dados prontos
    // ---------------------------------------------------------------

    private function processarCadastro(array $post): void {
        $resultado = $this->cadastrar($post['nome'] ?? '', $post['preco'] ?? '');

        // Mensagem de uso único, mostrada na próxima tela.
        $_SESSION['flash'] = $resultado;

        // Sucesso -> lista atualizada; erro -> volta ao formulário.
        $destino = $resultado['sucesso'] ? 'listar' : 'formulario';
        header('Location: index.php?acao=' . $destino);
        exit;
    }

    private function exibirFormulario(): void {
        $this->renderizar('form_produto');
    }

    private function exibirLista(): void {
        $this->renderizar('lista_produtos', ['produtos' => $this->listar()]);
    }

    private function renderizar(string $view, array $dados = []): void {
        // Lê e descarta a mensagem de uso único.
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);

        $mensagem = $flash['texto'] ?? '';
        $erro     = $flash !== null && !$flash['sucesso'];
        $conteudo = __DIR__ . '/../view/' . $view . '.php';

        extract($dados);
        require __DIR__ . '/../view/layout.php';
    }
}