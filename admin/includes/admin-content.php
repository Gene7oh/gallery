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
                echo "<pre class='pull-right' style='background-color: #999999; color: antiquewhite; font-size: 16px; width: 92%'>";
                #↓↓ start pre element styled code ↓↓.
                $users = User::findAllUsers();
                foreach ($users as $user) {
                    echo $user->user_id . ":-> " . $user->user_fname . " " . $user->user_lname . "<br>";
                }
                /*$all_users = new User();
                while ($found_users = mysqli_fetch_array($result)) {
                    $all_users->user_id = $found_users['user_id'];
                    $all_users->username = $found_users['username'];
                    $all_users->user_fname = $found_users['user_fname'];
                    $all_users->user_lname = $found_users['user_lname'];
                    $all_users->user_password = $found_users['user_password'];
                    echo $all_users->user_id . " " . $all_users->user_fname . " " . $all_users->user_lname . "<br>";
                }*/
                $user_id    = 21534;
                $user = User::findUserById($user_id);
//                $user       = User::instantiation($found_user);
                echo $user->user_id . ": " . $user->user_fname . " " . $user->user_lname;
                #↑↑ end pre element styled code ↑↑
                echo "</pre>"; /*end tag info display */
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