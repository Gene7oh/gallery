<?php require_once "includes/admin_header.php"; ?>
<!-- Navigation ? -->
<?php
    if ($session->is_signed_in()) {
        redirect('admin');
    }
    if (isset($_POST['submit'])) {
        $user_name = trim($_POST['user_name']);
        $password  = trim($_POST['password']);
//            TODONE METHOD TO CHECK DB FOR USER<---->RETURN USER_FOUND FROM verify_user() METHOD CREATED IN USERS CLASS
        $user_found = Users::verify_user($user_name, $password);
        if ($user_found) {
            $session->login($user_found);
            redirect('index.php');
        } else {
            $message = "One of the two fields is incorrect" . "<br>";
        }
    } else {
        $user_name = null;
        $password  = null;
    }
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="col-md-4 col-md-offset-5">
            <h2>User Login</h2>
            <h4 class="bg bg-danger"><?php if ($user_found = false) {
                    echo $message;
                } ?></h4>
            <form action="" method="post" class="form">
                <div class="input-group">
                    <input name="user_name" type="text" class="form-control" placeholder="User Name">
                </div>
                <div class="input-group">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                </div>
                <button name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php /*require_once "includes/admin_footer.php" ;*/?>