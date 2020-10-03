<?php


class User implements Entity
{
    private $isRender = false;
    private $x, $y;
    private $new_x = null, $new_y = null;
    private $control;

    public function __construct($x = 1, $y = 1)
    {
        $this->control = new ControlEscTerminalLinux();
        $this->x = $x;
        $this->y = $y;
    }

    public function checkCollapse($type, $side)
    {
        // TODO: Implement checkCollapse() method.
    }

    public function run()
    {
        $action = $this->control->getAction();

        $this->new_x = $this->x;
        $this->new_y = $this->y;

        switch ($action)
        {
            case "up": $this->new_y--; break;
            case "down": $this->new_y++; break;
            case "left": $this->new_x--; break;
            case "right": $this->new_x++; break;
        }

        return [$this->new_x, $this->new_y];
    }

    public function acceptNewCoords()
    {
        if($this->new_x!==null && $this->new_y !== null)
        {
            $this->x = $this->new_x;
            $this->y = $this->new_y;
            $this->new_x = null;
            $this->new_y = null;

            $this->isRender = true;
        }
    }

    public function needRerender()
    {
        return $this->isRender;
    }

    public function render()
    {
        echo chr(27)."[$this->y;$this->x"."f";
        echo "@";
    }
}