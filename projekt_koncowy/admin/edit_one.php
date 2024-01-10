<?php
include "../cfg.php";
include('check_login.php');
global $link;

$id = $_GET['id'];

$zapytanie = mysqli_query($link, "SELECT * FROM page_list where id='$id'");

$data = mysqli_fetch_array($zapytanie);
?>

<div class="edit-page-container">
    <div class="edit-page-heading">
        <h1>Edytuj stronę</h1>
    </div>
    <div class="edit-page-form">
        <form class="edit-form" method="POST">
            <label class="edit-form-label">Tytuł strony</label><br>
            <label>
                <input class="edit-form-input" type="text" name="title"
                       value="<?php echo $data['page_title'] ?>">
            </label><br>
            <label class="edit-form-label">Zawartość strony</label><br>

                <textarea class="edit-form-textarea" rows="10" name="content"><?php echo $data['page_content']; ?>
                </textarea>

            <label class="edit-form-label">Status</label><br>
            <label>
                <input class="edit-form-input" type="text" name="status"
                       value="<?php echo $data['status'] ?>" placeholder="Edytuj status">
            </label><br>
            <input class="edit-form-submit" type="submit" name="update" value="Aktualizuj stronę">
        </form>
    </div>
</div>
<?php

if (isset($_POST['update']))
{
    $page_title = $_POST['title'];
    $status = $_POST['status'];
    $page_content = $_POST['content'];

    $edit = mysqli_query($link, "UPDATE page_list SET page_title='$page_title', status='$status', page_content='$page_content' WHERE id='$id' LIMIT 1");

    if ($edit)
    {
        mysqli_close($link);
        header("location:index.php?idp=logged");
        exit;
    }
    else
    {
        echo mysqli_error();
    }
}
?>

