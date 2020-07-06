<?php
    session_start();
    include("install.php");
    $order = 0;
    if (!isset($_GET['page']) || $_GET['page'] == "home") {
        $page = "application/views/home.html";
    }
    if ($_GET['page'] == "contact") {
        $page = "application/views/contact.html";
    }
    if ($_GET['page'] == "login") {
        $page = "application/authorization/login.php";
    }
    if ($_GET['page'] == "create") {
        $page = "application/authorization/create.php";
    }
    if ($_GET['page'] == "modif") {
        $page = "application/authorization/modif.php";
    }
    if ($_GET['page'] == "logout") {
        $page = "application/authorization/logout.php";
    }
    if ($_GET['admin'] == "admin") {
        header("location: application/admin/admin.php");
    }
    if ($_GET['page'] == "all" || $_GET['page'] == "jacket" || $_GET['page'] == "shirts" || $_GET['page'] == "hoodies" || $_GET['page'] == "shoes"
    || $_GET['page'] == "longsleve" || $_GET['page'] == "casual" || $_GET['page'] == "formal" || $_GET['page'] == "crewneck" || $_GET['page'] == "zip" || 
    $_GET['page'] == "coats" || $_GET['page'] == "parkas" || $_GET['page'] == "sportshoe" || $_GET['page'] == "casualshoe") {
        $page = "application/items/items.php";
    }
    if ($_GET['page'] == "basket") {
        $page = "application/items/basket.php";
    }
    if (!$_SESSION['loggued_on_user']) {
        $login = $_SERVER['REMOTE_ADDR'];
        if (strstr($login, "::")) {
            $login = trim(str_ireplace("::", " ", $login));
        }
    } else {
        $login = $_SESSION['loggued_on_user'];
    }

    if ($resLogQueryBask = mysqli_query($link, "SELECT * FROM `order` WHERE login='$login' AND ordered='0'")) {
        foreach ($resLogQueryBask as $elem) {
           $order++;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/items.css">
    <link rel="stylesheet" href="css/landing.css">
    <script src="scripts/scripts.js"></script>
    <title>ft_minishop</title>
</head>
<body>
    <header>
        <nav>
            <ul class="topmenu">
                <li><a href="index.php?page=home">Home</a></li>
                <li><a href="index.php?page=basket">Basket<?php if ($order) {echo "(".$order.")";}?></a></li>
                <li><a href="index.php?page=all" class="down">Category</a>
                    <ul class="submenu down_down">
                        <li><a href="index.php?page=jacket">Jacket</a>
                            <ul class="botmenu">
                                <li><a href="index.php?page=coats">Coats</a></li>
                                <li><a href="index.php?page=parkas">Parkas</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?page=shirts">Shirts</a>
                            <ul class="botmenu">
                                <li><a href="index.php?page=longsleve">LongSleeve</a></li>
                                <li><a href="index.php?page=casual">Casual</a></li>
                                <li><a href="index.php?page=formal">Formal</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?page=hoodies">Hoodies</a>
                            <ul class="botmenu">
                                <li><a href="index.php?page=crewneck">Crewneck</a></li>
                                <li><a href="index.php?page=zip">Zip</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?page=shoes">Shoes</a>
                            <ul class="botmenu">
                                <li><a href="index.php?page=sportshoe">Sport</a></li>
                                <li><a href="index.php?page=casualshoe">Casual</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?page=all">All</a></li>
                    </ul>
                </li>
                <?php
                    if ($_SESSION['loggued_on_user'] == "") {
                        echo "<li><a href=\"index.php?page=login\">Login</a></li>";
                    } else {
                        echo "<li><a href=\"index.php?page=modif\">".$_SESSION['loggued_on_user']."</a></li>";
                        echo "<li><a href=\"index.php?page=logout\">LogOut</a></li>";
                    }
                ?>
                <li><a href="index.php?page=contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <?php include $page; ?>
    </div>
    <footer class="footer">
        <hr>
        <p>™ by ft_minishop</p>
        <a class="admin-button" href="index.php?admin=admin">Admin Page</a>
    </footer>
</body>
</html>