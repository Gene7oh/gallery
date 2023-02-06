<?php
    include("init.php");
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()) {
        redirect("login.php");
    }
    if (empty($_GET['comment-delete-id'])) {
        redirect("../comments.php?no-comment");
    }
    $comment = Comment::findById($_GET['comment-delete-id']);
    if ($comment) {
        $comment->delete();
        $redirect_id = $comment->photo_id;
        redirect("../comment-photo.php?view-comment-id=$redirect_id&del-comm-success");
    }