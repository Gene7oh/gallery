<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Admin Page
            <small>administration @gallery</small>
        </h1>
        <h2>Admin Content Page <small>actual</small></h2>
        <p class="lead text-justify">
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
                
            ?>
        </p>
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
