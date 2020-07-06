<?php

if ($_POST["login"] && $_POST["oldpw"] && $_POST["newpw"] && $_POST["submit"] && $_POST["submit"] == "OK" && file_exists("../private/passwd"))
{
    $user_db = unserialize(file_get_contents("../private/passwd"));
    $exist = false;
    foreach ($user_db as $key => $elem)
    {
        if ($elem["login"] === $_POST["login"] && $elem["passwd"] === hash("whirlpool", $_POST["oldpw"]))
        {
            $exist = true;
            $user_db[$key]["passwd"] = hash("whirlpool", $_POST["newpw"]);
        }
    }
    if ($exist)
    {
        file_put_contents("../private/passwd", serialize($user_db));
        echo "OK\n";
    } else {
        echo "ERROR\n";;
    }
} else {
    echo "ERROR\n";
}

?>