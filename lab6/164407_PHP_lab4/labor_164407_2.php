<?php
// ZADANIE_1
$nr_indeksu = '164407';
$nrGrupy = '2';

echo 'Kinga Markowska '.$nr_indeksu.' grupa '.$nrGrupy.'<br/><br/>';

// ZADANIE_2

// podpunkt_a
echo 'Zastosowanie metody include(): <br/>';
include ('vars.php');
echo "A $color $fruit <br/>";

echo 'Zastosowanie metody require_once(): <br/>';
$req_once = require_once("vars.php");
echo "Tekst z require_once:".$req_once.'<br/>';

// podpunkt_b

$your_age = 21;
$voting_age = 18;

if ($your_age >= $voting_age) {
    echo "Mozesz glosowac | Twoj wiek: ".$your_age."<br/>";
}
elseif ($your_age < $voting_age & $your_age > 0) {
    echo "Nie mozesz glosowac | Twoj wiek: ".$your_age."<br/>";
}
else{
    echo "Podano zła wartosc wieku | Wartosc wieku: ".$your_age."<br/>";
}

// podpunkt_c

// petla_while
$iterator = 0;
$suma1 = 0;
echo "Wartosci elementow (petla while): <br/>";

while($iterator <= 10) {
    echo $iterator." element: ";
    if ($iterator == 10) {
        echo $suma1."<br/>";
        break;
    }
    echo $suma1."<br/>";
    $iterator++;
    $suma1 = $suma1 + $iterator;
}
echo "Suma elementow od 0 do 10: ".$suma1."<br/> <br/>";

// petla_for
$suma2 = 0;
echo "Wartosci elementow (petla for): <br/>";
for ($iterator = 0; $iterator <= 10; $iterator++)
{
    echo $iterator." element: ";
    if ($iterator == 10) {
        $suma2 = $suma2 + $iterator;
        echo $suma2."<br/>";
        break;
    }
    echo $suma2."<br/>";

    $suma2 = $suma2 + $iterator;
}
echo "Suma elementow od 0 do 10: ".$suma2."<br/> <br/>";



// podpunkt_d

//typ zmiennej $_GET

echo 'Hej, '.htmlspecialchars($_GET["nazwa"].'!');

//typ zmiennej $_POST

echo 'Hej, '.htmlspecialchars($_POST["nazwa"]) . '!';

echo "<br/>";

//typ zmiennej $_SESSION

session_start();
$val = 0;
$_SESSION["nowa_sesja"]=$val;
echo $_SESSION["nowa_sesja"];