/*! asg_shortcode.js v1.0 */
jQuery(function($){
    $(document).ready(function() {
        $(".asg-expander").click(function(){
            //get collapse content selector
            var collapse_content_selector = $(this).attr('href');
            $(collapse_content_selector).toggle("slow","linear");
            var tog_image = document.getElementById($(this).find('img').attr('id'));
            $(tog_image).toggleClass("asg-side asg-down");
            return false;
        }); 
    });
});