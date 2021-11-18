<?php

//establecer errores
//init_set('display_errors', 'On');
session_start();
require 'config.php';
require 'src/router.php';

$controller = getRoute();

//calls controller
require APP . '/src/controllers/' . $controller . '.php';