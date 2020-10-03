<?php


class Wall implements Entity
{
    private $x, $y;

    public function __construct($x = 1, $y = 1)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function render()
    {
        echo chr(27)."[$this->y;$this->x"."f";
        echo "▓";
    }

    public function getPosition()
    {
        return [$this->x, $this->y];
    }

    public function run()
    { return false; }

    public function needRerender()
    { return false; }

    public function collapse($lvl, $matrixOffset)
    { return false; }

    public function acceptNewCoords() {}


}