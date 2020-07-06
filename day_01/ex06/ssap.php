#!/usr/bin/php
<?PHP

unset($argv[0]);
$array = array();
foreach ($argv as $value)
{
    $split = array_filter(explode(' ', $value));
    foreach ($split as $value_2)
        $array[] = $value_2;
}
sort($array);
foreach ($array as $value)
    echo $value . "\n";

?>