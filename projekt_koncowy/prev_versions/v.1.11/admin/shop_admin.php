<?php

include "cfg.php";
include('check_login.php');
?>

<div class="container">
    <div class="row">
        <?php
        $result = mysqli_query($link, "SELECT * FROM products where `dostepnosc`='1' and `ilosc_sztuk`>'0' and `data_wygasniecia`> 'CURDATE()' LIMIT 200 ") or die(mysqli_error($link));
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-md-3 col-sm-6">
                <div class="">
                    <div class="">
                        <form method="post">
                            <a href="#">
                                <img class="pic-1" src="<?php echo $row['img']; ?>">
                            </a>
                            <ul class="social">
                                <li>
                                    <button class="" type="submit" name="AddtoCart" value="Add to Cart"
                                            data-tip="Add to Cart"><i class=""></i></button>
                                </li>
                                <li><a href="index.php?idp=edit_product&id=<?php echo $row['id']; ?>"
                                       data-tip="Edit Product"><i class=""></i></a></li>
                                <li><a onclick="return confirm('Are you sure you want to delete this item')"
                                       href="index.php?idp=delete_product&id=<?php echo $row['id']; ?>" data-tip="Delete"><i
                                                class=""></i></a></li>
                            </ul>
                    </div>
                    <div class="">
                        <h3 class="title"><a href="#"><?php echo $row['nazwa']; ?></a></h3>
                        <div class="price">Price: <?php echo $row['cena_netto']; ?>zł
                            + <?php echo $row['podatek_vat']; ?>zł VAT
                        </div>
                        <div>
                            Dostępnych sztuk:<?php echo $row['ilosc_sztuk']; ?></div>
                        <input class="" type="hidden" name="item-name" value="<?php echo $row['nazwa']; ?>"/>
                        <input class="" type="hidden" name="item-id" value="<?php echo $row['id']; ?>"/>
                        <input class="" type="hidden" name="price"
                               value="<?php echo $row['cena_netto'] + $row['podatek_vat'] ?>"/>
                        <input class="" type="number" name="amount" value="1"/>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
        if (isset($_POST['AddtoCart'])) {
            $amount = $_POST['amount'];
            $id = $_POST['item-id'];
            $name = $_POST['item-name'];
            $price = $_POST['price'];
            $add = mysqli_query($link, "INSERT INTO `cart` (`id`, `nazwa`, `cena`, `ilosc`) VALUES (NULL, '$name','$price','$amount') LIMIT 1");
        }
        ?>
        <div class="col-md-3 col-sm-6">
            <div class="">
                <a class="" href="index.php?idp=add_product"><i class=""></i></a>
            </div>
        </div>
    </div>
</div>