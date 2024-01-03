<?php

include "../cfg.php";
include('check_login.php');
$id = $_GET['id'];

$qry = mysqli_query($link, "select * from page_list where id='$id'");

$data = mysqli_fetch_array($qry);

if (isset($_POST['update']))
{
    $page_title = $_POST['Title'];
    $status = $_POST['status'];
    $page_content = $_POST['content'];

    $edit = mysqli_query($link, "update page_list set page_title='$page_title', status='$status', page_content='$page_content' where id='$id' LIMIT 1");

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

<div class="edit-page-container">
    <div class="edit-page-heading">
        <h1>Edit Page</h1>
    </div>
    <div class="edit-page-form">
        <form class="edit-form" method="POST">
            <label class="edit-form-label">Page Title</label><br>
            <input class="edit-form-input" type="text" name="Title"
                   value="<?php echo $data['page_title'] ?>" placeholder="Edit page name" required><br>
            <label class="edit-form-label">Content</label><br>
            <textarea class="edit-form-textarea" rows="10"
                      type="text" name="content"><?php echo $data['page_content']; ?></textarea><br>
            <label class="edit-form-label">Status</label><br>
            <input class="edit-form-input" type="text" name="status"
                   value="<?php echo $data['status'] ?>" placeholder="Edit status" Required><br>
            <input class="edit-form-submit" type="submit" name="update" value="Update">
        </form>
    </div>
</div>