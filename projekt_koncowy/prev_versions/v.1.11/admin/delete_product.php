<?php

include "../cfg.php";
include('check_login.php');

$id = $_GET['id'];

$qry = mysqli_query($link, "select * from products where id='$id'");

$data = mysqli_fetch_array($qry);

global $mysqli;

$delete = mysqli_query($link, "DELETE FROM products WHERE id = $id LIMIT 1");

if ($delete)
{
    mysqli_close($link);
    header("location:index.php?idp=shop");
    exit;
}
else
{
    echo mysqli_error($link);
}
?>
