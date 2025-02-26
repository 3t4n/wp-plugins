<?php 
/*
Plugin Name: BlueLevel 3D CSSProgress
Plugin URI: http://www.bluelevel.in/plugins/SPIGallery
Description: Bored of the same ugly, old, slow-loading progress bars? Then try the BlueLevel 3D CSSProgress Bar! Only CSS means no lag! Only 3KB, Loads In a flash!
Author: Bluelevel 
Author URI: http://www.bluelevel.in
version: 1.0
*/

//Calling the files needed to get the Gallery working
function BL_CSSP_files(){
    
    wp_register_style('BL_CSSP', plugins_url('/css/BL-CSSProgress.min.css', __FILE__), true);
    wp_enqueue_style('BL_CSSP');
    wp_enqueue_script('jquery', true);
  
}
add_action('after_setup_theme', 'BL_CSSP_files');

//Adding the shortcode to display the Modal
function BL_CSSP_shortcode($atts){   
	extract( shortcode_atts(
            array(
                'title' => 'Title',
                'color' => 'dark',
                'percentage' => '50',
                'style' => 'ruler-3',
            ), $atts )
        );
	
	
			return		'<div class="progress-factor flexy-item">
							<div class="progress-bar">
									<div class="bar has-rotation has-colors '.$color.' '.$style.'" role="progressbar"  aria-valuemin="0" aria-valuemax="100">
										<div class="tooltip white"></div>
										<div class="bar-face face-position roof percentage"></div>
										<div class="bar-face face-position back percentage"></div>
										<div class="bar-face face-position floor percentage volume-lights"></div>
										<div class="bar-face face-position left"></div>
										<div class="bar-face face-position right"></div>
										<div class="bar-face face-position front percentage volume-lights shine"></div><div class="title" style="transition: all 1s ease-in-out;font-size: 20px;transform: translateY(100px);float: left;"><p>'.$title.'</p></div>
									</div>
								</div>
							</div>
							
						<script>
						( function($){
$.fn.inView = function(){
    //Window Object
    var win = $(window);
    //Object to Check
    obj = $(".progress-factor");
    //the top Scroll Position in the page
    var scrollPosition = win.scrollTop();
    //the end of the visible area in the page, starting from the scroll position
    var visibleArea = win.scrollTop() + win.height();
    //the end of the object to check
    var objEndPos = (obj.offset().top + obj.outerHeight());
    return(visibleArea >= objEndPos && scrollPosition <= objEndPos ? true : false)
};


$(window).scroll(function(){
   if ($(".progress-bar").inView()) {
    $(".has-colors").attr("aria-valuenow", "'.$percentage.'");
} else{
	$(".has-colors").removeAttr("aria-valuenow", "'.$percentage.'");
}
});
})(jQuery);
</script>';

}
add_shortcode('BL_CSSProgress', 'BL_CSSP_shortcode');

add_action( 'admin_head', 'BL_CSSP_add_tinymce' );


function BL_CSSP_add_tinymce() {
    
    add_filter( 'mce_external_plugins', 'BL_CSSP_add_tinymce_plugin' );
    // Add to line 1 form WP TinyMCE
    add_filter( 'mce_buttons', 'BL_CSSP_add_tinymce_button' );
}

// Inlcude the JS for TinyMCE
function BL_CSSP_add_tinymce_plugin( $plugin_array ) {

    $plugin_array['BL_CSSP'] = plugins_url( '/tinymce/tinymce.min.js', __FILE__ );
    // Print all plugin JS path
    return $plugin_array;
}

// Add the button key for address via JS
function BL_CSSP_add_tinymce_button( $buttons ) {

    array_push( $buttons, 'BL_CSSP_button' );
    return $buttons;
}
?>