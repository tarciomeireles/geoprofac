<?php
// Iniciando SESSION
session_start();

// Require arquivo autoloader
require __DIR__ . '/autoloader.php';

use Lib\Config; // o mesmo que use use Lib\Config as Config;


// Carregando configuracoes
Config::carregar();