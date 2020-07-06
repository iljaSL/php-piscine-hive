#!/usr/bin/php
<?PHP

$str = fopen("php://stdin", "r");
echo  "Enter a number: ";
while ($tmp = fgets($str))
{
    $tmp = str_replace("\n", "", $tmp);
    if (is_numeric($tmp))
    {
        if ($tmp % 2 == 0)
            echo "The number " . $tmp . " is even\n";
        else
            echo "The number " . $tmp . " is odd\n";
    }
    else
        echo "'" . $tmp . "' is not a number\n";
    echo "Enter a number: ";
}
echo "\n";
fclose($str);

?>