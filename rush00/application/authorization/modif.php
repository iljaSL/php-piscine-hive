<?php
    include("../../install.php");


    if (isset($_POST['submit'])) {
        if ($_POST['submit'] == "Modify") {
            $login = mysqli_real_escape_string($link, $_POST['login']);
            $passwd = hash("whirlpool", mysqli_real_escape_string($link, $_POST['old_passwd']));
            $new_passwd = hash("whirlpool", mysqli_real_escape_string($link, $_POST['new_passwd']));

            $resLogQuery = mysqli_query($link, "SELECT * FROM `users` WHERE login = '$login'");
            $row = mysqli_fetch_array($resLogQuery);

            if ($row) {
                if ($row['password'] == $passwd) {
                    $query = mysqli_query($link, "UPDATE `users` SET password = '$new_passwd' WHERE login = '$login'");
                    echo "<h3 style='color: green'>Modification was successful</h3>";
                } else {
                    echo "<h3 style='color: red'>Wrong password</h3>";
                }
            } else {
                echo "<h3 style='color: red'>Wrong login</h3>";
            }
        }
    }

    if (isset($_POST['delete'])) {
        if ($_POST['delete'] == "Delete Account") {
            $link = mysqli_connect("localhost", "root", "rootpasswd", "rush00");

            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }

            $login = mysqli_real_escape_string($link, $_POST['login']);
            $passwd = hash("whirlpool", mysqli_real_escape_string($link, $_POST['old_passwd']));

            $resLogQuery = mysqli_query($link, "SELECT * FROM `users` WHERE login = '$login'");
            $row = mysqli_fetch_array($resLogQuery);

            if ($row) {
                if ($row['password'] === $passwd) {
                    $query = mysqli_query($link, "DELETE FROM `users` WHERE login = '$login'");
                    $_SESSION['loggued_on_user'] = "";
                    header("location: index.php");
                } else {
                    echo "<h3 style='color: red'>Wrong password</h3>";
                }
            } else {
                echo "<h3 style='color: red'>Wrong login</h3>";
            }
        }
    }
?>
<div class="form">
    <form method="POST" action="">
        <fieldset>
            <legend>Modify account</legend>
            <input type="text" name="login" placeholder="Login" />
            <input type="password" name="old_passwd" placeholder="Old Password" />
            <input type="password" name="new_passwd" placeholder="New Password" />
        </fieldset>
        <input type="submit" name="submit" value="Modify" />
        <input type="submit" name="delete" value="Delete Account" />
        <a href="index.php?page=login">Back to Login</a>
    </form>
</div>