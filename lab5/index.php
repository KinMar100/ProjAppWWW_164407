<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

#$idp = htmlspecialchars($_GET['idp'], ENT_QUOTES, 'UTF-8');

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

include($strona);

foreach (glob("css/*.css") as $plikCss) {
    echo '<link rel="stylesheet" href="' . $plikCss . '">';
}
foreach (glob("js/*.js") as $plikJs) {
    echo '<script src="' . $plikJs . '"></script>';
}


$nr_indeksu = "164407";
$nrGrupy = "2";
$imieNazwisko = "Kinga Markowska";

echo "PHP:<br/>";

echo "Autor: ".$imieNazwisko." ".$nr_indeksu." grupa ".$nrGrupy." <br/><br/>";

