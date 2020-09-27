<?php

require_once "src/action.php";
require_once "src/Entity/Entity.php";
require_once "src/Entity/User.php";
require_once "src/Control/ControlEscTerminalLinux.php";

$control = new ControlEscTerminalLinux();
$i = 0;
while (true)
{
    $i++;

    $a = $control->getAction();
    if(is_array($a))
    {
        print_r($a);
        unset($a);
    }

    if($i % 10000)
        echo "mobo:$i".PHP_EOL;
}


