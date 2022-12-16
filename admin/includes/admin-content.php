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
                echo "<h4 class='media'>The Admin Practice Page</h4>";
                /* $users = User::findAllUsers();
                 foreach ($users as $user) {
                     echo $user->user_id . " -> " . $user->username . " " . $user->user_fname . " " . $user->user_lname . "<br>";
                 }*/
                
                /*$user_id = 27;
                $user    = User::findUserById($user_id);
                if ($user) {
                    echo "<info class='bg-info' style='color: black;' >$user->user_id: $user->user_fname $user->user_lname</info>";
                } else {
                    echo "<hr>";
                    echo "<warning class='bg-danger' style='color: darkred;'>User ID $user_id not found!</warning>";
                }*/
                
                /* $trigger = 1;
                 if ($trigger != 1) {
                     $create_username            = "CleanProperties";
                     $create_user_fname          = "New Method";
                     $create_user_lname          = "Using $>database->escapeString()";
                     $create_user_pass           = "5876";
                     $create_user                = new User();
                     $create_user->username      = $create_username;
                     $create_user->user_fname    = $create_user_fname;
                     $create_user->user_lname    = $create_user_lname;
                     $create_user->user_password = $create_user_pass;
                     $user_created               = $create_user->create();
                     if ($user_created) {
                         echo "User has been successfully created";
                     } else {
                         die("Query Failed <br>");
                     }
                 } else echo "Waiting for input, want to create a user?" . "<br>";*/
                /*↑↑assign create_user->createUserMethod to $variable so not to have to use the method in the if statement which created duplicate entries↑↑*/
               /* $user_id        = 39;
                $user           = User::findUserById($user_id);
                $user->username = "AbstUpdateAgain";
                $user->user_fname = "AbstractAgain";
                $user->user_lname = "UpdateCleanPropMethod";
                $user->user_password = "3rd new pass";
                $updated        = $user->update();
                if ($updated) {
                    echo "User successfully updated";
                } else {
                    die("Query Failed") . "<br>";
                }*/
                
                /*$user_id = 36;
                if ($user = User::findUserById($user_id)){
                    $deleted = $user->delete();
                    if ($deleted) {
                        echo "User successfully Deleted";
                    } else {
                        die("Query Failed <br>");
                    }
                } else echo "User number $user_id not found";*/
                
                /*$user_id   = 27;
                $username = "AbstractMethod";
                $userFname = "Abstract";
                $userLname = "Abstract Created";
                $user_pass = "1208";
                if ($user = User::findUserById($user_id)) {
                    $user->username = $username;
                    $user->user_fname = $userFname;
                    $user->user_lname = $userLname;
                    $user->user_password = $user_pass;
                    $user->save();
                    echo "User Updated";
                }*/
                
                /*$user = new User();
                unset($user->user_id);
                $user->username = "UnsetAbstact";
                $user->user_fname = "Abstract";
                $user->user_lname = "TableMethod";
                $user->save();*/
                
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