<?php


class Run
{
    static function loadingComponents()
    {
        require_once "src/action.php";
        require_once "src/Entity/Entity.php";
        require_once "src/Entity/User.php";
        require_once "src/Control/ControlEscTerminalLinux.php";
    }

    static function start() {
        self::loadingComponents();

        $control = new ControlEscTerminalLinux();

    }
}

Run::start();