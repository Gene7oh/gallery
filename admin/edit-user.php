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
                        <small>Edit User Page</small>
                    </h1>
                    <?php
                        /*<!-- ↓↓ STOP THE NAGS ↓↓ -->*/
                        $user = "";
                        /*<!-- ↑↑ STOP THE NAGS ↑↑ -->*/
                        if (empty($_GET['edit-id'])) {
                            redirect("users.php?no-user");
                        }
                        $user = User::findById($_GET['edit-id']);
                        if (isset($_POST['update'])) {
                            if ($user) {
                                $user->username      = $_POST['username'];
                                $user->user_fname    = $_POST['first-name'];
                                $user->user_lname    = $_POST['last-name'];
                                $user->user_password = $_POST['password'];
                                $user->setFile($_FILES['new-image']);
                                $user->saveUserAndImage();
                            }
                        }
                    ?>
                    <div class="row col-md-6">
                        <div class="form-group">
                            <label for="image"><small><?php echo "UserID: $user->id  <br> Image Title  $user->user_image;" ?></small></label><br>
                            <a href="#" class=""><img class="user-image img-responsive" src="<?php echo $user->placeholderOrImage(); ?>" alt="<?php echo $user->user_image; ?>" class="img-responsive"></a>
                        </div>
                    </div>
                    <form class="form-group" method="post" action="" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="new-image">Upload New Image</label>
                                <input type="file" name="new-image">
                            </div>
                            <div class="form-group">
                                <label for="username">Username
                                    <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>"></label>
                            </div>
                            <div class="form-group">
                                <label for="first-name">First Name
                                    <input type="text" name="first-name" class="form-control" value="<?php echo $user->user_fname; ?>"></label>
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last name
                                    <input type="text" name="last-name" class="form-control" value="<?php echo $user->user_lname; ?>"></label>
                            </div>
                            <div class="form-group">
                                <label for="password">Edit Password
                                    <input type="password" name="password" class="form-control" value="<?php echo $user->user_password; ?>"></label>
                            </div>
                            <div class="info-box-update pull-right ">
                                <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
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