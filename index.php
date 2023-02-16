<?php
    include("includes/header.php");
    $photos = Photo::findAll();
?>
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-12">
        <h1 class="lead">8 Grid Column.</h1>
        <div class=" row">
            <?php foreach ($photos as $photo) : ?>
                <div class="col-xs-8 col-md-3">
                    <a class="" href="photo-comments.php?view-photo-id=<?php echo $photo->id; ?>">
                        <img class="thumbnail image-front-end img-responsive" src="<?php echo 'admin/' . $photo->picturePath(); ?>" alt="image of <?php echo $photo->title; ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Blog Sidebar Widgets Column -->
    <!--    <div class="col-md-4">
            
             <?php //  include("includes/sidebar.php"); ?>
    </div>-->
    <!-- /.row -->
</div>
<?php
    include("includes/footer.php"); ?>
    

