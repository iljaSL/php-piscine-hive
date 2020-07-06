#!/usr/bin/php

<?php

if ($argc < 3)
    exit(1);
if (!file_exists($argv[1]))
    exit(1);
$file = fopen($argv[1], 'r');
if (!$file)
    exit(1);
$line = fgetcsv($file, 0, ';');
if (!in_array($argv[2], $line))
    exit(1);
$key = $argv[2];

// Set vars
$vars = $line;
$varsList = [];
foreach ($line as $var)
    $varsList[$var] = [];

while ($line = fgetcsv($file, 0, ';')) {
    foreach ($line as $index => $value)
        $varsList[$vars[$index]][$line[array_search($key, $vars)]] = $value;
}
extract($varsList);

echo "Enter your command: ";
while ($line = fgets(STDIN))
{
    try {
        eval("$line");
    } catch (Throwable $t) {
        echo "PHP Parse error: syntax error, unexpected T_STRING in [....]\n";
    }
    echo "Enter your command: ";
}
echo "\n";

?>