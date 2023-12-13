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

//------------------------------------------------//
//               PrzypomnijHaslo                  //
//------------------------------------------------//
//   funkcja przypominajaca haslo uzytkownika     //
//------------------------------------------------//
function PrzypomnijHaslo($email)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['przypomnij_haslo'])) {
        // Sprawdzenie, czy podano adres e-mail
        if (empty($_POST['email'])) {
            echo '</br>[Podaj adres e-mail]';
            return;
        }

        // generowanie nowego hasła
        $nowe_haslo = generujNoweHaslo();

        // wysłanie maila z nowym hasłem
        $mail_subject = "Przypomnienie hasła";
        $mail_body = "Twoje nowe hasło to: " . $nowe_haslo;

        $header = "From: Przypomnienie hasła <".$email.">\n";
        $header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding: \n";
        $header .= "X-Sender: <".$email.">\n";
        $header .= "X-Mailer: PRapWWW mail 1.2\n";
        $header .= "X-Priority: 3\n";
        $header .= "Return-Path: <".$email.">\n";

        mail($_POST['email'], $mail_subject, $mail_body, $header);

        echo '<h2>Nowe hasło zostało wysłane na podany adres e-mail.</h2>';
    }
}

//--------------------------------------------------------//
//               generujNoweHaslo                         //
//--------------------------------------------------------//
//  Funkcja zwracajaca zmienna zaweirajaca nowe haslo     //
//--------------------------------------------------------//
function generujNoweHaslo($dlugosc = 8)
{
    $znaki = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $nowe_haslo = "";

    for ($i = 0; $i < $dlugosc; $i++) {
        $nowe_haslo .= $znaki[rand(0, strlen($znaki) - 1)];
    }

    return $nowe_haslo;
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

# PokazPrzypomnienieHasla($email);