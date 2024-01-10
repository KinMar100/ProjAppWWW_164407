<?php

include "../cfg.php";
include('check_login.php');

global $link;

$id = $_GET['id'];

$result_edit = mysqli_query($link, "SELECT * FROM products where id='$id'");
$data = mysqli_fetch_array($result_edit);
if (isset($_POST['edit']))
{
    $title = $_POST['title_edit'];
    $description = $_POST['description_edit'];
    $date_expire = $_POST['date_expire_edit'];
    $price_netto = $_POST['price_netto_edit'];
    $tax_vat = $_POST['tax_vat_edit'];
    $quantity = $_POST['quantity_edit'];
    $availability = $_POST['availability_edit'];
    $category = $_POST['category_edit'];
    $dimensions = $_POST['dimensions_edit'];
    $image = $_POST['image_edit'];

    if ($image != '')
    {
        $edit = mysqli_query($link, "UPDATE products SET `title`='$title',`description`='$description',
                      `date_expire`='$date_expire', `price_netto`='$price_netto', `tax_vat`='$tax_vat',
                      `quantity`='$quantity',
                      `availability`='$availability', `category`='$category', `dimensions`='$dimensions',
                      `image`='$image' WHERE `products`.`id` = '$id' LIMIT 1");

    } else {
        $edit = mysqli_query($link, "UPDATE products SET `title`='$title',`description`='$description',
                      `date_expire`='$date_expire', `price_netto`='$price_netto', `tax_vat`='$tax_vat',
                      `quantity`='$quantity',
                      `availability`='$availability', `category`='$category', `dimensions`='$dimensions', `image`='https://st3.depositphotos.com/23594922/31822/v/450/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg' WHERE `products`.`id` = '$id' LIMIT 1");
    }
    if ($edit) {
        mysqli_close($link);
        header("location:index.php?idp=sklep");
        exit;
    } else {
        echo mysqli_error();
    }
}
?>
<div class="product-container">
    <div class="product-header">
        <h2>Edytuj produkt</h2>
        <form class="product-action" method="post">
            <div class="product-action">
                <label>Nazwa produktu</label>
                <input type="text" name="title_edit" value="<?php echo $data['title'] ?>" placeholder="Zmień nazwę produktu">
            </div>
            <div class="product-action">
                <label>Opis produktu</label>
                <input type="text" name="description_edit" value="<?php echo $data['description'] ?>" placeholder="Zmień opis produktu">
            </div>
            <div class="product-action">
                <label>Data wygaśnięcia</label>
                <input type="date" name="date_expire_edit" value="<?php echo $data['date_expire'] ?>" placeholder="Zmień datę wygaśnięcia">
            </div>
            <div class="product-action">
                <label>Cena Netto</label>
                <input type="text" name="price_netto_edit" value="<?php echo $data['price_netto'] ?>" placeholder="Zmień cenę netto">
            </div>
            <div class="product-action">
                <label>Podatek VAT produktu</label>
                <input type="text" name="tax_vat_edit" value="<?php echo $data['tax_vat'] ?>"  placeholder="Zmień wartość podatku VAT">
            </div>
            <div class="product-action">
                <label>Ilość sztuk produktu</label>
                <input type="text" name="quantity_edit" value="<?php echo $data['quantity'] ?>"  placeholder="Zmień ilość sztuk">
            </div>
            <div class="product-action">
                <label>Dostępność produktu</label>
                <input type="text" name="availability_edit" value="<?php echo $data['availability'] ?>"  placeholder="1 - dostępny/ 0 - niedostępny">
            </div>

            <div class="product-action">
                <label>Wymiary produktu</label>
                <input type="text" name="dimensions_edit" value="<?php echo $data['dimensions'] ?>"  placeholder="Zmień wymiary produktu">
            </div>
            <div class="product-action">
                <label>Zdjęcie produktu</label>
                <input type="text" name="image_edit" value="<?php echo $data['image'] ?>"  placeholder="Zmień url zdjęcia produktu">
            </div>
            <div class="product-action">
                <label>Kategoria produktu:</label>
                <label>
                    <select name="category_edit" class="cat-input-field">
                        <?php
                        $parent_query = mysqli_query($link, "SELECT * FROM categories");
                        while ($parent_row = mysqli_fetch_assoc($parent_query)) {
                            $selected = ($parent_row['name'] == $data['category']) ? 'selected' : '';
                            if ($parent_row['parent'] == '')
                            {
                                echo '<option value="' . $parent_row['name'] . '" ' . $selected . '>' . $parent_row['name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </label>
            </div>

            <div class="button_add_product">
                <button type="submit" name="edit">Edytuj produkt >>></button>
            </div>
        </form>
    </div>
</div>
