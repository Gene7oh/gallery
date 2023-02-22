<?php
    include("includes/header.php");
//    $photos  = Photo::findAll();
    $comment = new Comment();
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    $items_per_page = 8;
    $total_item_count = Photo::countAll();
    $paginate = new Pagination($page, $items_per_page, $total_item_count);
    $sql = "SELECT * FROM photos ";
    $sql .=" LIMIT {$items_per_page} ";
    $sql .= "OFFSET {$paginate->offset()} ";
    $photos = Photo::findByQuery($sql)
?>
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-12">
        <h1 class="lead">12 Grid Framework</h1>
        <div class=" row">
            <?php foreach ($photos as $photo) : ?>
                <div class="col-xs-8 col-md-3">
                    <a class="" href="photo-comments.php?view-photo-id=<?php echo $photo->id; ?>">
                        <img class="thumbnail image-front-end img-responsive" src="<?php echo 'admin/' . $photo->picturePath(); ?>" alt="image of <?php echo $photo->title; ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-xs-12 text-center">
            <a href="" class="pagination"> < previous</a>
            <a href="" class="pagination"> next ></a>
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
    

