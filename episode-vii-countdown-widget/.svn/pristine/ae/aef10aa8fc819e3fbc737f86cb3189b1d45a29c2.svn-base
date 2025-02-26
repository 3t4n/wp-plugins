jQuery(document).ready(function() {
    jQuery(document).on('click', '.wb-datepicker', function(event) {
		jQuery(this).datepicker('destroy').datepicker({dateFormat : 'yy-mm-dd'}).focus();
	});
    jQuery(document).on("click", ".upload_image_button", function() {

        jQuery.data(document.body, 'prevElement', jQuery(this).prev());

        window.send_to_editor = function(html) {
            var imgurl = jQuery('img',html).attr('src');
            var inputText = jQuery.data(document.body, 'prevElement');

            if(inputText != undefined && inputText != '')
            {
                inputText.val(imgurl);
            }

            tb_remove();
        };

        tb_show('', 'media-upload.php?type=image&TB_iframe=true');
        return false;
    });
});
