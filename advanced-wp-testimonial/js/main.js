var awt_switch = 'normal';

jQuery().ready(function(){
    
    jQuery('#awt_upload_client_image').click(function(){
        post_id = jQuery('#post_ID').val();
        awt_switch = 'awt_image';
        tb_show("Client Image", 'media-upload.php?post_id=' + post_id + '&type=image&awt_type=client_image&TB_iframe=1');
        
    });
    
});

window.original_send_to_editor = window.send_to_editor;
window.send_to_editor = function(html) {
    alert(html);
    if(html.length>0){
        alert(html);
        if((html.charCodeAt(0) > 47) && (html.charCodeAt(0)<58)){
            alert(html);
            tb_remove();
        }else{
            window.original_send_to_editor(html);
        }
    }else
        window.original_send_to_editor(html);
};