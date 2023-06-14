<?php require_once "includes/header.php"; ?>
<?php
if ($session->isSignedIn()) {
    redirect("index.php");
}
if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    // check db for user ↓↓
    $user_found = User::verifyUser($username, $password);
    if ($user_found) {
        $session->logIn($user_found);
        redirect("index.php");
    } else {
    }
    $message = "Invalid Credentials";
} else {
    $username = "";
    $password = "";
    $message = "";
}

?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                <h4 class="bg-danger"><?php echo $message; ?></h4>
                <form id="login-id" action="" method="post">
                    <div class="form-group">
                        <label style="color: whitesmoke" for="username">Username</label>
                        <input type="text" class="form-control" name="username"
                               value="<?php echo htmlentities($username); ?>">
                    </div>
                    <div class="form-group">
                        <label style="color: whitesmoke" for="password">Password</label>
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>