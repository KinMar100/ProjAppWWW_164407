<?php
include("../cfg.php");
//utworzenie sesji
session_start();


if (isset($_SESSION['use']))
{
    header("Location:index.php?idp=logged");
}

if (isset($_POST['login']))
{
    $user = $_POST['login_user'];
    $user_pass = $_POST['login_pass'];
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    if ($_POST['login_user'] == $login)
    {
        if (password_verify($user_pass, $pass)) {
            echo 'Logowanie udane';
            $_SESSION['use'] = $user;
            header("location: index.php?idp=logged");
        }
    } else {
        echo '<div style="text-align: center; color:red"><b> Zły login/hasło </b></div><br>';
    }
}





