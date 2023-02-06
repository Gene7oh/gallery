<?php include("includes/admin-header.php"); ?>
<?php
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()) {
        redirect("login.php");
    }
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
                       View All <br>
                        <small>comments page</small>
                    </h1>
                    <div class="col-md-12">
                        <?php
                            if (isset($_GET['comment-delete-success'])) {
                                echo "<info style='color: darkblue'>Photo Successfully Deleted</info>";
                                refresh(3, "comments.php");
                            }
                            if (isset($_GET['no-comment'])) {
                                echo "<warning style='color: darkred'>Something went Wrong!</warning>";
                            }
                        ?>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <!--<th>Photo ID</th>-->
                                <th>Author</th>
                                <th>Comment Body</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $comments = Comment::findAll();
                                foreach ($comments as $comment) : ?>
                                    <tr>
                                        <td><?php echo $comment->id; ?></td>
                                        <!-- <td><?php /*echo $comment->photo_id; */ ?></td>-->
                                        <!--                                        <td><img class="user-image" src="--><?php //echo $comment->placeholderOrImage() ?><!--" alt=""></td>-->
                                        <td><?php echo $comment->author; ?>
                                            <!--                                            <img class="admin-thumb" src="--><?php //echo $comment->picturePath(); ?><!--" alt="--><?php //echo $comment->alt_text; ?><!--">-->
                                            <div class="action-links">
                                                <a href="includes/delete-comment.php?delete-comment-id=<?php echo $comment->id; ?>">Delete <i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                        <td><?php echo $comment->body ?></td>
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