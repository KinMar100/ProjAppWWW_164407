<?php
include "cfg.php";
include('check_login.php');

global $link;
?>
<a class="button_add_category" href="index.php?idp=add_category" >Dodaj kategorie<i class=""></i></a>
<div class="row">
    <?php
    $result = mysqli_query($link, "SELECT * FROM categories where `categories`.`parent` is NULL");
    while ($rowCategory = mysqli_fetch_array($result)) {
        $categoryName = $rowCategory["name"];
        ?>

        <div class="col-4 col-sm-4">
            <div class="category-container">
                <div class="category-header">
                    <h2 style="color: crimson"><?php echo $categoryName; ?></h2>
                    <div class="category-actions">
                        <div class="close" data-dismiss="modal" aria-label="Close"></div>
                        <a class="edit-link" href="index.php?idp=edit_category&id=<?php echo $rowCategory["id"]; ?>">Edycja</a>
                        <a onclick="return confirm('Czy jesteś pewien, że chcesz usunąć tą kategorię/podkategorię?')" href="index.php?idp=delete_category&id=<?php echo $rowCategory["id"]; ?>">Usuwanie</a>
                    </div>
                </div>
                <div class="category-subheader">
                    <h4>Podkategorie</h4>
                </div>
                <div class="subcategory-container">
                    <?php
                    $resultSub = mysqli_query($link, "SELECT * FROM categories where parent = '$categoryName'");
                    $loopExecuted = false;
                    while ($rowSub = mysqli_fetch_array($resultSub)) {
                        $loopExecuted = true;
                        ?>

                        <div type="button" class="subcategory" aria-current="true">
                            <?php
                            if (!empty($rowSub["name"])) {
                                echo $rowSub["name"];
                            } else {
                                echo '<div class="out-of-stock">Out of stock</div>';
                            }
                            ?>
                            <a href="index.php?idp=edit_category&id=<?php echo $rowSub["id"]; ?>"><i class="">Edytuj podkategorie</i></a>
                            <a href="index.php?idp=delete_category&id=<?php echo $rowSub["id"]; ?>"><i class="">Usun podkategorie</i></a>
                        </div>
                        <?php
                    }
                    if (!$loopExecuted) {
                        echo '<div class="out-of-stock">Brak podkategorii</div>';
                    }
                    ?>
                    <a type="button" href="index.php?idp=add_category<?php echo $rowCategory["id"]; ?>" class="add-link" aria-current="true"><i class=""></i></a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>