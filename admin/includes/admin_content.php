<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Admin Page
            <small>administration @gallery</small>
        </h1>
        <h2>Admin Content Page <small>actual</small></h2>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
        <p class="lead">
            <?php
                /*$result_set = Users::find_all_users();
                while ($row = mysqli_fetch_array($result_set)) {
                    echo $row['user_fname'] . "<br>";
                }
                $user_id = 3;
                $found_user = Users::user_by_id($user_id);
                if (!$found_user){
                    echo "Unable to locate User With User IF of " . $user_id . "<br>";
                } else {
                    echo $found_user['user_name'] . " has been located. The user ID is " . $found_user['user_id'] . "<br>";
                }*/
                /*$id = 1;
                $find_user = Users::user_by_id($id);
                $user_found = Users::instantiate($find_user);
                echo "The user named " . $user_found->fname . " has been found listed under the Id of " . $user_found->id . " and a user name of " . $user_found->user_name . "<br>";*/
                echo "----------FIND ALL USERS-------------" . "<br>";
                $users = Users::find_all_users();
                foreach ($users as $user) {
                    echo $user->user_name . " found. First name is " . $user->user_fname . " User ID is " . $user->user_id . "<br>";
                }
                echo "-----------SHOW COLUMN NAMES--------------" . "<br>";
                $table_name = "users";
                $database->show_column_names($table_name);
                echo "-----------Ternary Operator--------------" . "<br>";
                $num1      = 5;
                $num2      = 3;
                $sum       = $num1 * $num2;
                $check_sum = ($sum >= 15) ? "Sum is greater or equal to 15" . "<br>" : "Less than 15" . "<br>";
                echo $check_sum;
                $sum_check = ($sum > 15) ? "Sum is greater than 15" . "<br>" : (($sum < 15) ? "Sum is less" . "<br>" : "Sum is equal" . "<br>");
                echo $sum_check;
                echo "----------FIND BY ID------------" . "<br>";
                $uid = 4;
                $find_user = Users::user_by_id($uid);
                /*if ($find_user){
                    echo $find_user->user_name . "<br>";
                }else echo "User Not Found!" . "<br>";*/
                echo $find_user ? $find_user->user_name . "<br>" : "User Not Found" . "<br>";
                echo "------------Auto Add missing Files---------------" . "<br>";
                $bmw = new Cars();
                echo $bmw->found();
                $test = new Test_Class();
                echo $test->runTest();
                /*$truck = new Trucks("Does Not Exist"); Commented out because of the die function in the auto load file function */
                echo "-----------------Sessions Class-----------------" . "<br>";
                
            ?>
        </p>
        
    </div>
</div>
<!-- /.row -->
