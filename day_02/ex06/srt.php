#!/usr/bin/php

<?php

if ($argc != 2 || file_exists($argv[1]) === false || ($file = file_get_contents($argv[1])) === false)
    exit (1);

$res = preg_match_all("/(\n*\d)\n(\d\d:\d\d:\d\d,\d\d\d --> \d\d:\d\d:\d\d,\d\d\d)\n(\w*)/", $file, $matches, PREG_SET_ORDER);
if ($res == false)
{
    echo ($res === false) ? "An error occured" : "Wrong file format" . PHP_EOL;
    exit (2);
}

function compare($a, $b)
{
    if ($a[2] == $b[2])
        return 0;
    return ($a[2] < $b[2]) ? -1 : 1;
}
usort($matches, "compare");

foreach ($matches as $key => $elem)
{
    if ($key)
        echo PHP_EOL;
    echo ($key + 1) . PHP_EOL;
    echo $elem[2] . PHP_EOL;
    echo $elem[3] . PHP_EOL;
}

?>