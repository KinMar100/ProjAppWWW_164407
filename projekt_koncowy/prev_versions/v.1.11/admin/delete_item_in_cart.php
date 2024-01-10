<?php

include "../cfg.php";

$id = $_GET['id'];

$qry = mysqli_query($link, "SELECT * FROM cart WHERE id='$id'");

$data = mysqli_fetch_array($qry);

$delete = mysqli_query($link, "DELETE FROM cart WHERE id = $id LIMIT 1");
if ($delete)
{
    mysqli_close($link);
    header("location:index.php?idp=cart");
    exit;
}
else
{
    echo mysqli_error($link);
}
?>
