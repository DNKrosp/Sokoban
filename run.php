<?php

//включение неблокирующего ввода в терминале
include "lib/cutils/bin/Debug/libcutils.a";

require_once "src/action.php";
require_once "src/Entity/Entity.php";
require_once "src/Entity/User.php";

$systemOfAction = new Action("./config/keys.json");
$player0 = new User($systemOfAction);
$player0->run();


//echo $systemOfAction->getAction("w").PHP_EOL;
//echo $systemOfAction->getAction("a").PHP_EOL;
//echo $systemOfAction->getAction("s").PHP_EOL;
//echo $systemOfAction->getAction("d").PHP_EOL;
//echo $systemOfAction->getAction("esc").PHP_EOL;
//echo $systemOfAction->getAction("k").PHP_EOL;
//echo $systemOfAction->getAction("l").PHP_EOL;


