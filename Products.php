<?php

class Products
{
    private array $produtos;

    public function __construct()
    {
        $this->produtos = [
            1 => ['id' => 1, 'nome' => 'Camiseta', 'estoque' => 10, 'preco' => 59.90],
            2 => ['id' => 2, 'nome' => 'Calça Jeans', 'estoque' => 5, 'preco' => 129.90],
            3 => ['id' => 3, 'nome' => 'Tênis', 'estoque' => 3, 'preco' => 199.90]
        ];
    }

    public function getAll(): array
    {
        return $this->produtos;
    }

    public function getById(int $id): ?array
    {
        return $this->produtos[$id] ?? null;
    }

     public function changeStock(int $id, int $quantidade): bool
    {
        if (!isset($this->produtos[$id])) {
            return false;
        }
        $this->produtos[$id]['estoque'] += $quantidade;
        return true;
    }
}

class Cart
{
    private array $cart = [];
    private Products $products;

    public function __construct(Products $products)
    {
        $this->products = $products;
    }

    public function addProduct(int $id, int $quantidade): string
    {
        $produto = $this->products->getById($id);
        if (!$produto) {
            return "Produto não encontrado.";
        }

        if ($produto['estoque'] < $quantidade) {
            return "Estoque insuficiente.";
        }

        $this->products->changeStock($id, $quantidade);

        $this->cart[$id]['id_produto'] = $id;
        $this->cart[$id]['quantidade'] = ($this->cart[$id]['quantidade'] ?? 0) + $quantidade;
        $this->cart[$id]['preco'] = $produto['preco'];

        return "Produto adicionado ao carrinho.";
    }

    public function removeProduct(int $id): string
    {
        if (!isset($this->cart[$id])) {
            return "Produto não está no carrinho.";
        }

        $this->products->changeStock($id, $this->cart[$id]['quantidade']);
        unset($this->cart[$id]);

        return "Produto removido do carrinho.";
    }

    public function listCart(): array
    {
        $resultado = [];
        $total = 0;

        foreach ($this->cart as $item) {
            $subtotal = $item['quantidade'] * $item['preco'];
            $resultado[] = [
                'id_produto' => $item['id_produto'],
                'quantidade' => $item['quantidade'],
                'preco' => $item['preco'],
                'subtotal' => $subtotal
            ];
            $total += $subtotal;
        }

        return ['itens' => $resultado, 'total' => $total];
    }

    public function aplicarDesconto(string $cupom): float
    {
        $total = $this->listCart()['total'];

        return $cupom === "DESCONTO10"
           ? $total * 0.9
           : $total;
    }
}

