<?php
    require_once "init.php"; ?>
<?php
    if ($session->isSignedIn()) {
        redirect("index.php");
    }
    if (isset($_POST['submit'])) {
        $username   = trim($_POST['username']);
        $password   = trim($_POST['password']);
        $user_found = User::verifyUser($username, $password);
        if ($user_found) {
            $session->login($user_found);
            redirect("index.php");
        } else {
            $login_err_msg = "<warning style='color: darkred;'>Password or Username incorrect</warning>";
        }
    } /* End if isset submit */ else {
        // place value in var to stop undefined var from login form
        $username = "";
        $password = "";
    }
    echo "This is the login Page";
?>