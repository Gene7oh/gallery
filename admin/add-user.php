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
                        <small>Add New User Page</small>
                    </h1>
                    <?php
                        /*<!-- ↓↓ STOP THE NAGS if necessary↓↓ -->*/
                        //                        $user = "";
                        /*<!-- ↑↑ STOP THE NAGS if necessary↑↑ -->*/
                        $user = new User();
                        if (isset($_POST['create'])) {
                          $user->username = $_POST['username'];
                          $user->user_fname = $_POST['first-name'];
                          $user->user_lname = $_POST['last-name'];
                          $user->user_password = $_POST['password'];
                          $user->user_join_date = date(myTimeZone('America/Chicago'));
                          if (empty($_FILES['user-image'])){
                          $user->save();
                          } else {
                              $user->setFile($_FILES['user-image']);
                              $user->saveUserNewImage();
                              $user->create();
                          }
                          $session->message("UserName $user->username Successfully Created");
                          redirect("users.php");
                        }
                    ?>
                    <form class="form-group" method="post" action="" enctype="multipart/form-data">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="username">Username<small style="color: darkred"> *required</small></label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="new-image">Select Profile Image</label>
                                <input type="file" name="user-image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="first-name">First Name<small style="color: darkred"> *required</small></label>
                                <input type="text" name="first-name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name<small style="color: darkred"> *required</small></label>
                                <input type="text" name="last-name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password<small style="color: darkred"> *required</small></label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group pull-right ">
                                <input type="submit" name="create" value="Add User" class="btn btn-primary btn">
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