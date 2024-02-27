<?php

return [
    'host' => 'localhost',
    'dbname' => 'blog',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'options' =>[
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
];