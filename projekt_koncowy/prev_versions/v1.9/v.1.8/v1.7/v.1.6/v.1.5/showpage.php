<?php

function PokazPodstrone($id)
{
    $id_clear = htmlspecialchars($id);
    $query = "SELECT * FROM page_list WHERE id=".$id_clear."LIMIT 1";
    $result = mysqli_query($query);
    $row = mysqli_fetch_array($result);
    if(empty($row['id']))
    {
        $web = '[nie_znaleziono_strony]';
    }
    else
    {
        $web = $row['page_content'];
    }
    return $web;
}