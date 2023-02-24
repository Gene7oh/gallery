<?php require_once "includes/admin-header.php"; ?>
<?php
    /** @noinspection PhpUndefinedVariableInspection */
    if ($session->isSignedIn()) {
        redirect("index.php");
    }
   /* Declare ↓↓ vars to prevent undefined errors in editor and site pages */
    $username       = "";
    $password       = "";
    $status_message = "";
    if (isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        /*↓↓method to contact db and verify the user↓↓ and returned as an object array*/
        $user_found = User::verifyUser($username, $password);
        if ($user_found) {
            $session->login($user_found);
            redirect("index.php");
        } else {
            $status_message = "Password or Username incorrect! <br> Try again or go back to the Home Page <a href='../index.php'>here</a>";
        }
    } /* End if isset submit */ /*else {
        $username       = "";
        $password       = "";
        $status_message = "";
    }*/
    if (isset($_GET['logout_success'])) {
        $status_message = "Log Out Successful";
        refresh(3, 'index.php');
    }
?>
<div class="col-md-4 col-md-offset-3">
    <div class="form-group pull-right"><a style="text-decoration: none; color: whitesmoke;" class="navbar-link" href="../index.php">Home</a></div>
    <h4 class="bg-danger pull-left"><?php echo $status_message; ?></h4>
    <form id="login-id" action="" method="post">
        <div style="color: whitesmoke !important;" class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>">
        </div>
        <div style="color: whitesmoke !important;" class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
    <?php include "includes/admin-footer.php"; ?>
</div>
