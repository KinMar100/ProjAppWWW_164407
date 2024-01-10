<?php
//zawarcie pliku 'showpage.php' z pokazaniem strony
include "showpage.php";
//zawarcie pliku konfiguracyjnego 'cfg.php'
include "cfg.php";
//zawarcie pliku z formularzem kontaktowym i funkcjami
include "admin/contact.php";
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

// w zaleznosci od zmiennej typu 'GET' wyswietla sie dana strona
if ($_GET['idp'] == 'admin') {
    $strona_logowanie = 'admin/login.html';
}
elseif ($_GET['idp'] == 'edit') {
    $strona_logowanie = 'admin/edit.php';
}
elseif ($_GET['idp'] == 'delete') {
    $strona_logowanie = 'admin/delete.php';
}
elseif ($_GET['idp'] == 'delete1') {
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
elseif ($_GET['idp'] == 'edit_cat') {
    $strona_logowanie = 'admin/edit_category.php';
}
elseif ($_GET['idp'] == 'delete_cat') {
    $strona_logowanie = 'admin/delete_cat.php';
}
elseif ($_GET['idp'] == 'add_cat'){
    $strona_logowanie = 'admin/add_cat.php';
}
elseif ($_GET['idp'] == 'sklep') {
    $strona_logowanie = 'html/shop.html';
}
elseif ($_GET['idp'] == 'add_prod') {
    $strona_logowanie = 'admin/add_prod.php';
}
elseif ($_GET['idp'] == 'delete_prod') {
    $strona_logowanie = 'admin/delete_prod.php';
}
elseif ($_GET['idp'] == 'edit_prod') {
    $strona_logowanie = 'admin/edit_product.php';
}
elseif ($_GET['idp'] == 'deleteitemcart'){
    $strona_logowanie = 'admin/delete_item_in_cart.php';
}

$wyniki = mysqli_query($link, "SELECT * FROM page_list");

while ($data = mysqli_fetch_array($wyniki)) {
    if ($_GET['idp'] == $data['page_title'])
    {
        $strona = $data['id'];
    }
}
$strona = PokazPodstrone($strona);

if (isset($_SESSION['use'])) {
    echo '<form method="POST">
                <a class="btn btn-danger"><button CLASS="border-0 bg-transparent" name="wyloguj" type="submit"><i class="glyphicon glyphicon-lock"></i>Log out <i class="bi bi-door-open"></i></button></a>
            </form>';
}
if (isset($_POST['wyloguj'])) {
    include('admin/log_out.php');
}
?>

<body class="with_background" onload="startclock()">
<div class="content">
    <?php
    if ($strona == '[Strona nieaktywna]')
    {
        echo '<div style="text-align: center; color:#050000"><b> Page inactive </b></div><br>';
    }
    if (isset($strona_logowanie) && file_exists($strona_logowanie)) {
        include $strona_logowanie;
    }
    if ($_GET['idp'] == 'kontakt')
    {
        WyslijMailKontakt();
    };
    if ($_GET['idp'] == 'admin')
    {
        include('admin/admin.php');
    }
    else
    {
        if ($strona == '[nie_znaleziono_strony]' && $strona_logowanie !== 'admin/login.html' && $strona_logowanie !== 'admin/logged.php' && $strona_logowanie !== 'admin/edit.php' && $strona_logowanie !== 'admin/delete.php' && $strona_logowanie !== 'admin/add_page.php')
        {
            echo '<div style="text-align: center; color:#070101"><b> Page not found </b></div><br>';
        }
        else
        {
            echo $strona;
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
            include('admin/shop_admin.php');;
        }
        else
        {
            include('admin/shop.php');
        }
    }
    if ($_GET['idp'] == 'koszyk')
    {
        include('admin/cart.php');
    }

//zawarcie pliku 'footer.php' z katalogu nadrzednego 'php'
// ze stopka strony
require('php/footer.php');
?>
</body>
