<?php
include "cfg.php";
global $link;

$finalprice = 0;

?>

<div class="shop-container">
    <div class="shop-heading">
        <h2>Twoje produkty w koszyku: </h2>
    </div>
    <div class="product">
        <?php
        $result = mysqli_query($link, "SELECT * FROM cart LIMIT 100 ");
        while ($row = mysqli_fetch_array($result)) {
            $name = $row['nazwa'];
            $resultprod = mysqli_query($link, "SELECT * FROM products WHERE title='$name' LIMIT 100 ");
            $data = mysqli_fetch_array($resultprod);
            $finalprice += $row['cena'] * $row['ilosc'];
            $updateamount = $data['ilosc_sztuk'] - $row['ilosc'];

        if (isset($_POST['check_out']))
        {
            $delete_items_in_cart = mysqli_query($link, "DELETE FROM cart;");
            echo "Zamówienie zostało zfinalizowane";
            header("location:index.php?idp=koszyk");
            exit;
        }
        ?>

            <div class="col-md-3 col-sm-6 first-div">
                <a href="#">
                    <img class="pic-1" src="<?php echo $data['image']; ?>" alt="Product_Image">
                </a>
                <div class="product">
                    <h2 class="title">
                        <a href="#"><?php echo $row['nazwa']; ?></a>
                    </h2>
                    <div class="price">Cena brutto: <?php echo $row['cena']; ?>zł
                    </div>
                    <div>
                        <form method="post">
                            <a type="hidden">Ilość: <?php echo $row['ilosc']; ?></a>
                        </form>
                    </div>
                    <div class="price_all">Cena Łączna: <?php echo $row['cena'],"*", $row['ilosc'],"=", $row['cena']*$row['ilosc']; ?>zł
                    </div>
                    <a class="add-form-button" onclick="return confirm('Czy jesteś pewien, że chcesz usunąć ten przedmiot?')"
                       href="index.php?idp=delete_item_in_cart&id=<?php echo $row['id']; ?>">Usun przedmiot z koszyka</a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="modal-footer">

        <div class=""><h2>Wartość koszyka:  <?php echo $finalprice; ?>zł</h2></div>
        <form method="post">
            <button class="add-form-button" name="check_out">Zfinalizuj zamówienie >>></button>
        </form>
    </div>
</div>