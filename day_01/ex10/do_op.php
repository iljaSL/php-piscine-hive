#!/usr/bin/php
<?PHP

function do_op($nbr, $op, $nbr2)
{
    switch($op)
    {
        case("*"):
            echo $nbr * $nbr2;
        break;
        case("+"):
            echo $nbr + $nbr2;
        break;
        case("-"):
            echo $nbr - $nbr2;
        break;
        case("/"):
            echo $nbr / $nbr2;
        break;
        case("%"):
            echo $nbr % $nbr2;
        break;
    }
}

if ($argc != 4)
{
    echo "Incorrect Parameters\n";
    exit();
}

$nbr = intval($argv[1]);
$op = trim($argv[2]);
$nbr2 = intval($argv[3]);
if ($nbr2 == 0 && $op == ('%' || '/'))
    exit;
$res = do_op($nbr, $op, $nbr2);
echo $res . "\n";

?>