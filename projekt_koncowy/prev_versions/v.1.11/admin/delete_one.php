<?php

include "../cfg.php";
include('check_login.php');
$id = $_GET['id'];

global $link;

$conn_delete = $link;

if($conn_delete)
{
    $conn_delete->query("DELETE FROM page_list WHERE `id` = '".$id."'" or die($conn_delete->error));
    header("location:index.php?idp=logged");
    exit;
}