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
                        Control Panel
                        <small>Gallery Users</small>
                    </h1>
                    <?php
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
                        if (isset($_GET['no-user'])) {
                            echo "<warning style='color: darkred'><h4>User Not Found</h4></warning>";
                            refresh(4, "users.php");
                        }
                        if (isset($_GET['add-user-error'])) {
                            echo "<warning style='color: darkred'><h4>Unable to create user!</h4></warning>";
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
                                        <td style="width: 130px;">
                                            <img class="user-image" src="<?php echo $user->placeholderOrImage();?>" alt="">
                                            <?php echo "<p class='pull-right' style='color: darkblue; font-size: 11px;' >$user->user_image</p>"; ?>
                                        </td>
                                        <td><?php echo $user->username; ?>
                                            <div class="action-links">
                                                <a href="includes/delete-user.php?delete-id=<?php echo $user->id; ?>">Delete</a>
                                                <a href="edit-user.php?edit-id=<?php echo $user->id; ?>">Edit</a>
                                                <a href="">View</a>
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