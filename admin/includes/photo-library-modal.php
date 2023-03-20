<?php
    require_once "init.php";
    $photos = Photo::findAll();
?>
<div class="modal fade" id="photo-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">System <small>Gallery Library</small></h4>
            </div>
            <div class="modal-body">
                <div class="col-md-8">
                    <div class="row thumbnail">
                        <!-- PHP LOOP HERE CODE HERE-->
                        <?php foreach ($photos as $photo) : ?>
                            <div class="col-xs-4">
                                <a role="checkbox" aria-checked="false" tabindex="0" id="" href="#" class="thumbnail">
                                    <img class="modal-thumbnails img-responsive image-shadow" src="<?php echo $photo->picturePath(); ?>" data="<?php echo $photo->id; ?>">
                                </a>
                                <div class="get-photo-filename hidden"></div>
                            </div>
                        <?php endforeach; ?>
                        <!-- PHP LOOP ENDS HERE CODE HERE-->
                    </div>
                </div><!--col-md-9 -->
                <div class="col-md-4">
                    <div id="modal_sidebar">
                        <div class="photo-info-box">
                            <div class="inside">
                                <div class="box-inner">
                               <!-- Called from scripts.js using the ajax-code.php file -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Modal Body-->
            <div class="modal-footer">
                <div class="row">
                    <!--Closes Modal-->
                    <button id="set_user_image" type="button" class="btn btn-primary" disabled="true" data-dismiss="modal">Apply Selection</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
