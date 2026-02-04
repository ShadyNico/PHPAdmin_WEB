<?php

$validator = Validator::make($_POST, [
    'id' => 'required|numeric',
]);

$validator->validate();

$db->query('DELETE FROM products WHERE id = :id', [
    'id' => $_POST['id'],
]);

SessionManager::flash('alert', 'Producto eliminado correctamente.');

redirect('/products');
