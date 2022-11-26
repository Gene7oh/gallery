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
                $user_id    = 10;
                $user = User::findUserById($user_id);
                if ($user){
                    echo $user->user_id . ": " . $user->user_fname . " " . $user->user_lname;
                } else {
                    echo "<hr>";
                    echo "<warning style='color: darkred;'>User not found!</warning>";
                }
                
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