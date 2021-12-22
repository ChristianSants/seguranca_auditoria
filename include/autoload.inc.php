<?php

    spl_autoload_register(function($class){
        require_once $_SERVER['DOCUMENT_ROOT'] .'/seguranca_auditoria/class/'. $class .'.php'; 
    });
    
?>