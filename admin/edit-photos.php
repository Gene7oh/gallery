<?php /** @noinspection DuplicatedCode */
    include("includes/admin-header.php"); ?>
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
                        Gallery
                        <small>Edit Photo</small>
                    </h1>
                    <?php
                        $photo = new Photo();
                        if (isset($_GET['edit-id'])){
                            $photo = Photo::findById($_GET['edit-id']);
                        }
                        
                        if (isset($_POST['update'])){
                        }
                        if (isset($_GET['edit-success'])) {
                            echo "<info style='color: darkblue'>Photo Successfully Deleted</info>";
                            refresh(3, "photos.php");
                        }
                        if (isset($_GET['no-photo'])) {
                            echo "<warning style='color: darkred'>Something went Wrong!</warning>";
                        }
                    
                    ?>
                    <form class="form-group" method="post" action="">
                        <div class="col-md-8 ">
                            <div class="form-group">
                                <input class="form-control" type="text" name="title" placeholder="php echoed placeholder text">
                            </div>
                            <div class="form-group">
                                <img src="https://via.placeholer.com/225x150" alt="web placeholder image" class="form-control img-responsive">
                            </div>
                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input type="text" name="caption" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alt-text">Alternative Text</label>
                                <input type="text" name="alt-text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="photo-info-box">
                                <div class="info-box-header">
                                    <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                                <div class="inside">
                                    <div class="box-inner">
                                        <p class="text">
                                            <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                        </p>
                                        <p class="text ">
                                            Photo Id: <span class="data photo_id_box"><?php echo $photo->id;?></span>
                                        </p>
                                        <p class="text">
                                            Filename: <span class="data">image.jpg</span>
                                        </p>
                                        <p class="text">
                                            File Type: <span class="data">JPG</span>
                                        </p>
                                        <p class="text">
                                            File Size: <span class="data">3245345</span>
                                        </p>
                                    </div>
                                    <div class="info-box-footer clearfix">
                                        <div class="info-box-delete pull-left">
                                            <a href="includes/delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
                                        </div>
                                        <div class="info-box-update pull-right ">
                                            <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include("includes/admin-footer.php"); ?>