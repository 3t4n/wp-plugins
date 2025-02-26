(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	
	/* Copy Shortcode */
	 $( document ).ready(function() {
		 jQuery('#aigwl_copy_to_clip_id').on('click',function(){
			var sampleTextarea = document.createElement("textarea");
			document.body.appendChild(sampleTextarea);
			sampleTextarea.value = jQuery('#aigwl_shortcode_id').val(); //save main text in it
			sampleTextarea.select(); //select textarea contenrs
			document.execCommand("copy");
			document.body.removeChild(sampleTextarea);
			$('.aigwl-text-copied-msg').fadeIn(1000);
			$('.aigwl-text-copied-msg').fadeOut(1000);
		 });
		 $(".aigwl-layout-opt").on("click", function () {
			 var current_id = $(this).attr('id');
			 $(".aigwl-layout-opt-img").each(function () {
				 $(this).removeClass('active');
				 if ($(this).data('layout') === current_id) {
					 $(this).addClass('active');
				 }
			 });
		 });
		 
		// Preview Modal 
		
		var layout_modal = document.getElementById("previewModel");
		
		// Get the button that opens the modal
		var previews_btn = document.getElementById("layout_preview");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("preview_close")[0];

		// When the user clicks the button, open the modal 
		previews_btn.onclick = function() {
		  layout_modal.style.display = "block";
		}
		span.onclick = function() {
			layout_modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		if (event.target == layout_modal) {
			layout_modal.style.display = "none";
		}
		}
        /* On Select Change Values */
		jQuery('#aigwl_style').on('change', function() {
			jQuery('.warning_for_fullwidth').hide();
			jQuery('.warning_for_gallery_hover_effect').hide();
		
		  	if(this.value == 1){
			    jQuery('.aigwl_style_output img').hide();
			    jQuery('.aigwl_style_1').show();
				
			}else if(this.value == 2){
			    jQuery('.aigwl_style_output img').hide();
			    jQuery('.aigwl_style_2').show();

			}else if(this.value == 3){
			    jQuery('.aigwl_style_output img').hide();
			    jQuery('.aigwl_style_3').show();
				jQuery('.warning_for_gallery_hover_effect').show();
				
			}else if(this.value == 4){
			    jQuery('.aigwl_style_output img').hide();
			    jQuery('.aigwl_style_4').show();
				jQuery('.warning_for_fullwidth').show();
			}
			else if(this.value == 5){
			    jQuery('.aigwl_style_output img').hide();
			    jQuery('.aigwl_style_5').show();
			}
			else if(this.value == 6){
			    jQuery('.aigwl_style_output img').hide();
			    jQuery('.aigwl_style_6').show();
				jQuery('.warning_for_gallery_hover_effect').show();
			}
			else{
			    jQuery('.aigwl_style_output').hide();
			}
		});
	 });
	 $(window).load(function() {
 	 	var selected_val = jQuery('#aigwl_style').val();
		$('#aigwl_style').val(selected_val).change();
	 });
    
	 
})( jQuery );