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
            echo "========The User Class ===========" . "<br>";
            $user = new User();
            $users_found = $user->find_all_users();
            while ($row = mysqli_fetch_array($users_found)) {
                echo $row['user_name'] . " " . $row['user_lname'] . "<br>";
            }
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