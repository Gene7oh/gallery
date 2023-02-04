<?php
    include("init.php");
    /** @noinspection PhpUndefinedVariableInspection */
    if (!$session->isSignedIn()) {
        redirect("login.php");
    }
    if (empty($_GET['delete-comment-id'])) {
        redirect("../comments.php?no-comment");
    }
    $comment = Comment::findById($_GET['delete-comment-id']);
    if ($comment) {
        $comment->delete();
        redirect("../comments.php?comment-delete-success");
    } else {
        redirect("../comments.php?no-comment");
    }