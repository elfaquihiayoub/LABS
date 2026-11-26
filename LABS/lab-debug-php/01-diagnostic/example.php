<?php

$items = [
    ['name' => 'Carnet', 'price' => 15.0, 'quantity' => 2],
    ['name' => 'Stylo', 'price' => 5.0, 'quantity' => 3],
];

$total = 0.0;

foreach ($items as $item) {
    $total += $item['price'];
}

echo 'Total de la commande : ' . number_format($total, 2) . PHP_EOL;
