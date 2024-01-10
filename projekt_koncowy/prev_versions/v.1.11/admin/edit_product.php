<?php

include "../cfg.php";
include('check_login.php');
$id = $_GET['id'];

$result = mysqli_query($link, "SELECT * FROM products where id='$id'");
$data = mysqli_fetch_array($result);
if (isset($_POST['edit']))
{
    $nazwa = $_POST['nazwa'];
    $kategoria = $_POST['kategoria'];
    $opis = $_POST['opis'];
    $data_utworzenia = $_POST['data_utworzenia'];
    $data_modyfikacji = $_POST['data_modyfikacji'];
    $data_wygasniecia = $_POST['data_wygasniecia'];
    $podatek_vat = $_POST['podatek_vat'];
    $ilosc_sztuk = $_POST['ilosc_sztuk'];
    $cena_netto = $_POST['cena_netto'];
    $dostepnosc = $_POST['dostepnosc'];
    $img = $_POST['img'];
    if ($img == '') {
        $edit = mysqli_query($link, "UPDATE products SET `nazwa`='$nazwa',`kategoria`='$kategoria',
                      `opis`='$opis', `data_utworzenia`='$data_utworzenia', `data_modyfikacji`='$data_modyfikacji',
                      `data_wygasniecia`='$data_wygasniecia',
                         `cena_netto`='$cena_netto', `podatek_vat`='$podatek_vat', `ilosc_sztuk`='$ilosc_sztuk',
                         `dostepnosc`='$dostepnosc', `img`='https://images.obi.pl/product/PL/1500x1500/618104_2.jpg' WHERE `products`.`id` = '$id' LIMIT 1");

    } else {
        $edit = mysqli_query($link, "UPDATE `products` SET `nazwa`='$nazwa',`kategoria`='$kategoria',
                      `opis`='$opis', `data_utworzenia`='$data_utworzenia', `data_modyfikacji`='$data_modyfikacji',
                      `data_wygasniecia`='$data_wygasniecia',
                         `cena_netto`='$cena_netto', `podatek_vat`='$podatek_vat', `ilosc_sztuk`='$ilosc_sztuk',
                         `dostepnosc`='$dostepnosc', `img`='$img' WHERE `products`.`id` = '$id' LIMIT 1");
    }
    if ($edit) {
        mysqli_close($link);
        header("location:index.php?idp=shop");
        exit;
    } else {
        echo mysqli_error();
    }
}
?>


<div class="">
    <div class="">
        <div class="">
            <h2>Edytuj produkt</h2>
        </div>
        <div class="">
            <form method="">
                <div class="">
                    <label>Nazwa</label>
                    <input type="text" value="<?php echo $data['nazwa'] ?>" name="nazwa"
                           class="" placeholder="Podaj nazwę strony">
                </div>
                <div class="">
                    <label>Kategoria</label>
                    <input type="text" value="<?php echo $data['kategoria'] ?>" name="kategoria"
                           class="" placeholder="Podaj zawartość strony">
                </div>
                <div class="">
                    <label>Opis</label>
                    <input type="text" value="<?php echo $data['opis'] ?>" name="opis" class=""
                           placeholder="Podaj zawartość strony">
                </div>
                <div class="">
                    <label>data_utworzenia</label>
                    <input type="date" value="<?php echo $data['data_utworzenia'] ?>" name="data_utworzenia"
                           class="" placeholder="Podaj zawartość strony">
                </div>
                <div class="">
                    <label>data_modyfikacji</label>
                    <input type="date" value="<?php echo $data['data_modyfikacji'] ?>" name="data_modyfikacji"
                           class="" placeholder="Podaj zawartość strony">
                </div>
                <div class="">
                    <label>data_wygasniecia</label>
                    <input type="date" value="<?php echo $data['data_wygasniecia'] ?>" name="data_wygasniecia"
                           class="" placeholder="Podaj zawartość strony">
                </div>
                <div class="">
                    <label>cena_netto</label>
                    <input type="text" value="<?php echo $data['cena_netto'] ?>" name="cena_netto"
                           class="" placeholder="Podaj zawartość strony">
                </div>
                <div class="">
                    <label>podatek_vat</label>
                    <input type="text" value="<?php echo $data['podatek_vat'] ?>" name="podatek_vat"
                           class="" placeholder="Podaj zawartość strony">
                </div>
                <div class="">
                    <label>ilosc_sztuk</label>
                    <input type="text" value="<?php echo $data['ilosc_sztuk'] ?>" name="ilosc_sztuk"
                           class="" placeholder="Podaj zawartość strony">
                </div>
                <div class="">
                    <label>dostepnosc</label>
                    <input type="text" value="<?php echo $data['dostepnosc'] ?>" name="dostepnosc"
                           class="" placeholder="Podaj zawartość strony">
                </div>
                <div class="">
                    <label>Zdjęcie</label>
                    <input type="text" name="img" value="<?php echo $data['img'] ?>" class=""
                           placeholder="Podaj zawartość strony">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="edit" class="btn btn-primary">Zapisz zmiany</button>
                </div>
            </form>
        </div>
    </div>
</div>