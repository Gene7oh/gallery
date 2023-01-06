<?php /** @noinspection DuplicatedCode */
    include("includes/admin-header.php"); ?>
<?php
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()) {
        redirect("login.php");
    } ?>
    <title>Photos</title>
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
                        Gallery
                        <small>Edit Photo Page</small>
                    </h1>
                    <div class="col-md-12 ">
                        <!-- ↓↓ catch get request from delete-photo.php ↓↓ -->
                        <?php
                            if (isset($_GET['edit-success'])) {
                                echo "<info style='color: darkblue'>Photo Successfully Edited</info>";
                            }
                            if (isset($_GET['no-edit'])) {
                                echo "<warning style='color: darkred'>Something went Wrong!</warning>";
                            }
                        ?>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <img src="https://via.placeholder.com/175x125" alt="" class="img-responsive">
                            </div>
                            <div class="form-group">
                                <label class="form-group" for="caption">Caption</label>
                                <input type="text" name="caption" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-group" for="alt-text">Alternate Text</label>
                                <input type="text" name="alt-text" class="form-control">
                            </div>
                            <label class="form-group" for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="" rows="10"></textarea>
                            <input class="" type="submit" name="submit">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include("includes/admin-footer.php"); ?>