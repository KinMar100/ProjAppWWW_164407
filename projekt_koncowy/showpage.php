<?php
include "cfg.php";

function PokazPodstrone($id)
{
    global $link;
    $id_clear = isset($id) ? htmlspecialchars($id) : '';
    $query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die('Invalid query: ' . mysqli_error($link));
    }

    $row = mysqli_fetch_array($result);

    if (empty($row['id'])) {
        $web = '';
    } else {
        if ($row['status'] == 1) {
            $web = $row['page_content'];
        } else {
            $web = 'Nieaktywna strona';
        }
    }
    return $web;
}
?>