<?php

    include("../../install.php");

    if (isset($_POST['add'])) {
        if ($_POST['add'] == "ADD") {
            $name = mysqli_real_escape_string($link, $_POST['name']);
            $type = mysqli_real_escape_string($link, $_POST['type']);
            $typeof = mysqli_real_escape_string($link, $_POST['typeof']);
            $description = mysqli_real_escape_string($link, $_POST['description']);
            $price = (int)mysqli_real_escape_string($link, $_POST['price']);
            $img = mysqli_real_escape_string($link, $_POST['img']);

            $queryInsert = mysqli_query($link, "INSERT INTO `items` (`name`, `type`, typeof, description, price, img) VALUES ('$name', '$type', '$typeof', '$description', '$price', '$img')");

        }
    }
?>

<form method="post" action="">
    <input type="text" name="name" value="" placeholder="name" /><br>
    <input type="text" name="type" value="" placeholder="type" /><br>
    <input type="text" name="typeof" value="" placeholder="typeof" /><br>
    <input type="text" name="description" value="" placeholder="description" /><br>
    <input type="text" name="price" value="" placeholder="price" /><br>
    <input type="text" name="img" value="" placeholder="img" /><br>
    <input type="submit" name="add" value="ADD" />
</form>