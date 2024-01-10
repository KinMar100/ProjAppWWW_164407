<?php
include "cfg.php";
include('check_login.php');
?>
<a class="float-right btn btn-primary" href="index.php?idp=add_category"><i class="bi bi-file-plus"></i></a>
<div class="row">
    <?php
    $result = mysqli_query($link, "SELECT * FROM categories where `categories`.`parent` is NULL");
    while ($row = mysqli_fetch_array($result)) {
        $res = $row["name"];
        ?>

        <div class="col-4 col-sm-4 ">
            <div class="">
                <div class="">
                    <h2><?php echo $res; ?></h2>
                    <div>
                        <div class=""><i data-dismiss="modal" aria-label="Close" class=""></i></div>
                        <a class="" href="index.php?idp=edit_category&id=<?php echo $row["id"]; ?>">Edycja</a>
                        <a onclick="return confirm('Are you sure you want to delete this item')" class=""
                           href="index.php?idp=delete_category&id=<?php echo $row["id"]; ?>">Delete</a>
                    </div>
                </div>
                <div class="">
                    <h4>Podkategorie</h4>
                </div>
                <div class="">
                    <?php
                    $resultsub = mysqli_query($link, "SELECT * FROM categories where parent = '$res'");
                    $loopExecuted = false;
                    while ($row = mysqli_fetch_array($resultsub)) {
                        $loopExecuted = true;
                        ?>

                        <div type="button" class=""
                             aria-current="true">
                            <?php
                            if (!empty($row["name"])) {
                                echo $row["name"];

                            } else {
                                echo '<div style="text-align: center; color:red"><b> Out of stock </b></div>';
                            }
                            ?>
                            <a class=""
                               href="index.php?idp=edit_category&id=<?php echo $row["id"]; ?>"><i class=""></i></a>
                            <a class=""
                               href="index.php?idp=delete_category&id=<?php echo $row["id"]; ?>"><i
                                        class=""></i></a>
                        </div>
                        <?php
                        if ($loopExecuted == false)
                        {
                            echo '<div style="text-align: center; color:red"><b> Out of stock </b></div>';
                        }
                    }
                    ?>
                    <a type="button" href="index.php?idp=add_category<?php echo $row["id"]; ?>"
                       class="" aria-current="true"><i
                                class=""></i></a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

