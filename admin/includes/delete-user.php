<?php /** @noinspection DuplicatedCode */
    include("init.php");
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()) {
        redirect("login.php");
    }
    if (empty($_GET['delete-id'])) {
        redirect("../users.php");
    } else {
        $user = User::findById($_GET['delete-id']);
        $id="";
        if ($user) {
            $id = $_GET['delete-id'];
            $user->deleteUser();
            redirect("../users.php?delete-success&id=$id");
        } else {
            redirect("../users.php?delete-error&id=$id");
        }
    }
    