<?php

function PokazKontakt($odb)
{
    echo'';
}

function WyslijMailKontakt($odb)
{
    if(empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email']))
    {
        echo '[Nie wszystkie pola zostaly wypelnione]';
        echo PokazKontakt();
    }
    else
    {
        $mail['subject'] = $_POST['temat'];
        $mail['body'] = $_POST['tresc'];
        $mail['sender'] = $_POST['email'];
        $mail['reciptient'] = $odb;

        $header = "From: Formularz kontaktowy <".$mail['sender']."\n";
        $header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding: \n";
        $header .= "X-Sender: <".$mail['sender'].">\n";
        $header .= "X-Mailer: PRapWWW mail 1.2\n";
        $header .= "X-Priority: 3\n";
        $header .= "Return-Path: <".$mail['sender'].">\n";

        mail($mail['reciptient'],$mail['subject'], $mail['body'], $header);

        echo 'wiadomosc zostala wyslana';
    }
}
function PrzypomnijHaslo($odb)
{
    echo'';
}

