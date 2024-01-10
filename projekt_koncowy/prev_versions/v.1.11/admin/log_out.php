<!--metoda czysci sesje i nastepuje wylogowanie uzytkownika i przekierowuje go do panelu logowania-->
<?php

session_destroy();
header('Location: ./index.php?idp=admin');


