<?php include("includes/header.php"); ?>
    <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <h2>Gallery Services <small>a testing page</small></h2>
        <p class="text-justify lead">
            Lorem ipsum dolor sit amet, consecrated adipisicing elit. Autem consectetur delectus deserunt, maxime, numquam obcaecati pariatur perferendis quia quo repellat sequi soluta ut velit! Illo inventore itaque neque perspiciatis quis.
        </p>
        <p class=" lead">
            <?php
                $sql = "SELECT user_join_date FROM users ORDER BY id desc";
                $users = User::findAll();
                foreach ($users as $user){
                    echo $user->user_join_date . "<br>";
                }
            ?>
        </p>
    </div>
    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
        <?php include("includes/sidebar.php"); ?>
    </div>
    <!-- /.row -->
<?php include("includes/footer.php"); ?>