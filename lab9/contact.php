<?php
# version 1.8

//--------------------------------------------//
//               PokazKontakt                 //
//--------------------------------------------//
//  Funkcja zwracajaca formularz kontaktowy   //
//--------------------------------------------//

function PokazKontakt(): string
{
    return '
        <h2>Wyślij e-mail</h2>
        <form action="" method="post">
            <label for="temat">Temat:</label>
            <input type="text" name="temat" id="temat" required><br>

            <label for="tresc">Treść:</label>
            <textarea name="tresc" id="tresc" required></textarea><br>

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required><br>

            <input type="submit" value="Wyślij">
        </form>
    ';
}

//--------------------------------------------------------//
//               PokazPrzypomnienieHasla                  //
//--------------------------------------------------------//
//  Funkcja zwracajaca formularz do przypomnienia hasla   //
//--------------------------------------------------------//
function PokazPrzypomnienieHasla(): string{
    return '
        <h2>Przypomnienie hasła</h2>
        <form action="" method="post">
            <label for="email">E-mail:</label>
            <input type="email" name="email" required><br>

            <input type="submit" value="Wyślij">
        </form>
    ';
}

//------------------------------------------------//
//               WyslijMailKontakt                //
//------------------------------------------------//
//   funkcja wysylajaca e-mail dla zmiennych typu //
//   'POST' i wyswietlajaca odpowiedni komunikat  //
//------------------------------------------------//

function WyslijMailKontakt($odb)
{
    if(empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email']))
    {
        echo '</br>[Nie wszystkie pola zostaly wypelnione]';
        echo PokazKontakt();
    }
    else
    {
        $mail['subject'] = $_POST['temat'];
        $mail['body'] = $_POST['tresc'];
        $mail['sender'] = $_POST['email'];
        $mail['reciptient'] = $odb;

        $header = "From: Formularz kontaktowy <".$mail['sender']."\n";
        $header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding: \n";
        $header .= "X-Sender: <".$mail['sender'].">\n";
        $header .= "X-Mailer: PRapWWW mail 1.2\n";
        $header .= "X-Priority: 3\n";
        $header .= "Return-Path: <".$mail['sender'].">\n";

        mail($mail['reciptient'],$mail['subject'], $mail['body'], $header);

        echo '<h2>wiadomosc zostala wyslana</h2>';
    }
}

//--------------------------------------------------------//
//               generujNoweHaslo                         //
//--------------------------------------------------------//
//  Funkcja zwracajaca zmienna zaweirajaca nowe haslo     //
//--------------------------------------------------------//
function generujNoweHaslo($dlugosc = 12): string
{
    // Zbiór znaków do wykorzystania w haśle
    $znaki = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_';

    $haslo = '';
    $iloscZnakow = strlen($znaki);

    for ($i = 0; $i < $dlugosc; $i++) {
        $losowyIndeks = rand(0, $iloscZnakow - 1);
        $haslo .= $znaki[$losowyIndeks];
    }

    return $haslo;
}


//-------------------------------------------------//
//               aktualizujHaslo                  //
//-------------------------------------------------//
//  Funkcja wyswietlajaca komunikat dla danej      //
//         operacji po aktualizacji hasła          //
//-------------------------------------------------//
function aktualizujHaslo($email, $noweHaslo)
{
    global $haslaUzytkownikow;

    if (is_array($haslaUzytkownikow) && array_key_exists($email, $haslaUzytkownikow))
    {
        $haslaUzytkownikow[$email] = $noweHaslo;

        echo "Hasło użytkownika $email zostało zaktualizowane.";
    }
    else
    {
        echo "Użytkownik $email nie istnieje lub wystąpił problem z bazą danych.";
    }
}


$email = 'kinga@example.com';
$password = 'admpass';


WyslijMailKontakt($email);



