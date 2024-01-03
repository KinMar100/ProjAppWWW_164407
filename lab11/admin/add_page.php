<?php
include('check_login.php');
function formularzdodaniaStrony()
{
    return '
    <div class="add-form-container">
        <div class="add-form-heading">
            <h1>Dodaj stronę</h1>
        </div>
    <form method="post">
        <div class="add-form-label">
            <label>Tytuł</label>
            <input type="text" name="pageTitle" class="add-form-input" placeholder="Tytuł strony" required>
        </div>
        <div class="add-form-label">
            <label>Zawartość</label>
            <textarea rows="5" type="text" name="pageContent" class="add-form-input" placeholder="Zawartość strony" required></textarea>
        </div>
        <div class="add-form-label">
            <label>Status</label>
            <input type="text" name="pageStatus" class="add-form-input" placeholder="Status strony" required>
        </div>
        <div>
            <button type="submit" name="pageSave" class="add-form-button">Zapisz zmiany</button>
        </div>
    </form>
    </div>
    ';
}

echo formularzdodaniaStrony();

$mysqli_create = new mysqli($dbhost, $dbuser, $dbpass, $baza) or die(mysqli_error($mysqli_create));
if (isset($_POST['pageSave']))
{
    $pageTitle = $_POST['pageTitle'];
    $pageContent = $_POST['pageContent'];
    $pageStatus = $_POST['pageStatus'];

    $mysqli_create->query("INSERT INTO page_list (page_title, page_content, status) VALUES ('$pageTitle', '$pageContent', '$pageStatus') LIMIT 1") or die($mysqli_create->error);

    header("location:index.php?idp=logged");
}