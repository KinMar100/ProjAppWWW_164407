<?php
#do edycji

session_start();
include ("../cfg.php");
include("showpage.php");

/*function FormularzLogowania(): string
{
    return '
    <div class="logowanie">
        <h1 class="heading">Panel CMS:</h1>
            <div class="logowanie">
                <form method="post" name="LoginForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '"> 
                    <table class="logowanie">
                        <tr><td class="log4_t">[email]</td><td><input type="text" name="login_email" class="logowanie" /></td></tr>
                        <tr><td class="log4_t">[haslo]</td><td><input type="password" name="login_pass" class="logowanie" /></td></tr>
                        <tr><td>&nbsp;</td><td><input type="submit" name="x1_submit" class="logowanie" value="Zaloguj" /></td></tr>
                    </table>
                </form>
            </div>
    </div>
    ';
}

function ListaPodstron() {
    $query = "SELECT id, tytul FROM page_list";
    $result = mysqli_query($link, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: {$row['id']}, Tytuł: {$row['tytul']} ";
        echo '<a href="admin.php?action=edit&id=' . $row['id'] . '">Edytuj</a>';
        echo ' <a href="admin.php?action=delete&id=' . $row['id'] . '">Usuń</a><br>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["login"] == $login && $_POST["pass"] == $pass) {
        $_SESSION["logged_in"] = true;
    } else {
        $error_message = "Błędne dane logowania. Spróbuj ponownie.";
    }
}

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    echo "Witaj, admin!";
} else {
    if (isset($error_message)) {
        echo "<p style='color:red;'>$error_message</p>";
    }
    FormularzLogowania();
}

$query = "SELECT * FROM page_list WHERE id=" . $id_clear . " ORDER BY data DESC LIMIT 100";
$result = mysqli_query($query);

while ($row = mysqli_fetch_array($result)) {
    echo $row['id'] . ' ' . $row['tytul'] . ' <br />';
}

function EdytujPodstrone($id) {
    $query = "SELECT * FROM page_list WHERE id = " . mysqli_real_escape_string($link, $id) . " LIMIT 1";
    $result = mysqli_query($link, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        echo '
            <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
                <input type="text" name="tytul" value="' . htmlspecialchars($row['tytul']) . '"><br>
                <textarea name="tresc">' . htmlspecialchars($row['tresc']) . '</textarea><br>
                <input type="checkbox" name="aktywna" ' . ($row['aktywna'] == 1 ? 'checked' : '') . '> Aktywna<br>
                <input type="submit" name="edytuj_submit" value="Zapisz zmiany">
            </form>';
    }
}

function DodajNowaPodstrone() {
    echo '
        <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
            <input type="text" name="tytul" placeholder="Tytuł"><br>
            <textarea name="tresc" placeholder="Treść"></textarea><br>
            <input type="checkbox" name="aktywna" checked> Aktywna<br>
            <input type="submit" name="dodaj_submit" value="Dodaj nową podstronę">
        </form>';
}

function UsunPodstrone($id) {

    $query = "DELETE FROM page_list WHERE id = " . mysqli_real_escape_string($link, $id) . " LIMIT 1";
    $result = mysqli_query($link, $query);

    if ($result) {
        echo "Podstrona została usunięta.";
    } else {
        echo "Błąd podczas usuwania podstrony.";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edytuj_submit'])) {
        $tytul = mysqli_real_escape_string($link, $_POST['tytul']);
        $tresc = mysqli_real_escape_string($link, $_POST['tresc']);
        $aktywna = isset($_POST['aktywna']) ? 1 : 0;

        $query = "UPDATE page_list SET tytul='$tytul', tresc='$tresc', aktywna=$aktywna WHERE id=" . mysqli_real_escape_string($link, $id) . " LIMIT 1";
        $result = mysqli_query($link, $query);

        if ($result) {
            echo "Podstrona została zaktualizowana.";
        } else {
            echo "Błąd podczas aktualizacji podstrony.";
        }
    }

    if (isset($_POST['dodaj_submit'])) {
        $tytul = mysqli_real_escape_string($link, $_POST['tytul']);
        $tresc = mysqli_real_escape_string($link, $_POST['tresc']);
        $aktywna = isset($_POST['aktywna']) ? 1 : 0;

        $query = "INSERT INTO page_list (tytul, tresc, aktywna) VALUES ('$tytul', '$tresc', $aktywna)";
        $result = mysqli_query($link, $query);

        if ($result) {
            echo "Nowa podstrona została dodana.";
        } else {
            echo "Błąd podczas dodawania nowej podstrony.";
        }
    }
}


$id_edit = 1;
EdytujPodstrone($id_edit);

DodajNowaPodstrone();

$id_del = 2;
UsunPodstrone($id_del);

mysqli_close($link);*/