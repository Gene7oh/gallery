<?php include("includes/admin-header.php"); ?>
<?php
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()) {
        redirect("login.php");
    } ?>
    <title>Upload</title>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Gallery Admin</a>
            <a class="navbar-brand" href="../index.php">Gallery Front</a>
        </div>
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
                        Upload Page
                        <small>for your photos</small>
                    </h1>
                    <div class="col-md-6">
                        <?php
                            $msg = "";
                            if (isset($_POST['submit'])) {
                                $photo        = new Photo();
                                $photo->title = $_POST['title'];
                                $photo->setFile($_FILES['file_upload']);
                                if ($photo->save()) {
                                    $msg = "Photo uploaded Successfully";
                                } else {
                                    $msg = join("<br>", $photo->errors);
                                }
                            } /*  End isset submit */
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php echo $msg; ?>
                            <div class="form-group"><input type="text" name="title" class="form-control"></div>
                            <div class="form-group"><input type="file" name="file_upload" class="form-control"></div>
                            <input type="submit" name="submit">
                        </form>
                    </div>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Blank Page
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php
    include("includes/admin-footer.php"); ?>