<?php

namespace Controllers;


class Voyage extends Controller
{
    protected $modelName = \Model\Voyage::class;


    /**
     * creates a voyage and calls on voyage 
     * model to insert into the BDD
     * then redirects to current velo based on id.
     * @param none
     * @return void
     */
    public function create(): void
    {

        $description = null;
        $image = null;
        $velo_id = null;

        if (!empty($_POST['description']) && $_POST['description'] != "") {
            $description = htmlspecialchars($_POST['description']);
        }
        if (!empty($_POST['image'])) {
            $image = htmlspecialchars($_POST['image']);
        }
        if (!empty($_POST['velo_id']) &&  ctype_digit($_POST['velo_id'])) {
            $velo_id = $_POST['velo_id'];
        }

        if (!$description || !$image || !$velo_id) {
            die("formulaire mal rempli");
        }

        $this->model->insert($description, $image, $velo_id);

        \Http::redirect("index.php?controller=velo&task=show&id=$velo_id");
    }

    /**
     * updates a voyage and calls on voyage 
     * model to update into the BDD
     * then redirects to current velo based on id.
     * @param none
     * @return void
     */
    public function update()
    {

        $id = null;
        $velo_id = null;
        $description = null;
        $image = null;

        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }
        if (!empty($_POST['velo_id']) && ctype_digit($_POST['velo_id'])) {
            $velo_id = $_POST['velo_id'];
        }
        if (!empty($_POST['image']) && $_POST['image'] != "") {
            $image = htmlspecialchars($_POST['image']);
        }

        if (!empty($_POST['description'])) {
            $description = htmlspecialchars($_POST['description']);
        }
        if (!$id || !$image || !$description) {
            die("formulaire mal rempli $id, $image, $description");
        }

        $voyage_to_edit = $this->model->find($id, $this->modelName);

        if (!$voyage_to_edit) {
            die("Does Not Exist");
        }

        $this->model->edit($id, $description, $image);

        \Http::redirect("index.php?controller=velo&task=show&id=$velo_id");
    }

    /**
     * 
     * Deletes a voyage by its id and then redirects to the the 
     * show controller and brings up the last Velo selected.
     * @param none
     * @return void
     */
    public function suppr()
    {
        $voyage_id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $voyage_id = $_GET['id'];
        }

        if (!$voyage_id) {
            die('please enter a proper number  in the url for this to delete.');
        }


        $voyage_to_delete = $this->model->find($voyage_id, $this->modelName);
        $velo_id = $voyage_to_delete->velo_id;

        if (!$voyage_to_delete) {
            die("Does Not Exist");
        }

        $this->model->delete($voyage_id);

        \Http::redirect("index.php?controller=velo&task=show&id=$velo_id");
    }
}
