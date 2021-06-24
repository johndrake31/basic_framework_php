<?php

namespace Controllers;


class Example extends Controller
{

    /**
     * $modelName has to be set if it extends Controller.
     * \Model\Example::class is a typage and a 
     * syntax special to php.
     * A string also works '\Model\Example' but 
     * the other one is more precise and will have more uses 
     * as we continue into the course.
     */
    protected $modelName = \Model\Example::class;


    /**
     * afficher l'accueil du site
     * 
     */
    public function index()
    {
        //on recupère tous les examples
        $example = $this->model->findAll();

        //Set Page Title to desired String
        $titreDeLaPage = "myPageTitle";

        //Render takes a template folder name and file name to choose what to render
        \Rendering::render(
            "examples/example",
            // Campact searches current page for variables of the same name and then injects them into the template which is later extracted. 
            compact('cakes', 'titreDeLaPage')
        );
    }
}
