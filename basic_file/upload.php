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
    <hr>
    <h3>
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
                    $upload_errors = array(
                        UPLOAD_ERR_OK => 'The file successfully uploaded',
                        UPLOAD_ERR_INI_SIZE => 'File exceeded max file size',
                        UPLOAD_ERR_PARTIAL => 'Not all of the file was uploaded',
                        UPLOAD_ERR_NO_FILE => 'You must choose a file first',
                        UPLOAD_ERR_NO_TMP_DIR => 'Missing temp directory',
                        UPLOAD_ERR_CANT_WRITE => 'Failed to write to disk',
                        UPLOAD_ERR_EXTENSION => 'Incorrect file extension terminated the process'
                    );
                    $err = $_FILES['upload_file']['error'];
                    $err_msg = $upload_errors[$err];
                    if (!empty($upload_errors)){
                        echo $err_msg;
                    }
            }
        ?>
    </h3>
    <input type="file" name="upload_file"> <br>
    <button type="submit" name="submit">Submit</button>
    <hr>
</form>
<div>
    <button><a href="index.php">Home</a></button>
</div>
</body>
</html>
