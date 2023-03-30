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
                        $page              = !empty($_GET['page']) ? (int) $_GET['page'] : 1;
                        $items_per_page    = 5;
                        $total_items_count = User::countAll();
                        $paginate          = new Pagination($page, $items_per_page, $total_items_count);
                        $sql               = "SELECT * FROM users ";
                        $sql               .= "LIMIT $items_per_page ";
                        $sql               .= "OFFSET {$paginate->offset()} ";
                        $users             = User::findByQuery($sql);
                    ?>
                    <?php
                        /*  Fetch get requests code TODO replace with appropriate $session->message(); */
                        if (isset($_GET['query-error'])) {
                            $user = "";
                            echo "<warning style='color: darkred'><h4>$user->errors</h4> <br> Possible Database Query Error!</warning>";
                            refresh(4, "users.php");
                        }
                        $delete_id = "";
                        if (isset($_GET['delete-success'])) {
                            $delete_id = $_GET['id'];
                            echo "<info style='color: darkblue'><h4>User ID Number $delete_id Successfully Deleted</h4></info>";
                            refresh(4, "users.php");
                        }
                        if (isset($_GET['delete-error'])) {
                            echo "<warning style='color: darkred'><h4>Something went Wrong!</h4></warning>";
                        }
                        /*$user_added = "";
                        if (isset($_GET['user-added'])) {
                            echo "<info style='color: darkblue'><h4>User Successfully Created</h4></info>";
                            refresh(4, "users.php");
                        }*/
                        if (isset($_GET['user-edited'])) {
                            echo "<info style='color: darkblue'><h4>User Successfully Edited</h4></info>";
                            refresh(4, "users.php");
                        }
                        if (isset($_GET['empty-fields-error'])) {
                            echo "<warning style='color: darkred'><h4>Empty Fields Not Allowed!</h4></warning>";
                        }
                    ?>
                    <div class="col-md-12 ">
                        <h4 class="bg-info">
                            <?php
                                /** @noinspection PhpUndefinedVariableInspection */
                                echo $message;
                            ?>
                        </h4>
                        <div class="row text-center">
                            <ul class="pagination">
                                <?php
                                    /** @noinspection DuplicatedCode */
                                    if ($paginate->pageTotal() > 1) {
                                        if ($paginate->hasNext()) {
                                            echo "<li class='next'><a href='users.php?page={$paginate->next()}' >Next</a></li>";
                                        }
                                        for ($i = 1; $i <= $paginate->pageTotal(); $i++) {
                                            if ($i == $paginate->current_page) {
                                                echo "<li class=''><a style='background-color: darkgray; color: whitesmoke;' class='page-link' href='users.php?page={$i}'>{$i}</a></li>";
                                            } else {
                                                echo "<li><a style='' href='users.php?page=$i'>$i</a></li>";
                                            }
                                        }
                                        if ($paginate->hasPrevious()) {
                                            echo "<li class='previous'><a href='users.php?page={$paginate->previous()}' >Previous</a></li>";
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                        <a href="add-user.php" class="btn btn-primary pull-right">Add User</a>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>UserName</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Member Since</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                /*$users = User::findAll();*/
                                foreach ($users as $user) : ?>
                                    <tr class="">
                                        <td><?php echo $user->id; ?></td>
                                        <td><img class="image-shadow admin-thumb" src="<?php echo $user->placeholderOrImage() ?>" alt=""></td>
                                        <td><?php echo $user->username; ?>
                                            <div class="action-links">
                                                <a href="edit-user.php?edit-id=<?php echo $user->id; ?>">Manage</a>
                                            </div>
                                        </td>
                                        <td><?php echo $user->user_fname; ?></td>
                                        <td><?php echo $user->user_lname; ?></td>
                                        <td><?php /*echo $user->user_join_date;*/ ?></td>
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