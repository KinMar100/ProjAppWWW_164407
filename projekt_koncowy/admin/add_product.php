<?php
include('check_login.php');
$id = $_GET['id'];
global $link;

$result_prod = mysqli_query($link, "SELECT * FROM products");

if (isset($_POST['add_product'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date_expire = $_POST['date_expire'];
    $price_netto = $_POST['price_netto'];
    $tax_vat = $_POST['tax_vat'];
    $quantity = $_POST['quantity'];
    $availability = $_POST['availability'];
    $category = $_POST['category'];
    $dimensions = $_POST['dimensions'];
    $image = $_POST['image'];

    $checkDuplicate = mysqli_query($link, "SELECT * FROM products WHERE title='$title'");

    if (mysqli_num_rows($checkDuplicate) > 0)
    {
        echo "Produkt $title już istnieje.";
    }
    else
    {
        if ($image == '')
        {
            $add = mysqli_query($link, " INSERT INTO products (`title`, `description`,`date_add`,`date_edit`, `date_expire`,
                         `price_netto`, `tax_vat`, `quantity`,
                         `availability`,`category`, `dimensions`, `image`) VALUES ('$title','$description',NOW(), NULL,
                                                                                   '$date_expire','$price_netto',
                                                                                   '$tax_vat', '$quantity',
                                                                                   '$availability', '$category',
                                                                                   '$dimensions',
                                                                                   'https://st3.depositphotos.com/23594922/31822/v/450/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg') LIMIT 1");
            } else {
                $add = mysqli_query($link, " INSERT INTO products ( `title`, `description`,`date_add`,
                       `date_edit`, `date_expire`,
                       `price_netto`, `tax_vat`, `quantity`,
                       `availability`,`category`, `dimensions`, `image`) VALUES ('$title','$description',NOW(), NULL,
                                                                                 '$date_expire','$price_netto',
                                                                                 '$tax_vat', '$quantity',
                                                                                 '$availability', '$category',
                                                                                 '$dimensions', '$image') LIMIT 1");
            }
            header("location:index.php?idp=sklep");
        }
}
?>
<div class="product-container">
<div class="product-header">
        <h1>Dodaj produkt</h1>
    <form class = "product-action" method="post">
        <div class="product-action">
            <label>Nazwa produktu</label>
            <input type="text" name="title" placeholder="Podaj nazwę produktu" required>
        </div>
        <div class="product-action">
            <label>Opis produktu</label>
            <input type="text" name="description" placeholder="Podaj opis produktu" required>
        </div>
        <div class="product-action">
            <label>Data wygaśnięcia</label>
            <input type="date" name="date_expire" placeholder="Podaj datę wygaśnięcia" required>
        </div>
        <div class="product-action">
            <label>Cena Netto</label>
            <input type="text" name="price_netto" placeholder="Podaj cenę netto" required>
        </div>
        <div class="product-action">
            <label>Podatek VAT</label>
            <input type="text" name="tax_vat" placeholder="Podaj wartość podatku VAT" required>
        </div>
        <div class="product-action">
            <label>Ilość sztuk</label>
            <label>
                <input type="text" name="quantity" placeholder="Podaj ilość sztuk" required>
            </label>
        </div>
        <div class="product-action">
            <label>Dostępność</label>
            <input type="text" name="availability" placeholder="1 - dostępny/ 0 - niedostępny" required>
        </div>
        <div class="product-action">
            <label>Kategoria produktu</label>
            <label>
                <select name="category_parent" class="cat-input-field">
                    <?php
                    $result = mysqli_query($link, "SELECT * FROM categories WHERE id='$id'");
                    $data = mysqli_fetch_array($result);
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
            </label>
        </div>
        <div class="product-action">
            <label>Wymiary</label>
            <input type="text" name="dimensions" placeholder="Podaj wymiary produktu" required>
        </div>
        <div class="product-action">
            <label>Zdjęcie produktu</label>
            <input type="text" name="image" placeholder="Podaj url zdjęcia produktu">
        </div></br>
        <div class="button_add_product">
            <button type="submit" name="add_product">Dodaj produkt >>></button>
        </div>
    </form>
    </div>
    </div>
</div>

