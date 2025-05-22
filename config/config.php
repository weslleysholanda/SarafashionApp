<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

define('BASE_URL', 'https://sarafashionapp.webdevsolutions.com.br/');

// Definir a api base.


spl_autoload_register(function ($class){
    if(file_exists('app/controllers/'.$class.'.php')){
        require_once 'app/controllers/'.$class.'.php';
    }

    if(file_exists('routes/'.$class.'.php')){
        require_once 'routes/'.$class.'.php';
    }
});