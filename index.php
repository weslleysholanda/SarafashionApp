<?php
//Carregue as configurações iniciais da aplicação
require_once('config/config.php');


$caminho = new Routes();
$caminho->executar();