$(document).ready(function () {
    let user_href;
    let user_href_split;
    let user_id;
    let image_src;
    let image_src_split;
    let image_name;
    
    $(".modal-thumbnails").click(function () {
        $("#set_user_image").prop('disabled', false);
        user_href = $("#find_user_id").prop('href');
        user_href_split = user_href.split("=");
        user_id = user_href_split[user_href_split.length -1];
        // alert(user_id);
        image_src = $(this).prop("src");
        image_src_split = image_src.split("/");
        image_name = image_src_split[image_src_split.length -1];
        alert(image_name);
    });
    /* ↓↓ Text Editor embed code ↓↓ */
    $('#summernote').summernote({
        height: 125
    });
    
});
/*$(document).ready(function () {

});*/

/* for any future use of the editor */
/* $(document).ready(function () {
    $('#summernoteII').summernote({
        height: 125
    });
});*/