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
                        /* if (isset($_GET['delete-success'])) {
                             echo "<info style='color: darkblue'>user Successfully Deleted</info>";
                             refresh(3, "users.php");
                         }
                         if (isset($_GET['no-user'])) {
                             echo "<warning style='color: darkred'>Something went Wrong!</warning>";
                         }*/
                    ?>
                    <div class="col-md-12 ">
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
                                                <a href="edit-users.php?edit-id=<?php echo $user->id; ?>">Edit</a>
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