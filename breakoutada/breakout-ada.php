<?php
/**
 * Plugin Name: BreakoutADA Website Accessibility
 * Plugin URI: https://breakoutinternetmedia.com/website-accessibility/
 * Description: BreakoutADA fully automated web accessibility solution. Provide full accessibility and increase your audience while protecting yourself from costly lawsuits.
 * Author: Breakout Internet Media
 * Author URI: https://breakoutinternetmedia.com/
 * Version: 1.1
 * Requires at least: 4.7
 * Tested up to: 6.2
 * Stable tag: 1.1
 * Requires PHP: 7.0
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: breakout
 * © 2023 Breakout Internet Media LLC
 */

add_action( 'wp_footer', 'breakoutada_add_accessible_code_in_footer', 999	 );
function breakoutada_add_accessible_code_in_footer() {
	?>
	<script> (function(){ var s = document.createElement('script'); var h = document.querySelector('head') || document.body; s.src = 'https://acsbapp.com/apps/app/dist/js/app.js'; s.async = true; s.onload = function(){ acsbJS.init({ statementLink : '', footerHtml : 'Powered by Breakout Internet Media', hideMobile : false, hideTrigger : false, disableBgProcess : false, language : 'en', position : 'left', leadColor : '#146ff8', triggerColor : '#146ff8', triggerRadius : '10px', triggerPositionX : 'left', triggerPositionY : 'bottom', triggerIcon : 'people', triggerSize : 'medium', triggerOffsetX : 20, triggerOffsetY : 20, mobile : { triggerSize : 'medium', triggerPositionX : 'left', triggerPositionY : 'bottom', triggerOffsetX : 1, triggerOffsetY : 1, triggerRadius : '10px' } }); }; h.appendChild(s); })(); </script>
	<?php
}

/**
 * Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_page() {
	add_menu_page(
		__( 'BreakoutADA', 'breakout' ),
		'BreakoutADA',
		'manage_options',
		'breakout-ada',
		'breakout_ada_menu_callback'
	);
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

function breakout_ada_menu_callback() {
	?>
<div style="text-align: left">
	<img src="https://breakoutinternetmedia.com/images/breakoutada-logo.png">
		<h3 style="padding-left: 20px;">You have successfully installed</h3>
		<h1 style="padding-left: 20px;"><strong>BreakoutADA Website Accessibility</strong></h1>
		<h1>&nbsp;</h1> 
		<h3 style="padding-left: 20px; color: #c20000;">If you have not done so already, you MUST register your website domain to activate BreakoutADA on your site.</h3>
		<h3 style="padding-left: 20px;">Please register your website <a href="https://breakoutinternetmedia.com/website-accessibility-wordpress-plugin/" target="_blank"><b>HERE</b></a> 
		<h1>&nbsp;</h1> 
		<h3 style="padding-left: 20px;">Once your submission is processed (usually within minutes) you will see the accessibility icon appear in the lower left corner when browsing your website.</h3>
		<h3 style="padding-left: 20px;">At that point your website will be fully accessible and you will receive an updated Accessibility Audit Report confirming that your website is now ADA/WCAG 2.1 Level AA compliant.</h3>
		<h1>&nbsp;</h1> 
		<h3 style="padding-left: 20px;">If you have any questions, please contact <a href="mailto:BreakoutADA@breakoutinternetmedia.com">BreakoutADA@breakoutinternetmedia.com</a></h3>
</div>
	<?php
}


register_activation_hook(__FILE__, function () {
    add_option('breakout_ada_do_activation_redirect', true);
});

/**
 * Redirect To Breakout ADA page on plugin installation.
 *
 * @return void
 */
add_action('admin_init', function () {
    if (get_option('breakout_ada_do_activation_redirect', false)) {
        delete_option('breakout_ada_do_activation_redirect');
        if(wp_safe_redirect(admin_url('admin.php?page=breakout-ada'))) exit();
    }
});