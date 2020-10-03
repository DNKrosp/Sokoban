<?php

system("clear");
system("stty -icanon -echo");

$stdin = fopen('php://stdin', 'w');

$i = 1;
while ($i < 20)
{
    echo chr(27)."[$i;2f";
    $i++;
    echo "$i";
    sleep(1);
}