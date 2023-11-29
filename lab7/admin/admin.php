<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel admin</title>
    <script src="../css/form.css"></script>
    <script src="../css/styles.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="with_background">
<?php
#version 1.6
session_start();
require "../cfg.php";
include "../showpage.php";
$link = mysqli_connect('localhost','root','', "moja_strona");

echo '<link rel="stylesheet" href="../css/form.css">';

function FormularzLogowania(): string
{
    return '
    <div class="logowanie">
        <h1 class="heading">Panel CMS:</h1>
        <div class="logowanie">
            <form method="post" name="LoginForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'"> 
                <table class="logowanie">
                    <tr><td class="log4_t">[email]</td><td><input type="text" name="login_email" class="logowanie" /></td></tr>
                    <tr><td class="log4_t">[haslo]</td><td><input type="password" name="login_pass" class="logowanie" /></td></tr>
                    <tr><td>&nbsp</td><td><input type="submit" name="x1_submit" class="logowanie" value="Zaloguj" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';
}

if (isset($_POST['x1_submit'])) {
    if ($_POST['login_email'] == $login && $_POST['login_pass'] == $pass)
    {
        $_SESSION['logged_in'] = true;
        echo "Zalogowales/as sie!</br>";
        echo "Witaj, ".$login."!</br>";
        ListaPodstron();
    }
    else
    {
        echo 'Błędne logowanie. Spróbuj ponownie.</br></br>';
        echo '<a href="admin.php"<button class="logowanie" style="padding: 5px">Powrót</button></a>';
    }
} else {
    echo FormularzLogowania();
}


function ListaPodstron() {
    global $link;
    $query = "SELECT * FROM page_list ORDER BY page_content DESC LIMIT 100";
    # WHERE id='$id_clear'
    $result = mysqli_query($link, $query);

    echo '<form method="post">';
    echo '<table class="logowanie">';
    echo '<tr><th>ID</th><th>Tytuł</th><th>EDYTUJ | USUŃ</th></tr>';

    while ($row = mysqli_fetch_assoc($result)) {

        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['page_title'].'</td>';
        echo '<td><button type="submit" name="edit" value="' . $row['id'] . '">Edytuj</button>';
        echo '<button type="submit" name="delete" value="' . $row['id'] . '">Usuń</button>';
        echo '</tr>';
    }
    echo '<button type="submit" name="add">Dodaj nową stronę</button>';
    echo '</table>';
    echo '</form>';
}

function EdytujPodstrone($id) {
    global $link;
    $query = "SELECT * FROM page_list WHERE id=$id";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);

    echo '<form method="post">';
    echo '<input type="hidden" name="edit_id" value="' . $row['id'] . '">';
    echo 'Tytuł: <input type="text" name="edit_title" value="' . $row['page_title'] . '"><br>';
    echo 'Treść: <textarea name="edit_cont">' . $row['page_content'] . '</textarea><br>';
    echo 'Aktywna: <input type="checkbox" name="edit_status" value="1" ' . ($row['status'] == 1 ? 'checked' : '') . '><br>';
    echo '<button type="submit" name="edit_submit">Zapisz zmiany</button>';
    echo '</form>';
}

function UsunPodstrone($id) {
    global $link;
    $query = "DELETE FROM page_list WHERE id=$id LIMIT 1";
    mysqli_query($link, $query);

    echo 'Podstrona została usunięta!';
}

function DodajNowaPodstrone() {
    echo '
        <form method="post" action="' . $_SERVER['REQUEST_URI'] . '">
            <label for="new_title">Tytuł:</label>
            <input type="text" name="new_title" required><br>
            <label for="new_content">Treść:</label>
            <textarea name="new_content" required></textarea><br>
            <label for="new_status">Aktywna:</label>
            <input type="checkbox" name="new_status" value="1"><br>
            <input type="submit" name="new_submit" value="Dodaj nową podstronę">
        </form>
    ';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        DodajNowaPodstrone();
    }
    if (isset($_POST["edit"])) {
        $id = $_POST["edit"];
        EdytujPodstrone($id);
    }
    if (isset($_POST["delete"])) {
        $id = $_POST["delete"];
        UsunPodstrone($id);
    }
}
?>
</body>
</html>