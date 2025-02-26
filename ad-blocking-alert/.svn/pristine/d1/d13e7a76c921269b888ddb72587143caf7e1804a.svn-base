jQuery(document).ready(function($) {
    var formfield;
 
    $(document).on("click", '.browse_button', function() {
        formfield = $(".image_location"); //The input field that will hold the uploaded file url
        tb_show('','media-upload.php?TB_iframe=true');
 
        return false;
 
    });
    
	window.old_tb_remove = window.tb_remove;
    window.tb_remove = function() {
        window.old_tb_remove(); // calls the tb_remove() of the Thickbox plugin
        //formfield=null;
    };
 
    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html){
        if (formfield) {
            fileurl = jQuery('img',html).attr('src');
			$("#image_src").attr("src", fileurl);
            $(".image_location").attr("value", fileurl);
            tb_remove();
        } else {
            window.original_send_to_editor(html);
        }
    };
});