<?php
# version 1.8

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

include "cfg.php";


// zawarcie na stronie plików typu js i css
// z katalogu nadrzednego 'js' i 'css'
foreach (glob("css/*.css") as $plikCss) {
    echo '<link rel="stylesheet" href="' . $plikCss . '">';
}
foreach (glob("js/*.js") as $plikJs) {
    echo '<script src="' . $plikJs . '"></script>';
}

// zawarcie naglowka 'head.php' i menu nawigacyjnego
// 'navbar.php' na stronie z katalogu nadrzednego 'php'
include("php/head.php");
require('php/navbar.php');


// w zaleznosci od zmiennej typu 'GET' wyswietla sie dana strona
if($_GET['idp'] == '') {
    $strona = 'html/glowna.html';
}
elseif($_GET['idp'] == 'zolw_1'){
    $strona = 'html/zolw_blotny.html';
}
elseif($_GET['idp'] == 'zolw_2'){
    $strona = 'html/zolw_czerwonolicy.html';
}
elseif($_GET['idp'] == 'zolw_3'){
    $strona = 'html/zolw_zoltobrzuchy.html';
}
elseif($_GET['idp'] == 'zolw_4'){
    $strona = 'html/zolw_zoltolicy.html';
}
elseif($_GET['idp'] == 'info'){
    $strona = 'html/info.html';
}
elseif($_GET['idp'] == 'funkcje'){
    $strona = 'html/funkcje.html';
}
elseif($_GET['idp'] == 'filmy'){
    $strona = 'html/filmy.html';
}
else {
    echo "Page does not exist!";
    exit;
}

//jesli strona zawarta przez zmienna 'strona' istnieje
// w katalogach to uzywa sie metody include to tej strony
// by zawrzec ja na stronie
if (file_exists($strona))
{
    include($strona);
}
else
{
    echo "The file $strona does not exist";
}

//zawarcie pliku 'contact.php' z formularzem kontaktowym
include 'contact.php';

$nr_indeksu = "164407";
$nrGrupy = "2";
$imieNazwisko = "Kinga Markowska";

echo "<br/>PHP:<br/>";

echo "Autor: ".$imieNazwisko." ".$nr_indeksu." grupa ".$nrGrupy." <br/><br/>";

//zawarcie pliku 'footer.php' z katalogu nadrzednego 'php'
// ze stopka strony
require('php/footer.php');