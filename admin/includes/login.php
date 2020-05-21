<?php
    /**
     * Created by gene7
     * Using PhpStorm
     * Date: 5/21/2020
     */
    require_once "init.php";
    if (isset($_GET['Nedry'])) {
        include_once "nedry.php";
    }
?>
<div class="col-md-8">
    <h2>You have to be <small>Signed in to view this area</small></h2>
    <form action="" method="post" class="form-group">
        <div class="form-control">
            <input type="text" class="form-group" placeholder="User Name">
        </div>
        <div class="form-control">
            <input type="password" class="form-group" placeholder="Password">
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
