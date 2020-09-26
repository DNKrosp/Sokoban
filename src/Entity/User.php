<?php


class User implements Entity
{
    private $action;
    private $stdin;

    public function __construct($action)
    {
        $this->action = $action;
        $this->stdin = fopen('php://stdin', 'r');
    }

    public function run()
    {
        //todo: статическая библиотека на c со считыванием клавиш клавиатуры без задержки
        //$this->action->getAction($input);
    }

    public function getPosition()
    {
        // TODO: Implement getPosition() method.
    }
}