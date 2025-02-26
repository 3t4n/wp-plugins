jQuery(document).ready(function($) {
    "use strict";
    $( "#title" ).change(function() {
        if($(this).val() !== ""){
            var this_post_id;
            this_post_id = "";
            if($("#post_ID").val()){
                this_post_id = $("#post_ID").val();
            }
            var data = {
                'action': 'my_action',
                'this_convidado_title': $(this).val(),
                'post_type': 'post',
                'post_ID' : this_post_id
            };
            jQuery.post(ajax_object.ajax_url, data, function(response) {
                if(response > 0){
                    alert('Đã có bài với tiêu đề này được đăng, vui lòng kiểm tra lại!');
                }
            });
        }
    });
});   