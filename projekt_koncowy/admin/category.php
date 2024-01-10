<?php

include "cfg.php";
global $link;

?>
<h2>Kategorie:</h2>
<div>
    <?php
    $result_main = mysqli_query($link, "SELECT * FROM categories WHERE `categories`.`parent` is NULL");
    while ($row_main = mysqli_fetch_array($result_main)) {
        $categoryName = $row_main["name"];
        ?>
    <div class="category-container first-div">
        <div>
            <div class="close" data-dismiss="modal" aria-label="Close"></div>
            <h2><?php echo $categoryName; ?></h2>
        </div>
        <div>
            <div>
                <h3>Podkategorie</h3>
            </div>
            <?php
            $resultSub = mysqli_query($link, "SELECT * FROM categories WHERE parent = '$categoryName'");
            $loopExecuted = false;
            while ($rowSub = mysqli_fetch_array($resultSub)) {
                $loopExecuted = true;
                ?>
                <button type="button" class="subcategory" aria-current="true">
                    <?php
                    if (!empty($rowSub["name"])) {
                        echo $rowSub["name"];
                    } else {
                        echo '<div class="out-of-stock">Brak podkategorii</div>';
                    }
                    ?>
                </button>
                <?php
            }
            if (!$loopExecuted) {
                echo '<div class="out-of-stock">Brak podkategorii</div>';
            }
            ?>
        </div>
    </div>
        <?php
    }
    ?>
</div>