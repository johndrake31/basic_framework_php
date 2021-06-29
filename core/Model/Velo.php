<?php

namespace Model;

class Velo extends Model
{
    protected $modelName = \Model\Velo::class;
    protected $table = "bikes";

    public $id;
    public $image;
    public $modele;
}
