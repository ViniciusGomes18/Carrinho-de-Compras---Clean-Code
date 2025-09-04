<?php

require_once "Products.php";

$produtos = new Products();
$carrinho = new Cart($produtos);

echo $carrinho->addProduct(1, 2) . "<br>";

echo $carrinho->addProduct(3, 10) . "<br>";

echo $carrinho->removeProduct(1) . "<br>";

print_r($carrinho->listCart());

echo "Total com desconto: " . $carrinho->aplicarDesconto("DESCONTO10") . "<br>";