<?php
    require_once "includes/admin-header.php"; ?>
<?php
    /** @noinspection PhpUndefinedVariableInspection */
    if ($session->isSignedIn()) {
        redirect("index.php");
    }
    if (isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        /*↓↓method to contact db and verify the user↓↓*/
        $user_found_array = User::verifyUser($username, $password);
        if ($user_found_array) {
            $session->login($user_found_array);
            redirect("index.php");
        } else {
            $login_err_msg = "Password or Username incorrect! <br> Try again or go back to the Home Page <a href='../index.php'>here</a>";
        }
    } /* End if isset submit */ else {
        // place value in var to stop undefined var from login form
        $username = "";
        $password = "";
        $login_err_msg = "";
    }
?>
<div class="col-md-4 col-md-offset-3">
    <h4 class="bg-danger"><?php
            echo $login_err_msg; ?></h4>
    <form id="login-id" action="" method="post">
        <div style="color: whitesmoke !important;" class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php
                echo htmlentities($username); ?>">
        </div>
        <div style="color: whitesmoke !important;" class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="" >
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
    <?php
        include "includes/admin-footer.php";
    ?>
</div>