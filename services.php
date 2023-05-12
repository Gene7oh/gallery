<?php include("includes/header.php"); ?>


<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <h2>Test new php code</h2>
        <?php
        echo "Test my php code and design ideas here ↓↓ before inserting into established coded pages.<br>"; ?>
        <?php
        $users = User::findAllUsers();
        ?>
        <div class="col-md-12">
            <?php foreach ($users as $user) : ?>
                <p class="media-body"><?php echo " The last name of user id: $user->id is $user->lname; " ?></p>
            <?php endforeach ;?>
        </div>
    </div>
    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
        <?php include("includes/sidebar.php"); ?>
    </div>
    <!-- /.row -->

    <?php include("includes/footer.php"); ?>
