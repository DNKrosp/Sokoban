<?php

require_once "src/action.php";

$systemOfAction = new Action("./config/keys.json");

echo $systemOfAction->getAction("w").PHP_EOL;
echo $systemOfAction->getAction("a").PHP_EOL;
echo $systemOfAction->getAction("s").PHP_EOL;
echo $systemOfAction->getAction("d").PHP_EOL;
echo $systemOfAction->getAction("esc").PHP_EOL;
echo $systemOfAction->getAction("k").PHP_EOL;
echo $systemOfAction->getAction("l").PHP_EOL;

