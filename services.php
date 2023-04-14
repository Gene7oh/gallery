<?php include("includes/header.php"); ?>
    <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <h2>Gallery Services <small>a testing page</small></h2>
        <p class="text-justify lead">
            The page for testing code without messing up part of the gallery app during the testing.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum deserunt dolore eius excepturi, expedita explicabo impedit itaque iusto molestiae nam nobis officia, officiis quae quod repudiandae saepe sunt suscipit veritatis!
        </p>
        <p class=" lead">
            <?php
                $photos = Photo::findAll();
            foreach ($photos as $photo) {
                echo "The image named $photo->title was uploaded by user with the id of $photo->user_id" . "<br>";
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