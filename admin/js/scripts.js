$(document).ready(function () {
    let user_href;
    let user_href_split;
    let user_id;
    let image_src;
    let image_src_split;
    let image_title;
    /** ☺☻♥↓↓ Edit User change image modal ↓↓♥☻☺ */
    $(".modal-thumbnails").click(function () {
        $("#set_user_image").prop('disabled', false);
        /** ↓↓ User ID ↓↓ *****/
        user_href = $("#find_user_id").prop('href');
        user_href_split = user_href.split("=");
        user_id = user_href_split[user_href_split.length - 1];
        /*alert(user_id);*/
        /** image title ↓ ↓ *****/
        image_src = $(this).prop("src");
        image_src_split = image_src.split("/");
        image_title = image_src_split[image_src_split.length - 1];
        /* alert(image_title); */
    });
    $("#set_user_image").click(function () {
        $.ajax({
            url: "includes/ajax-code.php",
            data: {image_title: image_title, user_id: user_id},
            type: "POST",
            success: function (data) {
                if (!data.error) {
                $(".user-image-box").prop('src', data);
                }
            }
        });
    });
    
    /* ↓↓ Text Editor embed code ↓↓ */
    $('#summernote').summernote({
        height: 125
    });
});
/*    ↑↑ End Doc.ready ↑↑ */

/* for any future use of the editor */
/* $('#summernoteII').summernote({
     height: 125
 });*/