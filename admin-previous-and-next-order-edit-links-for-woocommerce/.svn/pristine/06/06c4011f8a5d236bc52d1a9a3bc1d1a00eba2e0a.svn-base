jQuery(document).ready(function ( $ ){

    var prev_next_output_html = '<div class="belo_prev_next">';
    
    if(prev_next_script_vars.prev.length > 1){
         prev_next_output_html += '<button type="button" class="prev_buttn button" style=" padding-left: 0px; padding-right: 0px; "><a class="belo_link_buttons prev" style="text-decoration: none!important;padding-right:7px;"href="'+prev_next_script_vars.prev+'">'+prev_next_script_vars.prev_text+'</a></button>';
    }
    if(prev_next_script_vars.next.length > 1){
        prev_next_output_html += '<button type="button" class="next_buttn button" style=" padding-right: 0px;  padding-left: 0px; "><a class="belo_link_buttons next" style="text-decoration: none!important;padding-left:7px;"href="'+prev_next_script_vars.next+'">'+prev_next_script_vars.next_text+'</a></button>';
   }
    prev_next_output_html += '</div>';

    $('.woocommerce-order-data').prepend(prev_next_output_html);
    console.log(prev_next_output_html);
 }   
);