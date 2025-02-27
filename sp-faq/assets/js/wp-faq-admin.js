(function($) {

	"use strict";

	/* Vertical Tab */
	$( document ).on( "click", ".wp-faq-vtab-nav a", function() {

		$(".wp-faq-vtab-nav").removeClass('wp-faq-active-vtab');
		$(this).parent('.wp-faq-vtab-nav').addClass("wp-faq-active-vtab");

		var selected_tab = $(this).attr("href");
		$('.wp-faq-vtab-cnt').hide();

		/* Show the selected tab content */
		$(selected_tab).show();

		/* Pass selected tab */
		$('.wp-faq-selected-tab').val(selected_tab);
		return false;
	});

	/* Remain selected tab for user */
	if( $('.wp-faq-selected-tab').length > 0 ) {
		
		var sel_tab = $('.wp-faq-selected-tab').val();

		if( typeof(sel_tab) !== 'undefined' && sel_tab != '' && $(sel_tab).length > 0 ) {
			$('.wp-faq-vtab-nav [href="'+sel_tab+'"]').click();
		} else {
			$('.wp-faq-vtab-nav:first-child a').click();
		}
	}

	/* Click to Copy the Text */
	$(document).on('click', '.wpos-copy-clipboard', function() {
		var copyText = $(this);
		copyText.select();
		document.execCommand("copy");
	});

	/* Drag widget event to render layout for Beaver Builder */
	$('.fl-builder-content').on( 'fl-builder.preview-rendered', wp_faq_fl_render_preview );

	/* Save widget event to render layout for Beaver Builder */
	$('.fl-builder-content').on( 'fl-builder.layout-rendered', wp_faq_fl_render_preview );

	/* Publish button event to render layout for Beaver Builder */
	$('.fl-builder-content').on( 'fl-builder.didSaveNodeSettings', wp_faq_fl_render_preview );
})(jQuery);

/* Function to render shortcode preview for Beaver Builder */
function wp_faq_fl_render_preview() {
	wp_faq_accordion_init();
}