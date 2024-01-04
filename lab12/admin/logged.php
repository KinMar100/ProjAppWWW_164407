

<div class="form-container">
    <div class="form-heading">
        <h1>Zarządzaj podstronami</h1>
        <div>
            <i data-dismiss="modal" aria-label="Close" class=""></i></div>
        </div>
    <div class="form-table">
        <table class="form-table">
            <thead>
            <tr>
                <th scope="col" class="form-table-header">no</th>
                <th scope="col" class="form-table-header">Tytuł Strony</th>
                <th scope="col" class="form-table-header">Status</th>
                <th scope="col" class="form-table-header">Edycja</th>
                <th scope="col" class="form-table-header">Usuwanie</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $records = mysqli_query($link, "SELECT * FROM page_list");
            while ($data = mysqli_fetch_array($records)) {
                ?>
                <tr>
                    <th scope="row" class="form-table-data"><?php echo $data['id']; ?></th>
                    <td class="form-table-data">
                        <a href="index.php?idp=<?php echo $data['page_title']; ?>" class="form-link"><?php echo $data['page_title']; ?></a>
                    </td>
                    <td class="form-table-data"><?php echo $data['status']; ?></td>
                    <td class="form-table-data">
                        <a href="index.php?idp=edit_one&id=<?php echo $data['id']; ?>" class="form-link">
                            Edytuj <?php echo $data['page_title']; ?></a>
                    </td>
                    <td class="form-table-data">
                        <a type="submit" href="index.php?idp=delete_one&id=<?php echo $data['id']; ?>"
                           onclick="return confirm('Czy napewno chcesz usunąć tą stronę?')" class="form-link">
                            Usuń <?php echo $data['page_title']; ?>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            <td colspan="9" class="form-table-data">
                <a href="index.php?idp=add_page" class="form-button">
                    <i class="form-icon"></i>Nowa strona
                </a>
            </td>
            </tbody>
        </table>
    </div>
</div>

<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

global $link;

include('check_login.php');

if (isset($_POST['wyloguj']))
{
    include('admin/log_out.php');
    header('Location:index.php?idp=admin');
}
?>