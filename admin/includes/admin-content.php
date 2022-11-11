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
                #↓↓ start pre styled code here ↓↓.
                echo User::findAllUsers();
                $user_id    = 3;
                $found_user = User::findUserById($user_id);
                echo "Found the following " . $found_user['username'] . " " . $found_user['user_fname'] . " " . $found_user['user_lname'];
                    #↑↑ end pre styled code here ↑↑
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