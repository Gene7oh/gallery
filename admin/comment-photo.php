<?php include("includes/admin-header.php"); ?>
<?php
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()) {
        redirect("login.php");
    }
    if (empty($_GET['view-comment-id'])) {
        redirect("photos.php");
    }
    $comments = Comment::findComments($_GET['view-comment-id']);
?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <?php include "includes/navbar-header.php"; ?>
        <!-- Top Menu Items -->
        <?php include('includes/admin-top-nav.php'); ?>
        <!--/* end top nav */-->
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php include('includes/admin-side-nav.php') ?>
            <!--/* end side nav -->
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <!--end entire navigation-->
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Comments <br>
                        <small>View comments page</small>
                    </h1>
                    <div class="col-md-12">
                        <?php
                        
                        ?>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Author</th>
                                <th>Comment Body</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($comments as $comment) : ?>
                            <tr>
                                <td>
                                    <?php echo $comment->id; ?>
                                </td>
                                <td>
                                    <?php echo $comment->photo_id; ?>
                                    <!--                                    <img class="user-image" src="---><?php //echo  $image_path ;?><!--" alt="">-->
                                </td>
                                <td>
                                    <?php echo $comment->author; ?>
                                </td>
                                <td>
                                    <?php echo $comment->body ?>
                                </td>
                            </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="">
                            <i class="fa fa-file"></i> Blank Page
                        </li>
                        <!--
                        <li class="active">
                            <i class="fa fa-comment"></i> <a href="../photo-comments.php"> Comments Front End</a>
                        </li>-->
                    </ol>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include("includes/admin-footer.php"); ?>