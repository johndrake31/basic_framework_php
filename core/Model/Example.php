<?php


namespace Model;

class Example extends Model
{

    protected $table = "mySqlTable";

    // insert here customised sql functions

    /**
     * creates a item and inserts it into the BDD
     * is another example of a custom sql method that needs
     * to be customized.
     */

    /**
     * a find all by parent id is a typical custom 
     * method that is hard to automate for all classes.
     */
    public function findAllByParent(int $parent_id)
    {
        $maRequete =  $this->pdo->prepare("SELECT * FROM `sqltableName` WHERE parent_id =:parent_id");
        $maRequete->execute(['parent_id' => $parent_id]);
        $item = $maRequete->fetchAll();
        return $item;
    }
}
