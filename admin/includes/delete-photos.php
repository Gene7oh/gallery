<?php
    include("init.php");
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()) {
        redirect("login.php");
    }
    if (empty($_GET['delete-id'])){
        redirect("../photos.php?no-photo");
    }
    $photo = Photo::findById($_GET['delete-id']);
    if ($photo){
        $photo->deletePhoto();
        redirect("../photos.php?delete-success");
    } else {redirect("../photos.php?no-photo");}