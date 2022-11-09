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
                echo "<pre>";
                /*$sql    = "SELECT * FROM users";
                 $result = $database->query($sql);
                 while ($user_found = mysqli_fetch_array($result)) {
                     echo "<pre style='background-color: #666666; color: whitesmoke'>";
                     echo "Found a user named:" . "<br>" . $user_found['user_fname'] . "<br>" . $user_found['user_lname'];
                     echo "</pre>";
                 }*/
                // ↓↓ instantiate the class to access User methods↓↓
                /*$user   = new User();
                $result = $user->findAllUsers();
                while ($row = mysqli_fetch_array($result)) {
                    echo "<pre class='pull-right' style='background-color: #999999; color: antiquewhite; font-size: 16px; width: 70%'>";
                    echo $row['user_id'] . "<br>";
                    echo $row['username'] . "<br>";
                    echo $row['user_fname'] . " " . $row['user_lname'];
                    echo "</pre>";
                }*/
                // ↓↓ Call same method ↑↑ using static method change method to static in User.php↓↓
                /*$result = User::findAllUsers();
                while ($row = mysqli_fetch_array($result)) {
                    echo "<pre class='pull-right' style='background-color: #999999; color: antiquewhite; font-size: 16px; width: 70%'>";
                    echo $row['user_id'] . "<br>";
                    echo $row['username'] . "<br>" . $row['user_fname'] . " " . $row['user_lname'];
                    echo "</pre>";
                }*/
                // ↓↓ Call user by ID using static method and passed parameter↓↓
                echo "<pre class='pull-right' style='background-color: #999999; color: antiquewhite; font-size: 16px; width: 90%'>";
                $user_id    = 1;
                $user_found = User::findUserById($user_id);
                if (!$user_found) {
                    echo "<alert style='color:darkred; font-size: large; font-weight: bold'>User not found!</alert>";
                } else {
                    $user = User::autoInstance($user_found);
                    echo $user->user_id . "<br>" . $user->username . "<br>" . $user->user_fname . " " . $user->user_lname . "<br>" . "User Password: ************";
                }
                echo "</pre>";
                
                echo "</pre>"; /*the end tag for the light gray background */
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