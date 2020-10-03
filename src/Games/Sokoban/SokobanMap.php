<?php


class SokobanMap implements IMap
{
    private $height, $width;
    private $objects = [];
    public function __construct($mapConfig)
    {
        $this->height  = $mapConfig["dimension"]["height"];
        $this->width   = $mapConfig["dimension"]["width"];

        for ($y = 1; $y <= $this->height; $y++)
            for ($x = 1; $x <= $this->width; $x++)
            {
                $position = ((($y-1)*$this->width) + $x) - 1;
                $type = $mapConfig["legend"][$mapConfig["map"][$position]];
                if($type!=="empty")
                    array_push($this->objects, SokobanEntityFabric::create($type, $x, $y));
            }

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
            $coords = $object->run();
            if($coords!==false)
            {
                $object->acceptNewCoords(
                    $this->callCollapseObject(
                        $coords,
                        $this->matrixDiff($object->getPosition, $coords)
                    )
                );
            }

        }

    }

    private function callCollapseObject($position, $matrixOffset)
    {
        if ($position !== false)
            foreach ($this->objects as $object)
                if ($object->getPosition() === $position)
                    if($object->collapse(0, $matrixOffset))
                        $this->callCollapseObject($object->run(), $matrixOffset);
                    else
                        return false;

        return true;
    }


    private function matrixDiff($matrixStart, $matrixFinish)
    {
        $offsetMatrix = [];
        for($i = 0; $i<=count($matrixStart); $i++)
            array_push($offsetMatrix,$matrixStart[$i] - $matrixFinish[$i]);

            return $offsetMatrix;
    }
}