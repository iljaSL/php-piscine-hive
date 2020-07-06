<?php
    include("../../install.php");
    function refresh($url = NULL) {
        if(empty($url)) {
            $url = $_SERVER['REQUEST_URI'];
        }
        header("Location: ".$url);
        exit();
    }

    if ($_GET['page'] == "all") {
        $resQuery = mysqli_query($link, "SELECT * FROM `items`");
    }
    if ($_GET['page'] == "jacket") {
        $resQuery = mysqli_query($link, "SELECT * FROM `items` WHERE `type` = 'jacket'");
    }
    if ($_GET['page'] == "shirts") {
        $resQuery = mysqli_query($link, "SELECT * FROM `items` WHERE `type`='shirts'");
    }
    if ($_GET['page'] == "hoodies") {
        $resQuery = mysqli_query($link, "SELECT * FROM `items` WHERE `type`='hoodies'");
    }
    if ($_GET['page'] == "shoes") {
        $resQuery = mysqli_query($link, "SELECT * FROM `items` WHERE `type`='shoes'");
    }
    if ($_GET['page'] == "longsleve") {
        $resQuery = mysqli_query($link, "SELECT * FROM `items` WHERE typeof='longsleve'");
    }
    if ($_GET['page'] == "casual") {
        $resQuery = mysqli_query($link, "SELECT * FROM `items` WHERE typeof='casual'");
    }
    if ($_GET['page'] == "formal") {
        $resQuery = mysqli_query($link, "SELECT * FROM `items` WHERE typeof='formal'");
    }
    if ($_GET['page'] == "crewneck") {
        $resQuery = mysqli_query($link, "SELECT * FROM `items` WHERE typeof='crewneck'");
    }
    if ($_GET['page'] == "zip") {
        $resQuery = mysqli_query($link, "SELECT * FROM `items` WHERE typeof='zip'");
    }
    if ($_GET['page'] == "coats") {
        $resQuery = mysqli_query($link, "SELECT * FROM `items` WHERE typeof='coats'");
    }
    if ($_GET['page'] == "parkas") {
        $resQuery = mysqli_query($link, "SELECT * FROM `items` WHERE typeof='parkas'");
    }
    if ($_GET['page'] == "sportshoe") {
        $resQuery = mysqli_query($link, "SELECT * FROM `items` WHERE typeof='sportshoe'");
    }
    if ($_GET['page'] == "casualshoe") {
        $resQuery = mysqli_query($link, "SELECT * FROM `items` WHERE typeof='casualshoe'");
    }

    echo "<div class ='container'>";
    echo "<div class='row'>";
    echo "<div class='col-md-4>";
    echo "<div class='thumbnail'>";
    // echo "<table>";
    $i = 0;
    foreach ($resQuery as $elem) {
            // echo "<tr>";
            echo "<h3 class='name'>".$elem['name']."</h3>";
            echo "<img class='img-responsive' src='".$elem['img']."'>";
            echo "<p>".$elem['description']."</p>";
            echo "<p class='price'>".$elem['price']." €</p>";
            echo "<a><form method='post'><input type='hidden' name='hidden' value='$i'><input type='submit' name='submit' value='Add to Basket'></form></a>";
            // echo "</tr>";
            $i++;
    }
    // echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    if (isset($_POST['submit'])) {
        if ($_POST['submit'] == "Add to Basket") {
            $i = (int)$_POST['hidden'];
            $find = 0;

            if (!$_SESSION['loggued_on_user']) {
                $login = $_SERVER['REMOTE_ADDR'];
                if (strstr($login, "::")) {
                    $login = trim(str_ireplace("::", " ", $login));
                }
            } else {
                $login = $_SESSION['loggued_on_user'];
            }

            $addr = $_SERVER['REMOTE_ADDR'];
            if (strstr($addr, "::")) {
                $addr = str_ireplace("::", " ", $login);
                $addr = trim($addr);
            }
            $ordered = 0;

            foreach ($resQuery as $elem) {
                if ($find == $i) {
                    $name = $elem['name'];
                    $price = $elem['price'];
                    $query = mysqli_query($link, "INSERT INTO `order` (login, `name`, price, ordered, addr) VALUES ('$login', '$name', '$price', '$ordered', '$addr')");
                    break ;
                }
                $find++;
            }
            refresh();
        }
    }