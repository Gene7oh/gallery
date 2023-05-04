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
        echo "*************" . "<br>";
        $result = User::findAllUsers();
        while ($row = mysqli_fetch_array($result)) {
            echo $row['username'] . " " . $row['fname'] . "<br>";
        }
        echo "******************" . "<br>";
        $id         = 4;
        $user_found = User::findById($id);
        echo $user_found['username'];
        ?>
    </div>
    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
        <?php include("includes/sidebar.php"); ?>
    </div>
    <!-- /.row -->

    <?php include("includes/footer.php"); ?>
