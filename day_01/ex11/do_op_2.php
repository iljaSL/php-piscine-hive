#!/usr/bin/php
<?php
if ($argc != 2)
{
    echo "Incorrect Parameters\n";
}
else
{
    $op = explode(";", "+;-;*;/;%");
	$test = sscanf($argv[1], "%d %c %d %s");
    if (is_numeric($test[0]) && $test[1] && is_numeric($test[2]) && !$test[3])
    {
		if ($test[2] == 0 && ($test[1] == '%' || $test[1] == '/'))
		{
			echo "denominator is 0\n";
			exit (1);
		}
		if($test[1] == '*')
            $result = $test[0] * $test[2];
        else if($test[1] == '-')
            $result = $test[0] - $test[2];
        else if($test[1] == '/')
            $result = $test[0] / $test[2];
        else if($test[1] == '%')
            $result = $test[0] % $test[2];
        else if($test[1] == '+')
			$result = $test[0] + $test[2];
		else {
			echo "Syntax Error\n";
			exit (1);
		}
        echo $result;
        echo "\n";
    }
    else
    {
        echo "Syntax Error\n";
    }
}