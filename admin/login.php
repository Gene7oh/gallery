<?php require_once "includes/init.php"; ?>
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
    $message = "Invalid Credetials";
} else {
    $username = "";
    $password = "";
}

?>
