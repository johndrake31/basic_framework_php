<?php

namespace Model;

use PDO;

class Voyage extends Model
{
    protected $modelName = \Model\Voyage::class;
    protected $table = "voyages";

    public $id;
    public $image;
    public $description;
    public $velo_id;

    /**
     * returns an array of arrays of Voyage by bike
     * @param integer $bike_id
     * @return array|boolean 
     */
    public function findAllbyVeloId(int $velo_id, $className)
    {
        $maRequete =  $this->pdo->prepare("SELECT * FROM voyages WHERE velo_id =:velo_id");
        $maRequete->execute(["velo_id" => $velo_id]);
        $items = $maRequete->fetchAll(PDO::FETCH_CLASS, $className);
        return $items;
    }

    /**
     * creates a Voyage and inserts it into the BDD
     * @param string $description
     * @param string $image
     * @param int $velo_id
     * @return void
     */
    public function insert(string $description, string $image, int $velo_id): void
    {
        $maRequete = $this->pdo->prepare("INSERT INTO `voyages` (`description`, `image`, `velo_id`) VALUES (:description, :image, :velo_id)");
        $maRequete->execute([
            'description' => $description,
            'image' => $image,
            'velo_id' => $velo_id
        ]);
    }

    /**
     * updates a voyage in the BDD
     * @param int $id
     * @param string $image
     * @param string $description
     * @return void
     */
    public function edit(int $id, string $description, string $image): void
    {

        $maRequete = $this->pdo->prepare(
            "UPDATE voyages SET description = :description, image = :image WHERE id = :id"
        );
        $maRequete->execute([
            'description' => $description,
            'image' => $image,
            'id' => $id
        ]);
    }
}
