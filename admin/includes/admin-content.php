<?php
    /* php tag at the top to suppress errors due to php version differences */
    /** @noinspection PhpUndefinedVariableInspection */
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Gallery
                <small>Admin Page</small>
            </h1>
            <?php
                /*echo "<pre>";
                 $sql    = "SELECT * FROM users";
                 $result = $database->query($sql);
                 while ($user_found = mysqli_fetch_array($result)) {
                     echo "<pre>";
                     echo "Found a user named:" . "<br>" . $user_found['user_fname'] . "<br>" . $user_found['user_lname'];
                     echo "</pre>";
                 }*/
                // ↓↓ instantiate the class to access User methods↓↓
                /*$user   = new User();
                $result = $user->findAllUsers();
                while ($row = mysqli_fetch_array($result)) {
                    echo "<pre>";
                    echo $row['user_id'] . " ";
                    echo $row['username'] . "<br>";
                    echo "</pre>";
                }*/
                // ↓↓ Call same method using static method change method to static in User.php↓↓
                /*$result = User::findAllUsers();
                while ($row = mysqli_fetch_array($result)) {
                    echo "<pre>";
                    echo $row['user_id'] . " ";
                    echo $row['username'];
                    echo "</pre>";
                }
                echo "</pre>";*/
                // ↓↓ Call user by ID using static method and passed parameter↓↓
                $user_id = 1;
                echo "<pre>";
                $user_found = User::findUserById($user_id);
                echo $user_found['user_id'] . " " . $user_found['username'];
                echo "</pre>";
            ?>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <!--suppress HtmlUnknownTarget -->
                    <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
</div>