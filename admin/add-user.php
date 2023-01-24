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
                        <small>Add User Page</small>
                    </h1>
                    <?php
                        /*<!-- ↓↓ STOP THE NAGS if necessary↓↓ -->*/
                        //                        $user = "";
                        /*<!-- ↑↑ STOP THE NAGS if necessary↑↑ -->*/
                        $user = new User();
                        if (isset($_POST['create'])) {
<<<<<<< HEAD
                            if (empty($_POST['username']) || empty($_POST['first-name']) || empty($_POST['last-name']) || empty($_POST['password'])) {
                                redirect("users.php?add-user-error");
                            } else {
                                /** @noinspection PhpConditionAlreadyCheckedInspection */
                                if ($user) {
                                    $user->username      = $_POST['username'];
                                    $user->user_fname    = $_POST['first-name'];
                                    $user->user_lname    = $_POST['last-name'];
                                    $user->user_password = $_POST['password'];
                                    if ($user->create()) {
                                        redirect("users.php?user-added");
                                    }
                                }
=======
                            /** @noinspection PhpConditionAlreadyCheckedInspection */
                            if ($user) {
                                $user->username      = $_POST['username'];
                                $user->user_fname    = $_POST['first-name'];
                                $user->user_lname    = $_POST['last-name'];
                                $user->user_password = $_POST['password'];
                                $user->setFile($_FILES['user-image']);
                                $user->saveAddUserData();
>>>>>>> parent of e591ded (Finally find logic error in update user from add user code.)
                            }
                        }
                    ?>
                    <form class="form-group" method="post" action="" enctype="multipart/form-data">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="profile-image">Select Profile Image</label>
                                <input type="file" name="profile-image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input type="text" name="first-name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input type="text" name="last-name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <!--<div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" name="confirm-password" class="form-control" >
                            </div>-->
                            <div class="form-group pull-right ">
                                <input type="submit" name="create" value="Add User" class="btn btn-primary btn">
                            </div>
                            <!--<div class="form-group">
                                <label for="user-bio">Bio</label>
                                <textarea class="form-control" name="description" id="summernoteII" cols="" rows="10"><?php /*echo $photo->description; */ ?></textarea>
                            </div>-->
                        </div>
                        <!--<div class="col-md-4">
                            <div class="photo-info-box">
                                <div class="info-box-header">
                                    <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                                <div class="inside">
                                    <div class="box-inner">
                                        <h3>Preview Information:</h3>
                                        <p class="text">
                                            <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                        </p>
                                        <p class="text ">
                                            User Id: <span class="data photo_id_box"><?php /*echo "Users user ID"; */ ?></span>
                                        </p>
                                        <p class="text">
                                            Username: <span class="data"><?php /*echo "Users Username"; */ ?></span>
                                        </p>
                                        <p class="text">
                                            First Name: <span class="data"><?php /*echo "Users first name."; */ ?></span>
                                        </p>
                                        <p class="text">
                                            Last Name: <span class="data"><?php /*echo "Users last name."; */ ?></span>
                                        </p>
                                    </div>
                                    <div class="info-box-footer clearfix">
                                        <div class="info-box-delete pull-left">
                                            <a href="includes/delete-user.php?delete-id=<?php /* */ ?>" class="btn btn-danger btn-lg ">Delete</a>
                                        </div>
                                        <div class="info-box-update pull-right ">
                                            <input type="submit" name="create" value="Add User" class="btn btn-primary btn-lg ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include("includes/admin-footer.php"); ?>