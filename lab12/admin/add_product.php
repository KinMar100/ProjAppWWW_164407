<?php
include('check_login.php');
$id = $_GET['id'];

echo '
<div class="">
<div class="">
    <div class="">
        <h1>Dodaj produkt</h1>
    </div>
    <form  method="post">
        <div class="">
            <label>Nazwa produktu</label>
            <input type="text" name="nazwa" class="" placeholder="Podaj nazwę produktu">
        </div>
        <div class="">
            <label>Kategoria produktu</label>
            <input type="text" name="kategoria" class="" placeholder="Podaj kategorie produktu">
        </div>
                <div class="">
            <label>Opis produktu</label>
            <input type="text" name="opis" class="" placeholder="Podaj opis produktu">
        </div>
                <div class="modal-body">
            <label>Data dodania</label>
            <input type="date" name="data_utworzenia" class="" placeholder="Podaj datę dodania/utworzenia produktu">
        </div>
                        <div class="modal-body">
            <label>Data modyfikacji</label>
            <input type="date" name="data_modyfikacji" class="" placeholder="Podaj datę modyfikacji">
        </div>
                        <div class="modal-body">
            <label>Data wygaśnięcia</label>
            <input type="date" name="data_wygasniecia" class="" placeholder="Podaj datę wygaśnięcia">
        </div>                <div class="modal-body">
            <label>Cena Netto</label>
            <input type="text" name="cena_netto" class="" placeholder="Podaj cenę netto">
        </div>                <div class="modal-body">
            <label>Podatek VAT</label>
            <input type="text" name="podatek_vat" class="" placeholder="Podaj wartość podatku VAT">
        </div>                <div class="modal-body">
            <label>Ilość sztuk</label>
            <input type="text" name="ilosc_sztuk" class="" placeholder="Podaj ilość sztuk">
        </div>                <div class="modal-body">
            <label>Dostępność</label>
            <input type="text" name="dostepnosc" class="" placeholder="Podaj dostępność produktu">
        </div>
                <div class="">
            <label>Zdjęcie</label>
            <input type="text" name="img" class="" placeholder="Podaj url zdjęcia produktu">
        </div>
        
        <div class="">
            <button type="submit" name="Add" class="">Dodaj produkt >>></button>
        </div>
    </form>
    </div>
    </div>
</div>
';
$result = mysqli_query($link, "SELECT * FROM products");

if (isset($_POST['Add'])) {
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
        $add = mysqli_query($link, " INSERT INTO products (`id`, `nazwa`,
`kategoria`, `opis`, `data_utworzenia`, `data_modyfikacji`, `data_wygasniecia`,
                         `cena_netto`, `podatek_vat`, `ilosc_sztuk`,
                         `dostepnosc`, `img`) VALUES (NULL, '$nazwa', '$kategoria',
                                                      '$opis', '$data_utworzenia',
                                                      '$data_modyfikacji', '$data_wygasniecia',
                                                      '$cena_netto', '$podatek_vat', '$ilosc_sztuk', '$dostepnosc', 'https://images.obi.pl/product/PL/1500x1500/618104_2.jpg')
 LIMIT 1");
    } else {
        $add = mysqli_query($link, " INSERT INTO products (`id`, `nazwa`,
`kategoria`, `opis`, `data_utworzenia`, `data_modyfikacji`, `data_wygasniecia`,
                         `cena_netto`, `podatek_vat`, `ilosc_sztuk`,
                         `dostepnosc`, `img`) VALUES (NULL, '$nazwa', '$kategoria',
                                                      '$opis', '$data_utworzenia',
                                                      '$data_modyfikacji', '$data_wygasniecia',
                                                      '$cena_netto', '$podatek_vat', '$ilosc_sztuk', '$dostepnosc', '$img')
 LIMIT 1");
    }
    header("location:index.php?idp=shop");

}



