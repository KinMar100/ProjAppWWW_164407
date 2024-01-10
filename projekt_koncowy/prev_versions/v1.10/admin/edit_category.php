<?php

include "../cfg.php";
include('check_login.php');
$id = $_GET['id'];


$result = mysqli_query($link, "SELECT * FROM categories where id='$id'");

$data = mysqli_fetch_array($result);
if (isset($_POST['edit']))
{
    $category_name = $_POST['cat_name'];
    $category_mother = $_POST['cat_parent'];
    if ($category_mother == NULL) {
        $edit = mysqli_query($link, "UPDATE `categories` SET `category_name` = '$category_name', `category_mother` = NULL WHERE `categories`.`id` = '$id' LIMIT 1");

    } else {
        $edit = mysqli_query($link, "update categories set category_name='$category_name', category_mother='$category_mother' where id='$id' LIMIT 1");
    }
    if ($edit) {
        mysqli_close($link);
        header("location:index.php?idp=kategorie");
        exit;
    } else {
        echo mysqli_error();
    }
}
?>


<div class="">
    <div class="">
        <div class="">
            <h1>Edytuj Kategorie</h1>
        </div>
        <div class="">
            <form class="" method="POST">
                <label class="text-center">Nazwa kategorii</label><br>
                <input class="text-center form-control" type="text" name="category_name"
                       value="<?php echo $data['cat_name'] ?>" placeholder="Edytuj nazwe kategorii" required><br>
                <label class="">Rodzic kategorii</label><br>
                <input class="" type="text" name="cat_parent"
                       value="<?php echo $data['parent'] ?>"><br>
                <input class="" type="submit" name="edit" value="Edit">
            </form>
        </div>
    </div>
</div>