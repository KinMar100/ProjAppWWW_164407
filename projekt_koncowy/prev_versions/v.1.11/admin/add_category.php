<?php
include('check_login.php');

$id = $_GET['id'];

echo '
<div class="">
<div class="">
    <div class=""><h5>Add Page</h5></div>
    <form  method="post">
        <div class="">
            <label>Nazwa kategorii:  </label>
            <input type="text" name="category_name" class="" placeholder="Podaj nazwę kategorii">
        </div>
        <div class="">
            <label>Rodzic kategorii: </label>
            <input type="text" name="category_parent" class="" placeholder="Podaj rodzica kategorii">
        </div>
        <div class="">
            <button type="submit" name="Add" class="">Zapisz zmiany</button>
        </div>
    </form>
    </div>
</div>
';
$wyniki = mysqli_query($link, "SELECT * FROM categories");

if (isset($_POST['Add'])) {
    $cat_name = $_POST['category_name'];
    $cat_parent = $_POST['category_parent'];

    if ($cat_parent == "")
    {
        $add = mysqli_query($link, "INSERT INTO `categories` (`id`, `parent`, `name`) VALUES (NULL, NULL, '$cat_name',) LIMIT 1");
        header("location:index.php?idp=kategorie");
    }
    else
    {
        $add = mysqli_query($link, "INSERT INTO `categories` (`id`, `parent`, `name`) VALUES (NULL, '$cat_parent', '$cat_name') LIMIT 1");
        header("location:index.php?idp=kategorie");
    }
}



