<?php
# version 1.5

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

include("cfg.php");

foreach (glob("css/*.css") as $plikCss) {
    echo '<link rel="stylesheet" href="' . $plikCss . '">';
}
foreach (glob("js/*.js") as $plikJs) {
    echo '<script src="' . $plikJs . '"></script>';
}
include("php/head.php");
require('php/navbar.php');


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

if (file_exists($strona))
{
    include($strona);
}
else
{
    echo "The file $strona does not exist";
}

$nr_indeksu = "164407";
$nrGrupy = "2";
$imieNazwisko = "Kinga Markowska";

echo "<br/>PHP:<br/>";

echo "Autor: ".$imieNazwisko." ".$nr_indeksu." grupa ".$nrGrupy." <br/><br/>";

require('php/footer.php');