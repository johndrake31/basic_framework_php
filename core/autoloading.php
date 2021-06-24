<?php

/** 
 * once a class is instantiated spl_autoload_register 
 * takes the name and returns a callback
 * 
 */
spl_autoload_register(
    function ($nomDeClass) {
        $nomDeClassFixed = str_replace("\\", "/", $nomDeClass);
        require_once "core/$nomDeClassFixed.php";
    }
);
