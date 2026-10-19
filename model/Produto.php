<?php
class Produto {
    public string $nome;
    public float $preco;

    public function __construct(string $nome, float $preco) {
        $nome = trim($nome);
        if ($nome === '') throw new InvalidArgumentException("Informe o nome do produto.");
        if (!is_finite($preco) || $preco < 0) throw new InvalidArgumentException("Informe um preço válido.");
        $this->nome = $nome;
        $this->preco = $preco;
    }

    public static function adicionar(Produto $produto): void {
        $_SESSION['produtos'][] = ['nome' => $produto->nome, 'preco' => $produto->preco];
    }

    public static function listar(): array {
        return $_SESSION['produtos'] ?? [];
    }
}
