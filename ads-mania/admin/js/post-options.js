jQuery(document).ready(function() {
        // these functions detect what happens when upload an image
	jQuery('#upload_image_button').click(function() {
        formfield = jQuery('#upload_image').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });

    window.send_to_editor = function(html) {
        imgurl = jQuery('img',html).attr('src');
        jQuery('#ads_image_file').val(imgurl);
        jQuery('#ads_image_thumbnail').prop('src',imgurl).show();
        tb_remove();
    }


    // control which displayed and which hidden based on ads type
	jQuery('#ads_type').change(function() {
		switch(jQuery(this).val())
		{
                    case 'ads_hidden':
                            jQuery('#content-meta').hide();
                            opt_display('link');
                    break;

                    default:
                            jQuery('#content-meta').show();
                            jQuery('#link-meta').hide();
                            opt_display(jQuery('#ads_content').val());
                    break;
		}
	});

	jQuery('#ads_type').change(function() {
		view_in_display(jQuery(this).val());
	});

	jQuery('#ads_content').change(function() {
		opt_display(jQuery(this).val());
	});

	jQuery('#ads_view_in').change(function() {
		view_in_opt_display(jQuery(this).val());
	});

	jQuery('#ads_code_box_b_c').wpColorPicker();

	jQuery( "#ads_start_at, #ads_end_at" ).datepicker({ dateFormat: 'dd-mm-yy' });

});

// this function to show/hide meta boxes
function opt_display(box)
{
    // hide all divs
    jQuery('.opt_box').hide();
    // then detect which should displayed
    switch(box)
    {
            case 'yt': jQuery('#media-meta').show(); break;
            case 'vimeo': jQuery('#media-meta').show(); break;
            case 'soundcloud': jQuery('#sound-meta').show(); break;
            case 'adsense': jQuery('#adsense-meta').show(); break;
            case 'fb': jQuery('#fb-meta').show(); break;
            case 'code': jQuery('#code-meta').show(); break;
            case 'code_box': jQuery('#code_box-meta').show(); break;
            case 'link': jQuery('#link-meta').show(); break;
            case 'image': jQuery('#image-meta').show(); break;
    }
}

// this function to show/hide view in list
function view_in_display(opt)
{
        jQuery('#view_in-meta').hide();
        switch(opt)
        {
            case 'ads_content':
              jQuery('#view_in-meta').hide();
            break;
            default:
              jQuery('#view_in-meta').show();
            break;
        }
}

// this function show/hide options of some (view in) fields
function view_in_opt_display(opt)
{
	// hide sub options
        jQuery('.view_in_opt').hide();

        switch(opt)
        {
            case 'spec_category':
              jQuery('#ads_categories').show();
            break;
            case 'posts':
              jQuery('#ads_post_ids').show();
            break;
            case 'pages':
              jQuery('#ads_page_ids').show();
            break;
        }
}