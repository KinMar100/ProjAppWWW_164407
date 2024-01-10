<?php
include "cfg.php";
global $link;

if (isset($_POST['add_to_cart'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];


    $zapytanie = mysqli_query($link, "SELECT * FROM `cart` WHERE `nazwa` = '$name'");
    $istniejacyZapytanie = mysqli_fetch_assoc($zapytanie);

    if ($istniejacyZapytanie) {
        $newValue = $istniejacyZapytanie['ilosc'] + $amount;
        mysqli_query($link, "UPDATE `cart` SET `ilosc` = '$newValue' WHERE `nazwa` = '$name'");
    } else {
        mysqli_query($link, "INSERT INTO `cart` (`nazwa`, `cena`, `ilosc`) VALUES ('$name', '$price', '$amount')") or die(mysqli_error($link));
    }
}

?>

<div class="shop-container">
    <div class="row">
        <h2 class="shop-heading">Sklep: </h2>
        <?php
        $zapytanie = mysqli_query($link, "SELECT * FROM products WHERE `date_expire` > CURDATE() AND `availability` = '1' AND `quantity` > '0' LIMIT 200") or die(mysqli_error($link));
        while ($row = mysqli_fetch_array($zapytanie)) {
            ?>
            <div class="col-md-3 col-sm-6 first-div">
                <div class="product">
                    <div class="product-image">
                        <form method="post">
                            <a href="#">
                                <img class="pic-1" src="<?php echo $row['image']; ?>" alt="Product_Image">
                            </a>
                            <h2 class="product-title"><a href="#"><?php echo $row['title']; ?></a></h2>
                            <div class="price">Cena: <?php echo $row['price_netto']; ?>zł + <?php echo $row['tax_vat']; ?>zł VAT</div>
                            <div class="quantity">Dostępnych sztuk: <?php echo $row['quantity']; ?></div>
                            <div class="quantity">Kategoria: <?php echo $row['category']; ?></div>
                            <div class="quantity">Wymiary: <?php echo $row['dimensions']; ?></div>
                            <input class="hidden-input" type="hidden" name="name" value="<?php echo $row['title']; ?>"/>
                            <input class="hidden-input" type="hidden" name="price" value="<?php echo $row['price_netto'] + $row['tax_vat'] ?>"/>
                            <label>
                                <input class="quantity-input" type="number" name="amount" value="1" min="1"/>
                            </label>
                            <button type="submit" name="add_to_cart" value="add_to_cart" data-tip="add_to_cart">Dodaj do koszyka</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>