<?php
    include("init.php");
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()) {
        redirect("login.php");
    }
    if (empty($_GET['photo-id'])){
        redirect("../photos.php?no-photo");
    }
    $photo = Photo::findById($_GET['photo-id']);
    if ($photo){
        $photo->deletePhoto();
        redirect("../photos.php?delete-success");
    } else {redirect("../photos.php?no-photo");}