<?php


class SokobanMap implements IMap
{
    private $height, $width;
    private $objects = [];
    public function __construct($mapConfig)
    {
        //Хранение положения пользователя необходимо для серверного варианта игры.
        foreach ($mapConfig["map"] as $type)
            if($mapConfig["legend"][$type]!=="empty")
                array_push($this->objects, SokobanEntityFabric::create($mapConfig["legend"][$type]));

        $this->height  = $mapConfig["dimension"]["height"];
        $this->width   = $mapConfig["dimension"]["width"];

    }

    public function render()
    {
        system("clear");

        foreach ($this->objects as $object)
            $object->render();
    }

    public function recalculation()
    {
        foreach ($this->objects as $object)
        {
            $object->run();
            $object->acceptNewCoords();
        }

    }
}