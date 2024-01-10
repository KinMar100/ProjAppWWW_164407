<!--czyszczenie sesji-->
<?php
session_destroy();
header('Location: ./index.php?idp=admin');