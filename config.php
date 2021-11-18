<?php
    //datos acceso a BBDD
    define('APP', __DIR__);
    $dbname = $_ENV['DB_NAME'];
    $dbuser = $_ENV['DB_USER'];
    $dbpasswd = $_ENV['DB_PASSWD'];
    $dbhost = $_ENV['DB_HOST'];
    $dsn = 'mysql:host='.$dbhost.';dbname='.$dbname.';charset=utf8mb4';