<?php

$validator = Validator::make($_POST, [
    'name' => 'required|min:3|max:255',
    'price' => 'required|numeric',
    'sku' => 'required|min:3|max:100',
]);

$validator->validate();

$db->query(
    'INSERT INTO products(name, description, price, sku) VALUES(:name, :description, :price, :sku)',
    [
        'name' => $_POST['name'],
        'description' => $_POST['description'] ?? null,
        'price' => $_POST['price'],
        'sku' => $_POST['sku'],
    ]
);

SessionManager::flash('alert', 'Producto creado correctamente.');

redirect('/products');
