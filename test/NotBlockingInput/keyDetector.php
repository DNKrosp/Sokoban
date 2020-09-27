<?php
system("clear");
system("stty -icanon -echo");
$stdin = fopen('php://stdin', 'r');
stream_set_blocking($stdin, 0);

$keys = [];

$exit = false;
while (!$exit)
{
    $value = fgetc($stdin);
    $key = ord($value);

    if($key !== 0)
    {
        $keys[$key]=$value;
        echo "$key:$value".PHP_EOL;
    }

    if($key === 69)
        $exit = true;
}

$fw = fopen("./keys.json", "w");
fwrite($fw, json_encode($keys));
fclose($fw);