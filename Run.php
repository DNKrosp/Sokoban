<?php


class Run
{
    static function loadingComponents()
    {
        require_once("src/Control/ControlEscTerminalLinux.php");
        require_once("src/Entity.php");
        require_once("src/EntityFabric.php");
        require_once("src/IMap.php");


        require_once("src/Games/Sokoban/SokobanMap.php");
        require_once("src/Games/Sokoban/SokobanEntityFabric.php");
        require_once("src/Games/Sokoban/User.php");
        require_once("src/Games/Sokoban/Wall.php");
        require_once("src/Games/Sokoban/Box.php");


    }

    static function start() {
        self::loadingComponents();
        system("clear");
        system("stty -icanon -echo");
//        $control = new ControlEscTerminalLinux();
//        while (1)
//            print_r($control->getAction());

        $mapTestJson = json_decode(file_get_contents("config/Maps/Sokoban/test.json"),true);
        $map = new SokobanMap($mapTestJson);

        //первый вывод
        $map->render();


        while (true)
        {
            $map->recalculation();
            $map->render();
        }

    }
}

Run::start();