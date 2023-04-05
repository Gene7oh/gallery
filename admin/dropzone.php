<?php
global $message;
include("includes/admin-header.php");
?>
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
                        Drop Zone
                        <small> Multiple File Uploads</small>
                    </h1>
                    <?php
                    if (isset($_FILES['file'])) {
                        $photo = new Photo();
                        $photo->title = $_FILES['file']['name'];
                        $photo->date = date(myTimeZone("America/Chicago"));
                        if ($photo->title) {
                            $photo->setFile($_FILES['file']);
                            $photo->savePhoto();
                            $session->message("File $photo->title is set, today $photo->date");
                        } else {
                            $session->message("Error loading file");
                        }
                        redirect("photos.php");
                    } /*  End isset submit */
                    ?>
                    <div class="row col-xs-offset-1 col-md-10">
                        <?php echo $message; ?>
                        <div class="form-group">
                        <form action="dropzone.php" class="dropzone dzone-border">
                                <div class="form-control">
                                </div>
                        </form>
                    </div>
                        <!--                        <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>-->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include("includes/admin-footer.php"); ?>