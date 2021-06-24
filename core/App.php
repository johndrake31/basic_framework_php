<?php

class App
{
    public static function process()
    {
        //through $_GET set the controller name and select a specific task.

        /**
         * can be predefined after it is set by $_GET
         */
        $controllerName = "myController";
        $task = "index";

        if (!empty($_GET['controller'])) {
            $controllerName = $_GET['controller'];
        }
        if (!empty($_GET['task'])) {
            $task = $_GET['task'];
        }

        // ucfirst adds an uppcase to the first letter
        $controllerName = ucfirst($controllerName);
        $controllerName = "\Controllers\\" . $controllerName;
        $controller = new $controllerName();
        $controller->$task();
    }
}
