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
                /*echo "----------FIND ALL USERS-------------" . "<br>";
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
                echo $find_user ? $find_user->user_name . "<br>" : "User Not Found" . "<br>";
                echo "------------Auto Add missing Files---------------" . "<br>";
                $bmw = new Cars();
                echo $bmw->found();
                $test = new Test_Class();
                echo $test->runTest();
                $truck = new Trucks("Does Not Exist");*/
                echo "-----------------Sessions Class-----------------" . "<br>";
                
            ?>
        </p>
        
    </div>
</div>
<!-- /.row -->
