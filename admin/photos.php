<?php include("includes/admin-header.php"); ?>
<?php
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()) {
        redirect("login.php");
    } ?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <?php include "includes/navbar-header.php"; ?>
        <!-- Top Menu Items -->
        <?php
            include('includes/admin-top-nav.php'); ?>
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
                        Gallery Photo
                        <small>Display Page </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="">
                            <i class="fa fa-file"></i> Blank Page
                        </li>
                        <li class="active">
                            <i class="fa fa-comment"></i> <a href="../photo-comments.php"> Comments Front End</a>
                        </li>
                    </ol>
                    <?php
                        if (isset($_GET['delete-success'])) {
                            echo "<info style='color: darkblue'>Photo Successfully Deleted</info>";
                            refresh(3, "photos.php");
                        }
                        if (isset($_GET['no-photo'])) {
                            echo "<warning style='color: darkred'>Something went Wrong!</warning>";
                        }
                        if (isset($_GET['no-comment'])) {
                            echo "<warning style='color: darkred'>No Comment Results!</warning>";
                        }
                    ?>
                    <div class="col-md-12 ">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Photo</th>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Filename</th>
                                <th>Type</th>
                                <th>Size</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $photos = Photo::findAll();
                                foreach ($photos as $photo) : ?>
                                    <tr>
                                        <td>
                                            <!-- https://via.placeholder.com/175x125 -->
                                            <img class="admin-thumb" src="<?php echo $photo->picturePath(); ?>" alt="<?php echo $photo->alt_text; ?>">
                                            <div class="action-links">
                                                <a href="edit-photo.php?edit-id=<?php echo $photo->id; ?>">Manage image</a><br>
                                                <a href="../photo-comments.php?view-photo-id=<?php echo $photo->id; ?>">View or Comment</a><br>
                                                <a href="comment-photo.php?view-comment-id=<?php echo $photo->id; ?>">View Comments</a>
                                            </div>
                                        </td>
                                        <td><?php echo $photo->id; ?>  </td>
                                        <td><?php echo $photo->title; ?></td>
                                        <td><?php echo substr($photo->description, -90) . " ...<a href='#'>More</a>"; ?></td>
                                        <td><?php echo $photo->filename; ?></td>
                                        <td><?php echo $photo->type; ?></td>
                                        <td><?php echo $photo->size; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include("includes/admin-footer.php"); ?>