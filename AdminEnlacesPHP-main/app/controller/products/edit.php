<?php

$title = "Editar Producto";
$product = $db->query('SELECT * FROM products WHERE id = :id', [
    'id' => $_GET['id'] ?? null,
])->firstOrFail();

require __DIR__ . '/../../../resources/products-edit.template.php';
