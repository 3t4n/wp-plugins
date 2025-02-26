//image upload
jQuery(document).ready(function($) {
    //handle uploading book cover
    //initialize wordpress media upload for front cover
    var frontCoverUploader = wp.media({
        title:  'Select or Upload Front Cover',
        button: {
            text: 'Use this as Cover'
        },
        multiple: false
    });
    // initialize media uploader for back cover
    var backCoverUploader = wp.media({
        title:  'Select or Upload Back Cover',
        button: {
            text: 'Use this as Cover'
        },
        multiple: false
    });

    // trigger front cover media uploader on btn click event
    $("#bs3d_front_cover_upload").on('click', function (event) {
        event.preventDefault();
        frontCoverUploader.open();
    });


    // trigger back cover media uploader on btn click event
    $("#bs3d_back_cover_upload").on('click', function (event) {
        event.preventDefault();
        backCoverUploader.open();
    });

    // get and set the front cover
    frontCoverUploader.on('select', function() {
       var frontAttachment  = frontCoverUploader.state().get('selection').first().toJSON();
       $("#bs3d_front_cover").val(frontAttachment.url);
    })
    // get and set the back cover
    backCoverUploader.on('select', function() {
        var backAttachment  = backCoverUploader.state().get('selection').first().toJSON();
        $("#bs3d_back_cover").val(backAttachment.url);
    })






    //activate color picker
    console.log('colorpicker loaded');
    $('#bs3d_book_bg_color, #bs3d_book_nav_hover_color, #bs3d_book_cover_bg_color, #bs3d_book_title_color, #bs3d_book_button_color, #bs3d_book_button_bg_color, #bs3d_book_button_color_hover, #bs3d_book_nav_bg_color, #bs3d_book_nav_color, #bs3d_book_excerpt_color, #bs3d_author_book_title_color, #bs3d_page_nav_bg_color, #bs3d_page_nav_hover_color, #bs3d_page_nav_color, #bs3d_download_btn_bg_color, #bs3d_download_btn_hover_color, #bs3d_download_btn_text_color').wpColorPicker();

});

//tabs and refactor later by combining.
jQuery(document).ready(function($) {

    $(".bs3d-tabs-menu a").on('click', function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".bs3d-tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });

    $('.bs3d-checkbox-wrapper, #bs3d_book_by_id, #bs3d_book_from_year, #bs3d_book_by_author, #bs3d_book_from_month, #bs3d_book_from_month_year').hide();

    $('input[type="radio"]').click(function() {
        if($(this).attr('id') == 'bs3d_book_query_type3') {
            $('.bs3d-checkbox-wrapper').show();
        }
        else {
            $('.bs3d-checkbox-wrapper').hide();
        }
    });

    $('input[type="radio"]').click(function() {
        if($(this).attr('id') == 'bs3d_book_query_type4') {
            $('#bs3d_book_by_id').show();
        }
        else {
            $('#bs3d_book_by_id').hide();
        }
    });

    $('input[type="radio"]').click(function() {
        if($(this).attr('id') == 'bs3d_book_query_type5') {
            $('#bs3d_book_from_year').show();
        }
        else {
            $('#bs3d_book_from_year').hide();
        }
    });

    $('input[type="radio"]').click(function() {
        if($(this).attr('id') == 'bs3d_book_query_type_author') {
            $('#bs3d_book_by_author').show();
        }
        else {
            $('#bs3d_book_by_author').hide();
        }
    });

    $('input[type="radio"]').click(function() {
        if($(this).attr('id') == 'bs3d_book_query_type6') {
            $('#bs3d_book_from_month, #bs3d_book_from_month_year').show();
        }
        else {
            $('#bs3d_book_from_month, #bs3d_book_from_month_year').hide();
        }
    });

    if( $('input[id=bs3d_book_query_type_author]').is(':checked') ) {
        $('#bs3d_book_by_author').addClass('bs3d-active');
    }

    if( $('input[id=bs3d_book_query_type3]').is(':checked') ) {
        $('.bs3d-checkbox-wrapper').addClass('bs3d-active');
    }
    if( $('input[id=bs3d_book_query_type4]').is(':checked') ) {
        $('#bs3d_book_by_id').addClass('bs3d-active');
    }
    if( $('input[id=bs3d_book_query_type5]').is(':checked') ) {
        $('#bs3d_book_from_year').addClass('bs3d-active');
    }
    if( $('input[id=bs3d_book_query_type6]').is(':checked') ) {
        $('#bs3d_book_from_month, #bs3d_book_from_month_year').addClass('bs3d-active');
    }

});