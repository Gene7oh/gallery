<?php
require_once "init.php";
if ($session->isSignedIn()) {
    redirect("../index.php");
}
if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    // create check db for user here ↓↓
    $user_found = User::verifyUser($username, $password);
    if ($user_found) {
        $session->logOut($user_found);
        redirect("../index.php");
    } else {
        /* ↓↓ replace with Session class method eventually */
        $the_message = "Incorrect credentials";
    }
} else {
    $username = "";
    $password = "";
}
echo "This is the login page";