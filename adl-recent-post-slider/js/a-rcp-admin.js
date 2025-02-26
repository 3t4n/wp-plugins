jQuery(document).ready(function($) {

    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });

//    COLOR PICKER

    //$('#adl_rec_post_header_title_font_color, #adl_rec_post_nav_arrow_color, #adl_rec_post_nav_arrow_bg_color').wpColorPicker();
    $('#adl_rec_post_header_title_font_color, #adl_rec_post_title_font_color, #adl_rec_post_title_hover_font_color, #adl_rec_post_nav_arrow_color, #adl_rec_post_nav_arrow_bg_color, #adl_rec_post_nav_arrow_hover_color, #adl_rec_post_nav_arrow_bg_hover_color, #adl_rec_post_border_color, #adl_rec_post_border_hover_color').wpColorPicker();




    // image uploader
    $('#upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Select or Upload Default Featured Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).open()
            .on('select', function(){
                // This will return the selected image from the Media Uploader, the result is an object,
                var uploaded_image = image.state().get('selection').first().toJSON();
                // Let's assign the url value to the input field
                $('#adl_rec_post_default_feat_img').val(uploaded_image.url);
            });
    });


});

