<?php
    include("includes/header.php");
    //    $photos  = Photo::findAll();
    $comment           = new Comment();
    $page              = !empty($_GET['page']) ? (int) $_GET['page'] : 1;
    $items_per_page    = 8;
    $total_items_count = Photo::countAll();
    $paginate          = new Pagination($page, $items_per_page, $total_items_count);
    $sql               = "SELECT * FROM photos ";
    $sql               .= "LIMIT $items_per_page ";
    $sql               .= "OFFSET {$paginate->offset()} ";
    $photos            = Photo::findByQuery($sql)
?>
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-12">
        <h1 class="lead">Complete Photo Gallery</h1>
        <div class=" row">
            <?php foreach ($photos as $photo) : ?>
                <div class="col-xs-8 col-md-3">
                    <a class="" href="photo-comments.php?view-photo-id=<?php echo $photo->id; ?>">
                        <img class="thumbnail image-front-end img-responsive" src="<?php echo 'admin/' . $photo->picturePath(); ?>" alt="image of <?php echo $photo->title; ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row text-center">
                <ul class="pagination">
                    <?php
                        if ($paginate->pageTotal() > 1) {
                            if ($paginate->hasNext()){
                                echo "<li class='next'><a href='index.php?page={$paginate->next()}' >Next</a></li>";
                            }
                            for ($i = 1; $i <= $paginate->pageTotal(); $i++){
                                if ($i == $paginate->current_page){
                                    echo "<li class=''><a style='background-color: darkgray; color: whitesmoke;' class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                                } else {
                                    echo "<li><a style='' href='index.php?page=$i'>$i</a></li>";
                                }
                            }
                            if ($paginate->hasPrevious()){
                                echo "<li class='previous'><a href='index.php?page={$paginate->previous()}' >Previous</a></li>";
                            }
                        }
                    ?>
                </ul>
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