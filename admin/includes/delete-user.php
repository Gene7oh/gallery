<?php /** @noinspection DuplicatedCode */
    include("init.php");
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()) {
        redirect("login.php");
    }
    if (!empty($_GET['delete-id'])) {
        $user = User::findById($_GET['delete-id']);
        $id   = "";
        if ($user) {
            $id = $_GET['delete-id'];
            $session->message("User ID: $id has been successfully deleted!");
            $user->deleteUserPhoto();
        } else {
            $session->message("Something went wrong!");
        }
    
    }
    redirect("../users.php");
    