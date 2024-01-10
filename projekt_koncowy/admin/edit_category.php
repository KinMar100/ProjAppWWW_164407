<?php

include "../cfg.php";
include 'check_login.php';

global $link;

$id = $_GET['id'];

$result = mysqli_query($link, "SELECT * FROM categories WHERE id='$id'");
$data = mysqli_fetch_array($result);

if (isset($_POST['edit'])) {
    $category_parent = $_POST['category_parent'];
    $category_name = $_POST['category_name'];

    if ($category_parent == NULL) {
        $edit = mysqli_query($link, "UPDATE `categories` SET `parent` = NULL, `name` = '$category_name' WHERE `categories`.`id` = '$id' LIMIT 1");
    } else {
        $edit = mysqli_query($link, "UPDATE `categories` SET `parent`='$category_parent', `name`='$category_name' WHERE id='$id' LIMIT 1");
    }

    if ($edit) {
        mysqli_close($link);
        header("location:index.php?idp=kategorie");
        exit;
    } else {
        if (mysqli_errno($link) == 1062) {
            echo "Błąd: Ta nazwa kategorii już istnieje. Proszę podać unikalną nazwę.";
        } else {
            echo "Błąd: " . mysqli_error($link);
        }
    }
}
?>

<div class="cat-container">
    <div class="cat-card">
        <div class="cat-card-header">
            <h2>Edytuj Kategorie</h2>
        </div>
        <div class="cat-card-body">
            <form method="POST">
                <label class="cat-form-group">Nazwa kategorii</label><br>
                <label>
                    <input class="cat-form-group" type="text" name="category_name"
                           value="<?php echo $data['name'] ?>" placeholder="Edytuj nazwę kategorii" required>
                </label><br>
                <label>Rodzic kategorii</label><br>
                <label>
                    <select name="category_parent" class="cat-input-field">
                        <option value="">Brak rodzica</option>';
                        <?php
                        $parent_query = mysqli_query($link, "SELECT * FROM categories");
                        while ($parent_row = mysqli_fetch_assoc($parent_query)) {
                            $selected = ($parent_row['name'] == $data['parent']) ? 'selected' : '';
                            if ($parent_row['parent'] == '')
                            {
                                echo '<option value="' . $parent_row['name'] . '" ' . $selected . '>' . $parent_row['name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </label><br>
                <input class="cat-btn" type="submit" name="edit" value="Edit">
            </form>
        </div>
    </div>
</div>