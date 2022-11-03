<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Gallery
                <small>Admin Page</small>
            </h1>
            <?php
                $sql        = "SELECT * FROM users WHERE user_id = 1";
                echo "<pre>";
                /** @noinspection PhpUndefinedVariableInspection */
                $result     = $database->query($sql);
                $user_found = mysqli_fetch_array($result);
                echo "Found a user(s) named:" . "<br>" . $user_found['user_fname'] . "<br>" . $user_found['user_lname'];
                echo "</pre>";
                echo "<pre>";
                $user = new User();
                $result = $user->findAllUsers();
                while ($row = mysqli_fetch_array($result)){
                    echo $row['username'] . "<br>";
                }
                echo "<pre>";
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