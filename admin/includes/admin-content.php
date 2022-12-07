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
                echo "<h4 class='media'>The Admin Practice Page</h4>";
                echo "<pre>";
                echo "<pre class='pull-right' style='background-color: #999999; color: antiquewhite; font-size: 16px; width: 92%'>";
                #↓↓ start pre element styled code ↓↓.
                /*$users = User::findAllUsers();
                foreach ($users as $user) {
                    echo $user->user_id . ":-> " . $user->user_fname . " " . $user->user_lname . "<br>";
                }*/
                /*$user_id = 3;
                $user    = User::findUserById($user_id);
                if ($user) {
                    echo "<info class='bg-info' style='color: black;' >$user->user_id: $user->user_fname $user->user_lname</info>";
                } else {
                    echo "<hr>";
                    echo "<warning class='bg-danger' style='color: darkred;'>User ID $user_id not found!</warning>";
                }*/
                /*$trigger = 1;
                if ($trigger != 1) {
                    $create_username            = "One Line query";
                    $create_user_fname          = "curly bracket";
                    $create_user_lname          = "around var";
                    $create_user_pass           = "1357";
                    $create_user                = new User();
                    $create_user->username      = $create_username;
                    $create_user->user_fname    = $create_user_fname;
                    $create_user->user_lname    = $create_user_lname;
                    $create_user->user_password = $create_user_pass;*/
                /*↓↓assign create_user->createUserMethod to done so not to have to use the method in the if statement which created duplicate entries↓↓*/
                /* $user_created = $create_user->createUser();
                 if ($user_created) {
                     echo "User has been successfully created";
                 } else {
                     die("Query Failed <br>");
                 }
                 
             } else echo "Waiting for input, wanna create a user?";*/
                $user_id = 20;
                $user    = User::findUserById($user_id);
                /*$user->user_lname = "Me Update";
                $updated = $user->updateUser();
                if ($updated){
                    echo "User successfully updated";
                } else {
                    die("Query Failed") . "<br>";
                }*/
                /*$deleted = $user->deleteUser();
                if ($deleted) {
                    echo "User successfully Deleted";
                } else {
                    die("Query Failed <br>");
                }*/
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