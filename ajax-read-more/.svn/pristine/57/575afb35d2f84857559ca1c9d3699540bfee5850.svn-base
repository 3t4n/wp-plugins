<?php 

require_once('ajax-read-more-options.php');

function is_ajax_read_more() {
	return ( isset ( $_GET['ajax-read-more-mode'] ) ) ? ($_GET['ajax-read-more-mode']) : false ;
}

if (is_admin()) {
	include_once('admin/admin.php');
};

add_action('init', 'ajax_read_more_init');

function ajax_read_more_init() {
	global $ajax_read_more_cfg;
	global $options_script_position_cfg;
	
	$ajax_read_more_cfg['options'] = ajax_read_more_validate_options(
		get_option($ajax_read_more_cfg['options_id'])
	);

    if(!is_admin()) {
		if(!is_ajax_read_more()) {
			add_filter('the_content', 'ajax_read_more_the_content', 11); 
		} else {
			add_action('template_redirect', 'ajax_read_more_template_redirect');
		};
		require_once('jquery/ajax/readmore/jquery.ajax.readmore.php');
		include_once('css/styles.php');
		add_action('wp_enqueue_scripts', 'ajax_read_more_wp_enqueue_scripts');
	};
};

function ajax_read_more_wp_enqueue_scripts() {
	global $ajax_read_more_cfg;

	wp_register_script(
		'readmore', 
		$ajax_read_more_cfg['url'] . "ajax-read-more.js",
		array('jquery.ajax.readmore'),
		$ajax_read_more_cfg['ver'],
		get_option('options-script-position') == 'footer'
	);
	wp_enqueue_script('readmore');

	if ( count ( $ajax_read_more_cfg['options'] ) ) {
		wp_localize_script(
			'readmore',
			'AJAXReadMoreConfig',
 			$ajax_read_more_cfg['options']
		);	
	};
};

function ajax_read_more_the_content($content) {
	global $more;
	if (!is_singular() and !is_feed() and !$more) {
		return 
			'<div id="post-entry-excerpt-' . get_the_ID() . '" class="entry-part">'
			. ajax_read_more_sanitize_content($content)
			. '</div>'
			. '<div id="post-footer-' . get_the_ID() . '" class="post-footer clear">'
			. apply_filters( 'the_content_footer', '' )
			. '</div>'
		;
	} else {
		return $content;
	};
};

function ajax_read_more_template_redirect() {
	if (have_posts()) {
		include('inc/ajax-response-templates/single.php');
	};
	exit();
};

function ajax_read_more_sanitize_content($content) {
	return 
		preg_replace(
			'/<p>\s*<\/p>/s',
			'',
			force_balance_tags($content)
		)
	;
};

?>