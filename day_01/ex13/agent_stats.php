#!/usr/bin/php
<?php

if ($argc != 2)
    return (0);

$arr = file('php://stdin');
unset($arr[0]);

if ($argv[1] == "average")
{
    $grade = 0;
    $cnt = 0;
    foreach ($arr as $elem)
    {
        $tmp = explode(";", $elem);
        if ($tmp[1] != '' && $tmp[2] != "moulinette")
        {
            $grade += $tmp[1];
            $cnt++;
        }
    }
    if ($cnt > 0)
        echo $grade / $cnt . "\n";
}

if ($argv[1] == "average_user")
{
    asort($arr);
    $cnt = 0;
    foreach ($arr as $elem)
    {
        $tmp = explode(";", $elem);
        $list[$tmp[0]] = 0;
    }
    foreach ($list as $user => $key)
    {
        $cnt = 0;
        $grade = 0;
        foreach ($arr as $elem)
        {
            $tmp = explode(";", $elem);
            if ($tmp[1] != '' && $tmp[0] == $user && $tmp[2] != "moulinette")
            {
                $grade += $tmp[1];
                $cnt++;
            }
        }
        if ($cnt > 0)
            echo $user . ":" . ($grade / $cnt) . "\n";
    }
}

if ($argv[1] == "moulinette_variance")
{
    asort($arr);
    $cnt = 0;
    foreach ($arr as $elem)
    {
        $tmp = explode(";", $elem);
        $list[$tmp[0]] = 0;
    }
    foreach ($list as $user => $key)
    {
        $cnt = 0;
        $grade = 0;
        $mouli = 0;
        foreach ($arr as $elem)
        {
            $tmp = explode(";", $elem);
            if ($tmp[1] != '' && $tmp[0] == $user && $tmp[2] == "moulinette")
                $mouli = $tmp[1];
        }
        foreach ($arr as $elem)
        {
            $tmp = explode(";", $elem);
            if ($tmp[1] != '' && $tmp[0] == $user && $tmp[2] != "moulinette")
            {
                $grade += $tmp[1] - $mouli;
                $cnt++;
            }
        }
        if ($cnt > 0)
            echo $user . ":" . ($grade / $cnt) . "\n";
    }
}

?>