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
                        Gallery user
                        <small>Display Page </small>
                    </h1>
                    <?php
                          /*  Fetch get requests code TODO add all to switch statement */
                        if (isset($_GET['no-user'])) {
                            $delete_id = $_GET['id'];
                            echo "<warning style='color: darkred'><h4>No User ID</h4></warning>";
                            refresh(4, "users.php");
                        }
                        $delete_id ="";
                         if (isset($_GET['delete-success'])) {
                             $delete_id = $_GET['id'];
                             echo "<info style='color: darkblue'><h4>User ID Number $delete_id Successfully Deleted</h4></info>";
                             refresh(4, "users.php");
                         }
                         if (isset($_GET['delete-error'])) {
                             echo "<warning style='color: darkred'><h4>Something went Wrong!</h4></warning>";
                         }
                        $user_added ="";
                         if (isset($_GET['user-added'])) {
                             echo "<info style='color: darkblue'><h4>User Successfully Created</h4></info>";
                             refresh(4, "users.php");
                         }
                         if (isset($_GET['user-edited'])) {
                             echo "<info style='color: darkblue'><h4>User Successfully Edited</h4></info>";
                             refresh(4, "users.php");
                         }
                        if (isset($_GET['add-user-error'])) {
                           $msg = (isset($_GET['err-msg'])) ? "empty fields not allowed" : false;
                            echo "<warning style='color: darkred'><h4>Unable to create user $msg !</h4></warning>";
                        }
                    ?>
                    <div class="col-md-12 ">
                        <a href="add-user.php" class="btn btn-primary pull-right">Add User</a>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>UserName</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $users = User::findAll();
                                foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?php echo $user->id; ?></td>
                                        <td><img class="user-image" src="<?php echo $user->placeholderOrImage();?>" alt=""></td>
                                        <td><?php echo $user->username; ?>
                                            <div class="action-links">
                                                <a href="includes/delete-user.php?delete-id=<?php echo $user->id; ?>">Delete</a>
                                                <a href="edit-user.php?edit-id=<?php echo $user->id; ?>">Edit</a>
                                            </div></td>
                                        <td><?php echo $user->user_fname; ?></td>
                                        <td><?php echo $user->user_lname; ?></td>
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