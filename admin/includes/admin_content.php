<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Admin Page
            <small>administration @gallery</small>
        </h1>
        <h2>Admin Content Page <small>actual</small></h2>
        <p class="lead text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cupiditate deleniti dicta dolorem eaque nemo nobis perferendis suscipit tempore velit. Ab aliquam hic libero natus nihil quisquam rem ullam veniam?</p>
        <?php
            $sql = "SELECT * FROM users ";
            $result = $database->query($sql);
            foreach ($result as $record) {
                echo $record['user_fname'] . "<br>";
                echo $record['user_lname'] . "<br>";
            }
            $sql = "SELECT * FROM users WHERE user_id = 1";
            $result = $database->query($sql);
            $user_found = mysqli_fetch_array($result);
            echo $user_found['user_name'];
            echo "========The User Class Instantiate each time ===========" . "<br>";
            $user = new User();
            $users_found = $user->all_users();
            while ($row = mysqli_fetch_array($users_found)) {
                echo $row['user_name'] . " " . $row['user_lname'] . "<br>";
            }
            echo "--------Call Static Method Find All Users Query----------" . "<br>";
            $user_found = User::all_users();
            while ($row = mysqli_fetch_array($user_found)) {
                echo $row['user_name'] . "<br>";
            }
            echo "-------------Static Method to return User by ID-------------" . "<br>";
            $id =1;
           $found= User::user_by_id($id);
           if (!$found){
               echo "User does not exit" . "<br>";
           } else {
               $user = new User();
               $user->user_name = $found['user_name'];
               $user->fname = $found['user_fname'];
               $user->lname = $found['user_lname'];
               $user->password = $found['user_password'];
               echo $user->user_name . " has been located in our database" . "<br>" . ". The first name is $user->fname" . " and the last name is " . $user->lname . " a recorded password of " . $user->password;
           }
           echo "<br>" . gettype($database->connect);
        ?>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
