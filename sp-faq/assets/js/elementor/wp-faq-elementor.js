( function($) {

	'use strict';

	jQuery(window).on('elementor/frontend/init', function() {

		elementorFrontend.hooks.addAction( 'frontend/element_ready/wp-widget-text.default', wp_faq_elementor_init );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/shortcode.default', wp_faq_elementor_init );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/text-editor.default', wp_faq_elementor_init );

		/* Tabs Element */
		elementorFrontend.hooks.addAction( 'frontend/element_ready/tabs.default', function() {
			wp_faq_accordion_init();
		});

		/* Accordion Element */
		elementorFrontend.hooks.addAction( 'frontend/element_ready/accordion.default', function() {
			wp_faq_accordion_init();
		});

		/* Toggle Element */
		elementorFrontend.hooks.addAction( 'frontend/element_ready/toggle.default', function() {
			wp_faq_accordion_init();
		});

	});

	/**
	 * Initialize Plugin Functionality
	 */
	function wp_faq_elementor_init() {
		wp_faq_accordion_init();
	}
})(jQuery);