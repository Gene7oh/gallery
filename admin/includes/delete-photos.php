<?php
    include("init.php");
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()){redirect("login.php");}
    $id="";
    if (isset($_GET['photo-id'])){
        $id = $_GET['photo-id'];
    }
    /*(isset($_GET['photo-id'])) ? $id =$_GET['photo-id'] : false;*/
    echo "You have successfully reached the delete photos page now pending code to delete photo with the ID of " . $id;
    echo "<br> Return to <a href='../photos.php'>photos page</a>";