<?php


class Box implements Entity
{
    private $x, $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function run()
    {
        // TODO: Implement run() method.
    }

    public function render()
    {
        echo chr(27)."[$this->y;$this->x"."f";
        echo "🛢";
    }

    public function needRerender()
    {
        // TODO: Implement needRerender() method.
    }

    public function collapse($lvl, $matrixOffset)
    {
        // TODO: Implement collapse() method.
    }

    public function acceptNewCoords()
    {
        // TODO: Implement acceptNewCoords() method.
    }

    public function getPosition()
    {
        // TODO: Implement getPosition() method.
    }
}