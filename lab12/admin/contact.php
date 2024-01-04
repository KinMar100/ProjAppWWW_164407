<?php
include 'cfg.php';
//formularz kontaktowy
function PokazKontakt()
{
    echo '
    <h2>Wyślij e-mail</h2>
        <div class="contact">
                <form method="POST" class="text-center">
                    <label>Imię i Nazwisko:</label>
                    <input type="text" name="imie_nazwisko" id="imie_nazwisko" placeholder="[Imię i Nazwisko]"/><br>
                    <label>Temat</label>
                    <input type="text" name="temat" id="temat" placeholder="[Temat]"/><br>
                    <label>E-mail</label>
                    <input type="email" required="required" name="email" id="email" placeholder="[E-mail]"/><br>
                    <label>Treść</label>
                    <textarea rows="4" required="required" name="tresc" id="tresc" placeholder="[Treść]"></textarea>
                    <div>
                        <button type="submit" name="sent" id="sent" value="">Send<i></i></input>
                    </div>
                </form>        
        </div>';
}

function WyslijMailKontakt()
{

    if (isset($_POST['sent'])) {
        $imie_nazwisko = $_POST['imie_nazwisko'];
        $email = $_POST['email'];
        $temat = $_POST['temat'];
        $tresc = $_POST['tresc'];
        $formcontent = "Imię i Nazwisko:  $imie_nazwisko\n Adres e-mail: $email\n Temat: $temat\n Treść: \n $tresc ";
        $recipient = "mail1@localhost";
        $subject = "mail1";
        $mailheader = "From: 164407@student.uwm.edu.pl";
        mail($recipient, $subject, $formcontent, $mailheader) or die("Błąd w wysyłaniu email'a!");
        echo '<script>alert("Mail sent")</script>';
    }
    echo PokazKontakt();
}

function PrzypomnijHaslo()
{
    global $pass;
    echo '<form method="post">
            <input type="submit" value="przypomnij hasło">
            <input type="hidden" name="passSend" value="1" />
        </form>';
    if (isset($_POST['passSend'])) {
        $formcontent = "Password is: $pass";
        $recipient = "mail1@localhost";
        $subject = "Remind my admin password";
        $mailheader = "From: 164407@student.uwm.edu.pl";
        mail($recipient, $subject, $formcontent, $mailheader) or die("Błąd!");
        echo "Password Sent";
    }
}