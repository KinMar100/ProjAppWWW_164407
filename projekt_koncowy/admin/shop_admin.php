<?php

include "cfg.php";
include('check_login.php');
global $link;
?>

<div class="shop-container">

    <h2 class="shop-heading">Sklep admin:</h2>
    <div class="button_add_product">
        <a href="index.php?idp=add_product">Dodaj produkt</a>
    </div>
    <div class="row">
        <?php
        $zapytanie = mysqli_query($link, "SELECT * FROM products WHERE `date_expire` > CURDATE() AND `availability` = '1' AND `quantity` > '0' LIMIT 200") or die(mysqli_error($link));
        while ($row = mysqli_fetch_array($zapytanie)) {
            ?>
            <div class="col-md-3 col-sm-6 first-div">
                <div class="product">
                    <div class="product-image">
                        <form method="post">
                            <a href="#">
                                <img class="pic-1" src="<?php echo $row['image']; ?>" alt="Product Image">
                            </a>
                            <ul class="product-actions">
                                <li><a href="index.php?idp=edit_product&id=<?php echo $row['id']; ?>"
                                       data-tip="Edit Product"><i class="">Edytuj produkt</i></a></li>
                                <li><a onclick="return confirm('Jesteś pewien, że chcesz usunąć ten produkt')"
                                       href="index.php?idp=delete_product&id=<?php echo $row['id']; ?>" data-tip="Delete"><i
                                                class="">Usuń produkt</i></a></li>
                            </ul>
                        </form>
                    </div>
                    <div class="product-details">
                        <h3 class="product-title"><a href="#"><?php echo $row['title']; ?></a></h3>
                        <div class="price">Cena: <?php echo $row['price_netto']; ?>zł + <?php echo $row['tax_vat']; ?>zł VAT</div>
                        <div class="quantity">Dostępnych sztuk: <?php echo $row['quantity']; ?></div>
                        <div class="quantity">Kategoria: <?php echo $row['category']; ?></div>
                        <div class="quantity">Wymiary: <?php echo $row['dimensions']; ?></div>
                        <form method="post">
                            <input class="hidden-input" type="hidden" name="item-name" value="<?php echo $row['title']; ?>"/>
                            <input class="hidden-input" type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                            <input class="hidden-input" type="hidden" name="price"
                                   value="<?php echo $row['price_netto'] + $row['tax_vat'] ?>"/>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
        if (isset($_POST['add_to_cart'])) {
            $id = $_POST['id'];
            $nazwa = $_POST['title'];
            $price = $_POST['price_netto'];
            $quantity = $_POST['quantity'];
            $add = mysqli_query($link, "INSERT INTO `cart` (`id`, `nazwa`, `cena`, `ilosc`) VALUES (NULL, '$nazwa','$price','$quantity') LIMIT 1");
        }
        ?>

    </div>
</div>