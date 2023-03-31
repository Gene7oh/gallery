<?php
    include("init.php");
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()) {
        redirect("login.php");
    }
    if (empty($_GET['delete-id'])) {
        redirect("../photos.php?no-photo");
    }
    $photo = Photo::findById($_GET['delete-id']);
    if ($photo) {
        $photo->deletePhoto();
        $session->message("Photo ID: $photo->id has been successfully deleted!");
    } else {
        $session->message("Something went wrong!");
    }
    redirect("../photos.php");