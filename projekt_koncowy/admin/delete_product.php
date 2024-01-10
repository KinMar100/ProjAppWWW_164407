<?php

include "../cfg.php";
include('check_login.php');
global $link;

$id = $_GET['id'];
$zapytanie = mysqli_query($link, "SELECT * FROM products WHERE id='$id'");
$data = mysqli_fetch_array($zapytanie);

global $mysqli;

$delete = mysqli_query($link, "DELETE FROM products WHERE id = $id LIMIT 1");

if ($delete)
{   echo "Product $id usunięty";
    mysqli_close($link);
    header("location:index.php?idp=sklep");
    exit;
}
else
{
    echo mysqli_error($link);
}