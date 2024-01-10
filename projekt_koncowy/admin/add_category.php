<?php
include('check_login.php');

global $link;

$id = $_GET['id'];

echo '
<div class="cat-container">
    <div class="cat-card">
        <div class="cat-card-header"><h5>Dodaj kategorie</h5></div>
        <form method="post" enctype="multipart/form-data">
            <div class="cat-form-group">
                <label>Nazwa kategorii:</label>
                <input type="text" name="category_name" class="cat-input-field" placeholder="Podaj nazwę kategorii" required>
            </div>
            <div class="form-group">
                <label>Rodzic kategorii:</label>
                <select name="category_parent" class="cat-input-field">
                 <option value=""></option>
                ';

$parent_query = mysqli_query($link, "SELECT * FROM categories");
while ($parent_row = mysqli_fetch_assoc($parent_query)) {
    if ($parent_row['parent'] == '')
    {
        echo '<option value="' . $parent_row['name'] . '">' . $parent_row['name'] . '</option>';
    }
}

echo '
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="add" class="cat-btn">Zapisz zmiany</button>
            </div>
        </form>
    </div>
</div>
';

$result = mysqli_query($link, "SELECT * FROM categories ");

if (isset($_POST['add'])) {
    $name_cat = $_POST['category_name'];
    $parent_cat = $_POST['category_parent'];

    $parent_exist_query = mysqli_query($link, "SELECT * FROM categories WHERE name = '$parent_cat' LIMIT 1");
    $parent_exists = mysqli_num_rows($parent_exist_query);

    if ($parent_cat != "" && $parent_exists == 0) {
        echo "Brak takiego rodzica";
    } else {
        try {
            if ($parent_cat == "") {
                $add = mysqli_query($link, "INSERT INTO `categories` (`parent`, `name`) VALUES (NULL, '$name_cat') LIMIT 1");
            } else {
                $add = mysqli_query($link, "INSERT INTO `categories` (`id`, `parent`, `name`) VALUES (NULL, '$parent_cat', '$name_cat') LIMIT 1");
            }
            if ($add) {
                header("location:index.php?idp=kategorie");
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                echo "Błąd: Ta nazwa kategorii już istnieje.";
            } else {
                echo "Błąd: " . $e->getMessage();
            }
        }
    }
}
