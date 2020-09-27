<?php


class User implements Entity
{
    private $action;
    private $stdin;

    public function __construct($action, $inputStream)
    {
        $this->action = $action;
        $this->stdin = $inputStream;
    }

    public function run()
    {
        $key = ord(fgetc($stdin));

        if (27 === $key) {
            fgetc($stdin);
            $key = ord(fgetc($stdin));
        }

        switch ($key) {
            case 65: case ord('8'): echo "up";    break;
            case 66: case ord('2'): echo "down";  break;
            case 68: case ord('4'): echo "left";  break;
            case 67: case ord('6'): echo "right"; break;
            case ord('w'): echo "up";    break;
            case ord('s'): echo "down";  break;
            case ord('a'): echo "left";  break;
            case ord('d'): echo "right"; break;
        }
    }

    public function getPosition()
    {
        // TODO: Implement getPosition() method.
    }
}