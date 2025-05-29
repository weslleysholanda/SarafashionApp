<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Carregue as configurações iniciais da aplicação
require_once('config/config.php');


$caminho = new Routes();
$caminho->executar();