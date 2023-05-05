<?php include("includes/header.php"); ?>


<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <h2>Test new php code</h2>
        <?php
        echo "Test my php code and design ideas here ↓↓ before inserting into established coded pages.<br>";
        /*Show column names */
        echo "Code to show table column names" . "<br>";
        $table = $database->query("SHOW columns FROM users ");
        while ($col = mysqli_fetch_array($table)) {
            echo $col['Field'] . "<br>";
        }
              echo "**************** <br>";
        ?>
    </div>
    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
        <?php include("includes/sidebar.php"); ?>
    </div>
    <!-- /.row -->

    <?php include("includes/footer.php"); ?>
