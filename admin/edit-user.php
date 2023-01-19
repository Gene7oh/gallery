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
                        } else {
                            $user = user::findById($_GET['edit-id']);
                            if (isset($_POST['update'])) {
                                if ($user) {
                                    $user->username       = $_POST['username'];
                                    $user->user_fname   = $_POST['first-name'];
                                    $user->user_lname    = $_POST['last-name'];
//                                    $user->user_image = $_POST['user_image'];
                                    $user->user_password = $_POST['password'];
                                    $user->save();
                                }
                            }
                        }
                    ?>
                    <form class="form-group" method="post" action="">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
                            </div>
                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input type="text" name="first-name" class="form-control" value="<?php echo $user->user_fname; ?>">
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last name</label>
                                <input type="text" name="last-name" class="form-control" value="<?php echo $user->user_lname; ?>">
                            </div>
                            <div class="row">
                                <div class="form-group pull-left">
                                    <label for="image"><small><?php echo "User Image" ?></small></label>
                                    <a href="#" class="admin-thumb"><img class="user-image" src="<?php echo $user->placeholderOrImage(); ?>" alt="<?php echo $user->user_image; ?>" class="img-responsive"></a>
                                </div>
                                <div class="form-group pull-right">
                                    <label for="upload"><small>New Image</small></label>
                                    <input type="file" name="upload">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Edit Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $user->user_password; ?>">
                            </div>
                           <!-- <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="summernote" cols="" rows="10"><?php /*echo $user->description; */?></textarea>
                            </div>-->
                        </div>
                        <div class="col-md-4">
                            <div class="user-info-box">
                                <div class="info-box-header">
                                    <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                                <div class="inside">
                                    <div class="box-inner">
                                        <p class="text">
                                            <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 19, 2030 @ 5:26
                                        </p>
                                        <p class="text ">
                                            user Id: <span class="data user_id_box"><?php echo $user->id; ?></span>
                                        </p>
                                        <p class="text">
                                            Username: <span class="data"><?php echo $user->username; ?></span>
                                        </p>
                                        <p class="text">
                                            First Name: <span class="data"><?php echo $user->user_fname; ?></span>
                                        </p>
                                        <p class="text">
                                            Last Name: <span class="data"><?php echo $user->user_lname; ?></span>
                                        </p>
                                    </div>
                                    <div class="info-box-footer clearfix">
                                        <div class="info-box-delete pull-left">
                                            <a href="includes/delete-user.php?delete-id=<?php echo $user->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
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