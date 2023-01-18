<?php
    /* php tag at the top to suppress errors due to php version differences */
    /** @noinspection PhpUndefinedVariableInspection */
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Gallery <br>
                <small>control panel home</small>
            </h1>
            <?php
                echo "<pre>";
                echo "<pre class='pull-right' style='background-color: #999999; color: antiquewhite; font-size: 16px; width: 95%'>";
                echo "<h4 style='font-family: Montserrat;'>The Admin Practice Page</h4>";
                #↓↓ start pre element styled code ↓↓.
                    ## code here
                echo SITE_ROOT;
                echo "<br>";
                #↑↑ end pre element styled code ↑↑
                echo "</pre>"; /*end tag info display */
                echo "</pre>"; /*the end tag for the light gray background */
            ?>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <!--suppress HtmlUnknownTarget -->
                    <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
            <h3>Need some Lorem for filler?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate dolore, doloremque dolorum ducimus eius esse expedita harum itaque modi molestias nihil officia porro rem rerum, sequi similique tempora
                tempore vero?</p>
        </div>
    </div>
    <!-- /.row -->
</div>