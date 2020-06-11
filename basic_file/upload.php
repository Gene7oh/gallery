<?php
    /**
     * Created by gene7
     * Using PhpStorm
     * Date: 6/11/2020
     */
    if (isset($_POST['submit'])) {
        echo "<pre>";
        print_r($_FILES['upload_file']);
        echo "</pre>";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload </title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="upload_file"> <br>
    <button type="submit" name="submit">Submit</button>
</form>
</body>
</html>
