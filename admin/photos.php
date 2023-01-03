<?php include("includes/admin-header.php"); ?>
<?php
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()) {
        redirect("login.php");
    } ?>
    <title>Photos</title>
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
                        Gallery
                        <small>Photo Display</small>
                    </h1>
                    <div class="col-md-12 ">
                        <table class="table table-striped table-hover">
                            <?php
                                if (isset($_GET['delete-success'])){
                                    echo "<info style='color: darkblue'>Photo Successfully Deleted</info>";
                                }
                                if (isset($_GET['no-photo'])){
                                    echo "<warning style='color: darkred'>Something went Wrong!</warning>";
                                }
                            ?>
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
                                            <img src="<?php echo $photo->picturePath(); ?>" alt="<?php echo $photo->title ?>">
                                            <div class="picture-link">
                                                <a href="includes/delete-photos.php?photo-id=<?php echo $photo->id; ?>">Delete</a>
                                                <a href="#">Edit</a>
                                                <a href="">View</a>
                                            </div>
                                        </td>
                                        <td><?php echo $photo->id; ?>  </td>
                                        <td><?php echo $photo->title; ?></td>
                                        <td><?php echo $photo->description; ?></td>
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