<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

define('BASE_URL', 'https://sarafashionapp.webdevsolutions.com.br/');

define('BASE_URL_SITE', 'https://sarafashion.webdevsolutions.com.br/');

// Definir a api base.

define('BASE_API','https://sarafashion.webdevsolutions.com.br/api/');

//enviar email
define("HOST_EMAIL", "smtp.hostinger.com");
define("PORT_EMAIL", "465");
define("USER_EMAIL", "devweb@webdevsolutions.com.br");
define("PASS_EMAIL", "21566647aA#");


spl_autoload_register(function ($class){
    if(file_exists('app/controllers/'.$class.'.php')){
        require_once 'app/controllers/'.$class.'.php';
    }

    if(file_exists('routes/'.$class.'.php')){
        require_once 'routes/'.$class.'.php';
    }
});