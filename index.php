<?php

// INDEX is the entry point to the page and the path starts here.

// displays error when things go wrong
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



//autoloading takes any class instance and runs a callback on it.
//this call back returns: 
//require_once "core/$nomDeClassFixed.php"; which gets the needed controller file path for us
require_once "core/autoloading.php";

//APP is a class with with a static function "process"called with  :: object syntaxs.
\App::process();
