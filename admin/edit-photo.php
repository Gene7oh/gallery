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
                        <small>Edit Photo Page</small>
                    </h1>
                    <?php
                        /*<!-- ↓↓ STOP THE NAGS ↓↓ -->*/
                        $photo = "";
                        /*<!-- ↑↑ STOP THE NAGS ↑↑ -->*/
                        if (empty($_GET['edit-id'])) {
                            redirect("photos.php?no-photo");
                        } else {
                            $photo = Photo::findById($_GET['edit-id']);
                            if (isset($_POST['update'])) {
                                if ($photo) {
                                    $photo->title       = $_POST['title'];
                                    $photo->caption     = $_POST['caption'];
                                    $photo->alt_text    = $_POST['alt-text'];
                                    $photo->description = $_POST['description'];
                                    $photo->save();
                                }
                            }
                        }
                    ?>
                    <form class="form-group" method="post" action="">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $photo->title; ?>">
                        </div>
                        <div class="form-group">
                            <label for="image"><small><?php echo $photo->title; ?></small></label>
                            <a href="#" class="thumbnail"><img class="admin-thumb" src="<?php echo $photo->picturePath(); ?>" alt="<?php echo($photo->alt_text); ?>" class="img-responsive"></a>
                        </div>
                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <input type="text" name="caption" class="form-control" value="<?php echo $photo->caption; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alt-text">Alternate Text</label>
                            <input type="text" name="alt-text" class="form-control" value="<?php echo $photo->alt_text; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="summernote" cols="" rows="10"><?php echo $photo->description; ?></textarea>
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
                                        Photo Id: <span class="data photo_id_box"><?php echo $photo->id; ?></span>
                                    </p>
                                    <p class="text">
                                        Filename: <span class="data"><?php echo $photo->filename; ?></span>
                                    </p>
                                    <p class="text">
                                        File Type: <span class="data"><?php echo $photo->type; ?></span>
                                    </p>
                                    <p class="text">
                                        File Size: <span class="data"><?php echo $photo->size; ?></span>
                                    </p>
                                </div>
                                <div class="info-box-footer clearfix">
                                    <div class="info-box-delete pull-left">
                                        <a href="includes/delete-photo.php?delete-id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
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