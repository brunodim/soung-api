<?php

return [
    'db' => [
        'driver' => 'pdo',
        'dsn' => 'mysql:host=localhost;dbname=test',
        'username' => 'root',
        'password' => 'root',
    ],
    'format' => 'json',
    'routes_prefix' => '',
    'routes' => [
        [
            'route' => '#^/favorite/user/([1-9]{1}[0-9]*)$#',
            'method' => 'get',
            'controller' => '\Controller\Favorite',
            'action' => 'getFavorites',
        ],
        [
            'route' => '#^/favorite/add/user/([1-9]{1}[0-9]*)/song/([1-9]{1}[0-9]*)$#',
            'method' => 'post',
            'controller' => '\Controller\Favorite',
            'action' => 'addFavorite',
        ],
        [
            'route' => '#^/favorite/delete/user/([1-9]{1}[0-9]*)/song/([1-9]{1}[0-9]*)$#',
            'method' => 'delete',
            'controller' => '\Controller\Favorite',
            'action' => 'deleteFavorite',
        ],
    ]
];