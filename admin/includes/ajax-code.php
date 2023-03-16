<?php
    require("init.php");
    $users = new User();
    if (isset($_POST['image_title'])) {
        $user_id = $_POST['user_id'];
        $title   = $_POST['image_title'];
        $users->ajaxSaveUserImage($title, $user_id);
        refresh("0", "../edit-user.php?edit-id=$user_id");
    }