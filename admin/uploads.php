<?php
global $message;
    include("includes/admin-header.php"); ?>
<?php
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()) {
        redirect("login.php");
    } ?>
    <title>Upload</title>
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
                        Upload
                        <small>your photos</small>
                    </h1>
                    <div class="col-md-6">
                        <?php
                            if (isset($_POST['submit'])) {
                                /** @noinspection DuplicatedCode */
                                $photo              = new Photo();
                                $photo->user_id =  $_SESSION['id'];
                                $photo->title       = $_POST['title'];
                                $photo->description = $_POST['description'];
                                $photo->date        = date(myTimeZone('America/Chicago'));
                                $photo->setFile($_FILES['file-upload']);
                                if ($photo->savePhoto()) {
                                    $session->message("The image $photo->filename has been successfully added to the gallery.");
                                } else {
                                    $session->message("<warning style='color: darkred'>" . join("<br>", $photo->errors) . "</warning>");
                                }
                                redirect("uploads.php");
                            } /*  End isset submit */
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <p class="bg-info"><?php echo $message ?></p>
                            <div class="form-group">
                                <label for="upload_file">Chose photo to upload.
                                    <input type="file" name="file-upload" class="form-control">
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="title">Name your photo
                                    <input type="text" name="title" class="form-control">
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="description">Describe your photo
                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                                </label>
                            </div>
                            <input type="submit" name="submit">
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include("includes/admin-footer.php"); ?>