<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Admin Page
            <small>administration @gallery</small>
        </h1>
        <h2>Admin Content Page <small>actual</small></h2>
        <p class="lead text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cupiditate deleniti dicta dolorem eaque nemo nobis perferendis suscipit tempore velit. Ab aliquam hic libero natus nihil quisquam rem ullam veniam?</p>
        <?php
            echo "-------Query the database class -----------" . "<br>";
            
            echo "========The User Class Instantiate each time ===========" . "<br>";
           
            echo "--------Call Static Method Find All Users Query----------" . "<br>";
            
            echo "-------------Static Method to return User by ID-------------" . "<br>";
            
//            echo "<br>" . gettype($database->connect) . "<br>";
            echo "---------AUTO INSTANTIATE BY USER ID-------------" . "<br>";
            
            echo "-------------AUTO INSTANTIATE METHOD with loop in the method-------" . "<br>";
           
        ?>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
