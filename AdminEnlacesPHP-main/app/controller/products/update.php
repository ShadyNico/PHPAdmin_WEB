<?php

$validator = Validator::make($_POST, [
    'id' => 'required|numeric',
    'name' => 'required|min:3|max:255',
    'price' => 'required|numeric',
    'sku' => 'required|min:3|max:100',
]);

$validator->validate();

$db->query(
    'UPDATE products SET name = :name, description = :description, price = :price, sku = :sku WHERE id = :id',
    [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'description' => $_POST['description'] ?? null,
        'price' => $_POST['price'],
        'sku' => $_POST['sku'],
    ]
);

SessionManager::flash('alert', 'Producto actualizado correctamente.');

redirect('/products/edit?id=' . $_POST['id']);
