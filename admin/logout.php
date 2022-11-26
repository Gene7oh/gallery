<?php
    require_once "includes/admin-header.php"; ?>
<?php
    /** @noinspection PhpUndefinedVariableInspection */
    $session->logout();
    redirect("login.php");
 ?>