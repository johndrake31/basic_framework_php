<?php

namespace Controllers;


class Velo extends Controller
{
    protected $modelName = \Model\Velo::class;

    /**
     * 
     * Renders a page of bikes listed in the BDD
     * @param none
     * @return void
     */
    public function index()
    {
        //on recupère tous les Velos
        $velos = $this->model->findAll($this->modelName);

        //on fixe le titre de la page
        $titreDeLaPage = "Velos";

        //on affiche
        \Rendering::render(
            "velos/velos",
            compact('velos', 'titreDeLaPage')
        );
    }


    /**
     * 
     * Renders a page with a bike and lists all voyages 
     * associated with it
     * in the BDD
     * @param none
     * @return void
     */
    public function show()
    {
        if (!empty($_GET['id']) && ctype_digit(($_GET['id']))) {

            $velo_id = null;

            if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
                $velo_id = $_GET['id'];
            }
            if (!$velo_id) {
                die('please enter a number in the url for this to work.');
            }

            // Find a velo by ID
            $velo = $this->model->find($velo_id, $this->modelName);



            // Voyages SECTION

            $modelVoyage = new \Model\Voyage();


            $voyages = $modelVoyage->findAllbyVeloId($velo_id, \Model\Voyage::class);


            // SECTION TO RENDER

            $titreDeLaPage = $velo->modele;

            \Rendering::render(
                "velos/velo",
                compact("velo", "titreDeLaPage", "voyages")
            );
        }
    }

    /**
     * function deletes a velo by id
     * and redirects to the index page.
     * @param none
     * @return none
     */
    public function suppr(): void
    {
        $velo_id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $velo_id = $_GET['id'];
        }
        if (!$velo_id) {
            die('please enter a proper number  in the url for this to delete.');
        }


        $velo_to_delete = $this->model->find($velo_id, \Model\Velo::class);

        if (!$velo_to_delete) {
            die("Does Not Exist");
        }

        $this->model->delete($velo_id);

        \Http::redirect("index.php");
    }
}
