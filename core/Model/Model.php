<?php

namespace Model;


/**
 * used for any SQL method(){} or $variable that are needed 
 * and can be
 * simplified for all classes
 */
abstract class Model
{

    protected $pdo;

    /**  
     * Table is a variable used in the individual class
     * to define the sql table to 
     * send and recieve data from.
     */
    protected $table;
    function __construct()
    {
        /**
         * static function getPdo()
         * Creates a PDO instance representing 
         * a connection to a database.
         * since the function is static we 
         * can call is similiar to $GLOBALS
         * but with Class object syntax 
         * \CLASSNAME
         * :: method 
         * name
         */
        $this->pdo = \Database::getPdo();
    }


    /**
     * trouver un item par son id
     * renvoie un tableau contenant un array, ou un booleen
     * si inexistant
     * 
     * @param integer $id
     * @return array|bool
     */
    public function find(int $id)
    {
        $maRequete = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id =:id");

        $maRequete->execute(['id' => $id]);

        $item = $maRequete->fetch();

        return $item;
    }
    /**
     * retourne un tableau contenant tous les items de 
     * la table demander
     * 
     * @return array
     */
    public function findAll(): array
    {
        $resultat =  $this->pdo->query("SELECT * FROM {$this->table}");
        $item = $resultat->fetchAll();
        return $item;
    }



    /**
     * supprime un item via son ID
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $maRequete = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id =:id");

        $maRequete->execute(['id' => $id]);
    }
}
