<?php
    include("includes/header.php"); ?>
<?php
    if (empty($_GET['view-photo-id'])) {
        redirect("index.php");
    }
    $photo = Photo::findById($_GET['view-photo-id']);
?>
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <!-- Blog Post -->
        <!-- Title -->
        <h1><?php echo $photo->title; ?></h1>
        <!-- Author -->
        <p class="lead">
            by <a href="#">Start Bootstrap</a>
        </p>
        <hr>
        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on April 19th at 9:00 AM</p>
        <hr>
        <!-- Preview Image -->
        <img class="img-responsive" src="<?php echo "admin" . DS . "images" . DS . $photo->filename; ?>" alt="">
        <!--<img class="img-responsive" src="https://via.placeholder.com/900x300?text=Large Image" alt="">-->
        <hr>
        <!-- Post Content -->
        <p class="lead-important"><?php echo $photo->description; ?></p>
        <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim,
            iure!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui,
            necessitatibus, est!</p>-->
        <hr>
        <!-- Blog Comments -->
        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            <div class="row" id="#"> <!--  add extra row div to accommodate pull right for the submit button  -->
                <?php
                    if (isset($_POST['submit'])) {
                        $author      = trim($_POST['author']);
                        $body        = trim($_POST['body']);
                        $new_comment = Comment::createComment($photo->id, $author, $body);
                        if ($new_comment) {
                            $new_comment->create();
                            redirect("photo-comments.php?view-photo-id=$photo->id");
                        } else {
                            echo $msg = "Problems Saving <br>";
                        }
                    } else {
                        $author = "";
                        $body   = "";
                    }
                    $comments = Comment::findComments($photo->id);
                ?>
                <form role="form" method="post" action="">
                    <div class="form-group">
                        <label class="" for="author">Who are you?
                        </label>
                        <input type="text" name="author" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="" for="body">What do you say?</label>
                        <textarea class="form-control" name="body" rows="3"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
                </form>
            </div>
        </div>
        <hr>
        <!-- Posted Comments -->
        <!-- Comment -->
        <?php foreach ($comments as $comment) : ?>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" style="width: 87px !important;" src="<?php echo "admin/images" . DS . $photo->filename; ?>" alt=""><!--
                <img class="media-object" src="https://via.placeholder.com/80x80?text=thumbnail" alt="">-->
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Posted by: <?php echo $comment->author; ?>
                        <small>April 19th at 11:30 AM</small>
                    </h4>
                    <?php echo $comment->body; ?> <a href="#">Edit <i class="fa fa-edit"></i></a>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Comment -->
    </div>
    <!-- End Nested Comment -->
    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
        <?php
            include("includes/sidebar.php"); ?>
    </div>
</div>
<!-- /.row -->
<?php
    include("includes/footer.php"); ?>
    

