<?php
    /* php tag at the top to suppress errors due to php version differences */
    /** @noinspection PhpUndefinedVariableInspection */
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Gallery
                <small>Admin Page</small>
            </h1>
                <pre class='' style='background-color: #999999; color: antiquewhite;'>
            <?php
                echo "<h4 style='font-family: Montserrat;'>The Admin Practice Page</h4>";
                #↓↓ start pre element styled code ↓↓.
                    ## code here
                $user = new User();
                $photo = new Photo();
                echo $user->placeholderOrImage() . "<br>";
                echo  INCLUDES_PATH. DS.$photo->picturePath();;
                echo "<br>";
            ?>
                </pre>
            <div class="col-sm-6">
                <p class="lead">Left Column Lead Paragraph</p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aperiam at eos id mollitia nihil nobis, numquam optio possimus quam quas, sed, voluptatem. A at, cum eius excepturi illo quam.
                </p>
            </div>
            <div class="col-sm-6"><h3>Need some Lorem for filler?</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate dolore, doloremque dolorum ducimus eius esse expedita harum itaque modi molestias nihil officia porro rem rerum, sequi similique tempora
                    tempore vero?</p></div>
        </div>
    </div>
    <!-- /.row -->
</div>