<?php
return [
    'GET' => [
        '/' => ['handler' => 'app/controller/home.php'],
        '/about' => ['handler' => 'app/controller/about.php'],
        '/links' => ['handler' => 'app/controller/links.php'],
        '/post' => ['handler' => 'app/controller/post.php'],
        '/products' => ['handler' => 'app/controller/products/index.php'],
        '/products/create' => ['handler' => 'app/controller/products/create.php'],
        '/products/edit' => ['handler' => 'app/controller/products/edit.php'],
    ],
    'POST' => [
        '/products' => ['handler' => 'app/controller/products/store.php'],
    ],
    'PUT' => [
        '/products/update' => ['handler' => 'app/controller/products/update.php'],
    ],
    'DELETE' => [
        '/products/destroy' => ['handler' => 'app/controller/products/destroy.php'],
    ],
];
