<?php

include "../cfg.php";
include('check_login.php');
$id = $_GET['id'];

$qry = mysqli_query($link, "select * from produc where id='$id'");

$data = mysqli_fetch_array($qry);

global $mysqli;
$delete = mysqli_query($link, "DELETE FROM categories WHERE id = $id LIMIT 1");
if ($delete)
{
    mysqli_close($link);
    header("location:index.php?idp=store");
    exit;
}
else
{
    echo mysqli_error($link);
}
?>
