<?php require_once "includes/admin_header.php"; ?>
    <!-- Navigation ? -->
<?php
    if ($session->is_signed_in()) {
        redirect('admin');
    }
    if (isset($_POST['submit'])) {
        $user_name = trim($_POST['user_name']);
        $password  = trim($_POST['password']);
//            METHOD TO CHECK DB FOR USER<---->RETURN USER_FOUND FROM verify_user() METHOD CREATED IN USERS CLASS
        $user_found = Users::verify_user($user_name, $password);
        if ($user_found) {
            $session->login($user_found);
            redirect('index.php');
        } else {
            $message = "**One of the fields is, or both fields are; Incorrect**" . " <i class= 'fa fa-frown-o'></i> <i class= 'fa fa-frown-o'></i>" . "<br>";
        }
    } else {
        $user_name = "";
        $password  = null;
        $message   = "";
    }
    if (isset($_POST['return'])) {
        redirect("../index.php");
    }
?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="col-md-4 col-md-offset-4">
                <h2>User Login </h2>
                <h4 style="color: darkred" class="bg bg-danger"><?php echo $message ?></h4>
                <form action="" method="post" class="form">
                    <div class="form-group">
                        <label for="user_name">User Name</label>
                        <input name="user_name" type="text" class="form-control" placeholder="User Name" value="<?php echo htmlentities($user_name); ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button name="submit" class="btn btn-primary">Submit</button>
                        <button name="return" class="btn btn-primary">Home</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require_once "includes/admin_footer.php" ; ?>