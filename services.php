<?php include("includes/header.php"); ?>


<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <h2>Test new php code</h2>
        <?php
        $db = $database->connect;
        if ($db){
            echo "The Database name is " . DB_NAME . "<br>The User is " . DB_USER;
        } else die("Connection Failed" . mysqli_error($db));
        ?>
    </div>
    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
        <?php include("includes/sidebar.php"); ?>
    </div>
    <!-- /.row -->

    <?php include("includes/footer.php"); ?>
