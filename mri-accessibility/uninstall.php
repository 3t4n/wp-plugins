<?php
	// If uninstall is not called from WordPress, exit
	if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	    exit();
	}
	delete_option( 'org_contrast_setup' );
	delete_option( 'org_font_setup' );
	delete_option( 'org_font_setup_type' );
	delete_option( 'org_font_setup_title' );
	delete_option( 'org_reset_font_size' );
	delete_option( 'org_close_button_title' );
	delete_option( 'org_role_links_setup');
	delete_option( 'org_remove_link_titles' );
	delete_option( 'org_underline_links_setup' );
	delete_option( 'org_underline_links_setup_title' );
	delete_option( 'org_remove_styles_setup' );
	delete_option( 'org_remove_styles_setup_title' );
	delete_option( 'org_contrast_setup_title' );
	delete_option( 'org_image_url' );
	delete_option( 'org_header_element_selector' );
	delete_option( 'org_sidebar_element_selector' );
	delete_option( 'org_footer_element_selector' );
	delete_option( 'org_main_element_selector' );
	delete_option( 'org_nav_element_selector' );
	delete_option( 'org_custom_css' );
	delete_option( 'org_remove_styles_title' );
	delete_option( 'org_clear_cookies_title');
	delete_option( 'org_hidden_stats');
	delete_option( 'org_choose_color_title');
	delete_option( 'org_on_off_title');
	delete_option( 'org_custom_font');
	delete_option( 'org_keyboard_navigation_setup');
	delete_option( 'org_keyboard_navigation_title');
	delete_option( 'org_readable_fonts_setup');
	delete_option( 'org_readable_fonts_title');
	delete_option( 'org_left_side');
	delete_option( 'org_hide_on_mobile');
	delete_option( 'org_greyscale_title');
	delete_option( 'org_greyscale_enable');
	delete_option( 'org_darktheme_enable');
	delete_option( 'org_highlight_links_enable');
	delete_option( 'org_highlight_links_title');
	delete_option( 'org_invert_enable');
	delete_option( 'org_invert_title');
	delete_option( 'org_remove_animations_setup');
	delete_option( 'org_remove_animations_title');
	delete_option( 'org_stats');
	delete_option( 'org_sidebar_widgets_order');
	delete_option( 'org_author_credits');
	delete_option( 'org_contrast_variations');
	delete_option( 'org_lights_off_setup');
	delete_option( 'org_lights_off_title');
	delete_option( 'org_lights_selector');
?>
