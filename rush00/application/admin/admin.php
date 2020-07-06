<?php
    session_start();
    $_SESSION['admin'] = false;

    if (isset($_POST['submit'])) {
        if ($_POST['submit'] == "OK") {
            if ($_POST['login'] == "admin" && $_POST['password'] == "admin") {
                $_SESSION['admin'] = true;
                header("location: work.php");
            }
        }
    }
    if ($_SESSION['admin'] == false) {
        echo "
            <form style='text-align: center; margin-top: 300px;' method=\"post\" action=\"\">
                <h5>You are about to enter the world of Admin's...Are you sure you want to do this?</h5>
                <input type=\"text\" name=\"login\" value=\"\" />
                    <br>
                    <input type=\"password\" name=\"password\" value=\"\" />
                    <br>
                    <input type=\"submit\" name=\"submit\" value=\"OK\" />
            </form>";
    }
?>