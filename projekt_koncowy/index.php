<?php
//zawarcie pliku 'showpage.php' z pokazaniem strony
include "showpage.php";
//zawarcie pliku konfiguracyjnego 'cfg.php'
include "cfg.php";
//zawarcie pliku z formularzem kontaktowym i funkcjami
include "admin/contact.php";

global $link;

//start sesji
session_start();
//lokalne dynamiczne ładowanie stron
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

foreach (glob("css/*.css") as $plikCss) {
    echo '<link rel="stylesheet" href="' . $plikCss . '">';
}

foreach (glob("js/*.js") as $plikJs) {
    echo '<script src="' . $plikJs . '"></script>';
}

include("php/head.php");
require('php/navbar.php');

// wyswietlenie danej stony za pomocą zmiennej GET
if ($_GET['idp'] == 'admin') {
    $strona_logowanie = 'admin/login.html';
}
elseif ($_GET['idp'] == 'edit_one') {
    $strona_logowanie = 'admin/edit_one.php';
}
elseif ($_GET['idp'] == 'delete_one') {
    $strona_logowanie = 'admin/delete_one.php';
}
elseif ($_GET['idp'] == 'add_page') {
    $strona_logowanie = 'admin/add_page.php';
}
elseif ($_GET['idp'] == 'logged') {
    $strona_logowanie = 'admin/logged.php';
}
elseif ($_GET['idp'] == 'contact') {
    $strona_logowanie = 'admin/contact.php';
}
elseif ($_GET['idp'] == 'log_out') {
    $strona_logowanie = 'admin/log_out.php';
}
elseif ($_GET['idp'] == 'edit_category') {
    $strona_logowanie = 'admin/edit_category.php';
}
elseif ($_GET['idp'] == 'delete_category') {
    $strona_logowanie = 'admin/delete_category.php';
}
elseif ($_GET['idp'] == 'add_category'){
    $strona_logowanie = 'admin/add_category.php';
}
elseif ($_GET['idp'] == 'add_product') {
    $strona_logowanie = 'admin/add_product.php';
}
elseif ($_GET['idp'] == 'delete_product') {
    $strona_logowanie = 'admin/delete_product.php';
}
elseif ($_GET['idp'] == 'edit_product') {
    $strona_logowanie = 'admin/edit_product.php';
}
elseif ($_GET['idp'] == 'delete_item_in_cart'){
    $strona_logowanie = 'admin/delete_item_in_cart.php';
}

$wyniki = mysqli_query($link, "SELECT * FROM page_list");

while ($data = mysqli_fetch_array($wyniki)) {
    if ($_GET['idp'] == $data['page_title'])
    {
        $strona = $data['id'];
    }
}
$strona_pokaz = PokazPodstrone($strona);

if (isset($_SESSION['use'])) {
    echo '<form method="POST">
                <a class="przycisk-wyloguj">
                    <button name="wyloguj" type="submit">
                        Wyloguj
                    </button>
                    </a>
            </form>';
}
if (isset($_POST['wyloguj'])) {
    include('admin/log_out.php');
}
?>

<body class="with_background" onload="startclock()">
<div class="content">
    <?php
    if ($strona_pokaz == '[Strona nieaktywna]')
    {
        echo 'Page inactive<br>';
    }
    if (isset($strona_logowanie) && file_exists($strona_logowanie)) {
        include $strona_logowanie;
    }
    if ($_GET['idp'] == 'kontakt')
    {
        WyslijMailKontakt();
    }
    if ($_GET['idp'] == 'admin')
    {
        include('admin/admin.php');
    }
    else
    {
        if ($strona_pokaz == '[nie_znaleziono_strony]' && $strona_pokaz !== 'admin/login.html'
            && $strona_pokaz !== 'admin/logged.php' && $strona_pokaz !== 'admin/edit_one.php'
            && $strona_pokaz !== 'admin/delete_one.php' && $strona_pokaz !== 'admin/add_page.php')
        {
            echo '<b>Nie znaleziono strony </b><br>';
        }
        else
        {
            echo $strona_pokaz;
        }
    }
    if ($_GET['idp'] == 'kategorie')
    {
        if (isset($_SESSION['use']))
        {
            include('admin/category_admin.php');
        }
        else
        {
            include('admin/category.php');
        }

    }
    if ($_GET['idp'] == 'sklep')
    {
        if (isset($_SESSION['use']))
        {
            include('admin/shop_admin.php');
        }
        else
        {
            include('admin/shop.php');
        }
    }
    if ($_GET['idp'] == 'koszyk')
    {
        include('admin/show_cart.php');
    }

//zawarcie pliku 'footer.php' z katalogu nadrzednego 'php'
// ze stopka strony
require('php/footer.php');
?>
</body>
