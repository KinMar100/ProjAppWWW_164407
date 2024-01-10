<?php

include "../cfg.php";
include('check_login.php');
$id = $_GET['id'];

global $link;

$zapytanie = mysqli_query($link, "SELECT * FROM categories WHERE id='$id'");

$data = mysqli_fetch_array($zapytanie);

global $mysqli;
$delete = mysqli_query($link, "DELETE FROM categories WHERE id = $id LIMIT 1");
if ($delete)
{
    mysqli_close($link);
    header("location:index.php?idp=kategorie");
    exit;
}
else
{
    echo mysqli_error($link);
}
?>
