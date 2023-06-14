<?php require_once "includes/header.php"; ?>
<?php
$session->logOut($user);
redirect("login.php");
?>
