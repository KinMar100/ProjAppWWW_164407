<?php
include "cfg.php";
?>

<div class="">
    <?php
    $resultMain = mysqli_query($link, "SELECT * FROM categories where `categories`.`parent` is NULL");
    while ($rowMain = mysqli_fetch_array($resultMain)) {
        $categoryName = $rowMain["name"];
        ?>

        <div class="col-6 col-md-6">
            <div class="">
                <div class="">
                    <h2><?php echo $categoryName; ?></h2>
                    <div>
                        <div class=""><i data-dismiss="modal" aria-label="Close" class=""></i>
                        </div>
                    </div>
                </div>
                <div class="">
                    <h4>Podkategorie</h4>
                </div>
                <div class="">
                    <?php
                    $resultSub = mysqli_query($link, "SELECT * FROM categories WHERE parent = '$categoryName'");
                    $loopExecuted = false;
                    while ($rowSub = mysqli_fetch_array($resultSub)) {
                        $loopExecuted = true;
                        ?>
                        <button type="button" class=""
                                aria-current="true">
                            <?php
                            if (!empty($rowSub["name"])) {
                                echo $rowSub["name"];
                            } else {
                                echo '<div style="text-align: center; color:#000000"><b> Out of stock </b></div>';
                            }
                            ?>
                        </button>
                        <?php
                    }
                    if (!$loopExecuted) {
                        echo '<div style="text-align: center; color:#000000"><b> Out of stock </b></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>