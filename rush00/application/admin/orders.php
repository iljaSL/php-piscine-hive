<?php

    include("../../install.php");

    function refresh($url = NULL) {
        if (empty($url)) {
            $url = $_SERVER['REQUEST_URI'];
        }
        header("Location: ".$url);
        exit();
    }

    $resQuery = mysqli_query($link, "SELECT * FROM `order`");

    if (($row = mysqli_fetch_array($resQuery)) == NULL) {
        echo "<h2 style='color: #E6855F'>No orders</h2>";
    }

    foreach ($resQuery as $elem) {
        echo "<form action='' method='post'>";
        $i = 0;
        foreach ($elem as $value) {
            echo "<input type='text' name='$i' value='$value'>";
            $i++;
        }
        echo "<input type='submit' name='delete' value='Delete'>";
        echo "</form>";
    }

    if (isset($_POST['delete'])) {
        if ($_POST['delete'] == "Delete") {
            $id = $_POST[0];

            $resLogQuery = mysqli_query($link, "SELECT * FROM `order` WHERE id = '$id'");

            if ($resLogQuery) {
                $resQuery = mysqli_query($link, "DELETE FROM `order` WHERE id = '$id'");
                refresh();
            }
        }
    }