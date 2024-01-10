<?php

include "../cfg.php";
include('check_login.php');


if(isset($_GET['id']) && is_numeric($_GET['id']))
{
    $id = $_GET['id'];
    global $link;
    $conn_delete = $link;

    if($conn_delete)
    {
        $stmt = $conn_delete->prepare("DELETE FROM page_list WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        header("location:index.php?idp=logged");
        exit;
    }
}
else
{
    echo "Niepoprawne dane.";
}