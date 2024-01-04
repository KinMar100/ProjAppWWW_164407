<?php

if (!isset($_SESSION['use'])) {

    header("Location:index.php?idp=admin");
    echo '<script>alert("Musisz być zalogowany")</script>';
    exit;
}