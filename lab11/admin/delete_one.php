<?php

include "../cfg.php";
include('check_login.php');
$id = $_GET['id'];

$result = mysqli_query($link, "SELECT * FROM page_list where id='$id'");

$data = mysqli_fetch_array($result);

global $mysqli;

$delete = mysqli_query($link, "DELETE FROM page_list WHERE id = $id LIMIT 1");

if ($delete)
{
    mysqli_close($link);
    header("location:index.php?idp=logged");
    exit;
}
else
{
    echo mysqli_error($link);
}
?>
