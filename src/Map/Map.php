<?php


class Map
{
    private $heigth;
    private $width;
    private $objects = [];
    private $entitys = [];

    public function __construct($pathToMap)
    {
        $config = json_decode(file_get_contents($pathToMap), true);


    }

    function render()
    {

    }

}

