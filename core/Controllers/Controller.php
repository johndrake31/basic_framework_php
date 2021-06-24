<?php

/**
 *  namespace is a way of declaring a 
 * family type to differentiate between class families 
 * of the same name.
 */

namespace Controllers;


/**
 * "abstract class" a class that is passed 
 * through inheritiance but never called 
 * as an individual class.
 */
abstract class Controller
{
    /** empty variable to later 
     * store an instaince 
     * 
     */
    protected $model;
    protected $modelName;

    /**
     * __construct on init of the class
     * creates an instaince of the class to be 
     * use in the controller.
     */
    public function __construct()
    {
        $this->model = new $this->modelName();
    }
}
