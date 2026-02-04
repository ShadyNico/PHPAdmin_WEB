<?php
use App\Middleware\Authenticated;

return [
    'GET' => [
        '/' => ['handler' => 'app/controller/home.php'],
        '/about' => ['handler' => 'app/controller/about.php'],
        '/links' => ['handler' => 'app/controller/links.php'],
        '/post' => ['handler' => 'app/controller/post.php'],
        '/products' => ['handler' => 'app/controller/products/index.php'],
        '/products/create' => [
            'handler' => 'app/controller/products/create.php',
            'middleware' => [Authenticated::class],
        ],
        '/products/edit' => [
            'handler' => 'app/controller/products/edit.php',
            'middleware' => [Authenticated::class],
        ],
    ],
    'POST' => [
        '/products' => [
            'handler' => 'app/controller/products/store.php',
            'middleware' => [Authenticated::class],
        ],
    ],
    'PUT' => [
        '/products/update' => [
            'handler' => 'app/controller/products/update.php',
            'middleware' => [Authenticated::class],
        ],
    ],
    'DELETE' => [
        '/products/destroy' => [
            'handler' => 'app/controller/products/destroy.php',
            'middleware' => [Authenticated::class],
        ],
    ],
];
