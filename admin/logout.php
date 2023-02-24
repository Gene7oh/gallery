<?php require_once "includes/admin-header.php"; ?>
<?php
    /** @noinspection PhpUndefinedVariableInspection */
    $session->resetCount();
    $session->logout();
    redirect("login.php?logout_success");
 ?>