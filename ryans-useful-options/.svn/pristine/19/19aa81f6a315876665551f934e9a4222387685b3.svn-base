<?php
/*
   Plugin Name: Ryan's Useful Options
   Plugin URI: http://www.ryanpaul.ca
   Description: This plugin amongst other things adds a front end 'Delete', 'Edit', and 'Logout' buttons, with an option to remove attached media from deleted posts/pages, turns off self pingbacks, an option to remove styles from tag clouds, an option to clean up what's outputted from the wp_head function, the option to replace bundled jQuery with Google's latest hosted version, the option to disable user enumeration, the option to disable author archives, and the ability to protect a page and its ancestors through requiring user login by defining page slug of parent page.

Aside from the option to include Bootstrap Grid, it also automatically adds Bootstrap tables, forms, and button CSS to the front-end of this website without adding any typography or other styles included with Bootstrap, adds an "is_child()" function which you can use in your template. Check below for is_child examples.

   Version: 1.6.6
   Author: Ryan Paul
   Author URI: http://www.ryanpaul.ca
   License: GPL2
   */


include( plugin_dir_path( __FILE__ ) . '/is-child.php');
include( plugin_dir_path( __FILE__ ) . '/ryans-options-page.php');
include( plugin_dir_path( __FILE__ ) . '/harmonia.php');
include( plugin_dir_path( __FILE__ ) . '/bxslider.php');

$GLOBALS['removeqstrings'] = myprefix_get_theme_option( 'remove-query-strings' );
$GLOBALS['includebgrid'] = myprefix_get_theme_option( 'include-bootstrap-grid' );
$GLOBALS['deletepattachments'] = myprefix_get_theme_option( 'delete-post-attachments' );
$GLOBALS['changeedots'] = myprefix_get_theme_option( 'change-excerpt-dots' );
$GLOBALS['lcmvalue'] = myprefix_get_theme_option( 'login-custom-message' );
$GLOBALS['clogourl'] = myprefix_get_theme_option( 'custom-logo-url' );
$GLOBALS['pwppages'] = myprefix_get_theme_option( 'user-login-protected-pages' );		
$GLOBALS['harmoniavalue'] = myprefix_get_theme_option( 'include-harmonia-javascript' );
$GLOBALS['menuclass'] = myprefix_get_theme_option( 'main-menu-ul-class' );
$GLOBALS['contributoruploads'] = myprefix_get_theme_option( 'contributor-uploads' );
$GLOBALS['disableothersmedia'] = myprefix_get_theme_option( 'disable-others-media' );
$GLOBALS['addnavsearch'] = myprefix_get_theme_option( 'add-nav-search' );
$GLOBALS['disablexmlrpcping'] = myprefix_get_theme_option( 'disable-xmlrpc-ping' );
$GLOBALS['removeselfping'] = myprefix_get_theme_option( 'remove-self-ping' );
$GLOBALS['removetagcloudstyles'] = myprefix_get_theme_option( 'remove-tagcloud-styles' );
$GLOBALS['removeheaderstuff'] = myprefix_get_theme_option( 'remove-header-stuff' );
$GLOBALS['removedwidgets'] = myprefix_get_theme_option( 'remove-dashboard-widgets' );
$GLOBALS['includepcss'] = myprefix_get_theme_option( 'include-pure-css' );		
$GLOBALS['addganalytics'] = myprefix_get_theme_option( 'add-google-analytics' );
$GLOBALS['addgjquery'] = myprefix_get_theme_option( 'add-google-jquery' );	
$GLOBALS['blockuenumeration'] = myprefix_get_theme_option( 'block-user-enumeration' );	
$GLOBALS['disableaarchives'] = myprefix_get_theme_option( 'disable-author-archives' );	


//------ REMOVE JSON, OEMBED , & WP-EMBED, & XMLRPC ----------------------//

if( $GLOBALS['removeheaderstuff'] == 'yes' ) {
	remove_action('wp_head', 'rest_output_link_wp_head', 10 );
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_oembed_add_discovery_links', 10 );
	remove_action('wp_head', 'wp_oembed_add_host_js' );
	remove_action('wp_head', 'rsd_link');
	function rpf_remove_version() {	return ''; } add_filter('the_generator', 'rpf_remove_version');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_shortlink_wp_head');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_head', 'wp_shortlink_header', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('rest_api_init', 'wp_oembed_register_route');
	remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
	remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter('comment_text', 'make_clickable', 9);
	add_filter('widget_text', 'do_shortcode');
	}

//------ REMOVE QUERY STRING FROM CSS AND JS ----------------------//

if( $GLOBALS['removeqstrings'] == 'yes' ) {
	function rpf_remove_query_strings( $src ){ $parts = explode( '?', $src ); return $parts[0]; } 
	add_filter( 'script_loader_src', 'rpf_remove_query_strings', 15, 1 ); 
	add_filter( 'style_loader_src', 'rpf_remove_query_strings', 15, 1 );
	}

//------ CHANGE EXCERPT ELIPSES TO A LINK ----------------------//

if( $GLOBALS['changeedots'] == 'yes' ) {
	function rpf_excerpt_more($more) {
       global $post;
		return '... <a class="moretag" href="'. get_permalink($post->ID) . '">Read More &raquo;</a>';
	}
	add_filter('excerpt_more', 'rpf_excerpt_more');
	}

//------ WRAP IFRAMES IN CONTENT IN A DIV ---------------------------------------------------//

function rp_div_wrapper($content) {
    // match any iframes
    $pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
    preg_match_all($pattern, $content, $matches);
    foreach ($matches[0] as $match) {
        // wrap matched iframe with div
        $wrappedframe = '<div class="video-container">' . $match . '</div>';
        //replace original iframe with new in content
        $content = str_replace($match, $wrappedframe, $content);
    }
   return $content;    
}
add_filter('the_content', 'rp_div_wrapper');

//-------------------------------------- ADD DELETE POST FUNCTION AND LINK ---------------------------------------------------//

function rp_wp_delete_post_link() {
	global $post;
	if ( $post->post_type == 'page' ) { if ( !current_user_can( 'edit_page', $post->ID ) ) { return; } }
	else { if ( !current_user_can( 'edit_post', $post->ID ) ) return; }
	$delLink = wp_nonce_url( get_bloginfo('url') . "/wp-admin/post.php?action=delete&post=" . $post->ID, 'delete-post_' . $post->ID);
	$variable = $post->post_title;
	$variable = str_replace( "'", "\\'", $variable);
	$variable = str_replace( '"', '\"', $variable);
	$url = get_bloginfo('url');

	if (current_user_can('edit_post', $post->ID)){ return "<a href=\"$delLink\" class=\"btn btn-danger\" onclick=\"javascript:return checkStuff('$variable');\">Delete This Entry</a> &nbsp; "; }
	} 	 	 	 	 	 	

 	 	 	 	 	

//-------------------------------------- ADD DELETE POST JAVASCRIPT LINK END OF THE_CONTENT ---------------------------------------------------//

function rp_before_after($content) {
	
	
	if ( is_user_logged_in() && is_page() || is_user_logged_in() && is_single() || is_user_logged_in() && is_search() || is_user_logged_in() && is_category() ) { 	 	
		$logoutlink = '<a href="'. wp_logout_url( home_url() ) .'" class="btn btn-warning">You are logged in. <strong style="text-decoration:underline;">Click Here</strong> To Logout &raquo;</a>';
		}

		
	if( function_exists('rp_wp_delete_post_link') ) {
	    $delete_post_link = rp_wp_delete_post_link();
		}

	$eplink = get_edit_post_link();
	if( current_user_can('edit_posts') ) { 
		$edit_link = '<a href="'. $eplink .'" class="btn btn-success">Edit This Entry</a> &nbsp; '; 
		}

	
	$entirelink = $delete_post_link . $edit_link; 
	
	$fullcontent = $content . '<div class="admin-links">'.  $entirelink  . $logoutlink .'<p>&nbsp;</p></div>';
    
    return $fullcontent;
	
}

add_filter('the_content', 'rp_before_after'); 	 
add_filter('the_excerpt', 'rp_before_after'); 	 	 	 	 	 	



//-------------------------------------- REMOVE COPYRIGHT IN WP-ADMIN ---------------------------------------------------//

function rp_remove_footer_admin () 
{
    echo '<span id="footer-thankyou">After all is said and done, more is said than done.</span>';
}
 
add_filter('admin_footer_text', 'rp_remove_footer_admin');


//------------------------------------------------- DELETE ASSOCIATED IMAGES -----------//


if( $GLOBALS['deletepattachments'] == 'yes') {
function rpf_delete_post_media( $post_id ) {
	if(!isset($post_id)) return; 
	elseif($post_id == 0) return;
	elseif(is_array($post_id)) return; 
	else {
	    $attachments = get_posts( array(
	        'post_type'      => 'attachment',
	        'posts_per_page' => -1,
	        'post_status'    => 'any',
	        'post_parent'    => $post_id
	    ) );
	    foreach ( $attachments as $attachment ) {
	        if ( false === wp_delete_attachment( $attachment->ID ) ) {
	            // Log failure to delete attachment.
	        }
	    }
	}
	}
	add_action('before_delete_post', 'rpf_delete_post_media');
}
	

//------------------------------------------------- REMOVE JQUERY MIGRATE -----------//	

function rp_remove_jquery_migrate( &$scripts) {
    if(!is_admin()) {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
    }
	}
	add_filter( 'wp_default_scripts', 'rp_remove_jquery_migrate' );
	

//------------------------------------------------- ADD CSS STYLE TO FIRST PARAGAPH TAG -----------//	

function rp_first_paragraph_highlight( $content ) {
    return preg_replace( '/<p([^>]+)?>/', '<p$1 class="opener">', $content, 1 );
	}
	add_filter( 'the_content', 'rp_first_paragraph_highlight' );
	



//------------------------------------------------- ENQUEUE VARIOUS CSS AND JS -----------//

function rp_register_custom_css() {	

	if( $GLOBALS['includebgrid'] == 'yes' ) { 
		wp_enqueue_style( 'bootstrap-grid', plugin_dir_url( __FILE__ ) . 'css/bootstrap-grid.css' );
		}

	if( $GLOBALS['includepcss'] == 'yes' ) { 
		wp_enqueue_style( 'purecss', plugin_dir_url( __FILE__ ) . 'css/pure-min.css' );
		}

	
	wp_enqueue_style( 'custom-bootstrap', plugin_dir_url( __FILE__ ) . 'css/custom-bootstrap.css');
	wp_enqueue_style( 'plugin-styles', plugin_dir_url( __FILE__ ) . 'css/plugin.styles.css' );
	}	
    add_action( 'wp_enqueue_scripts', 'rp_register_custom_css' );
	
function rp_register_custom_js() {
	wp_enqueue_script( 'post-delete', plugin_dir_url( __FILE__ ) . 'js/jquery.post_delete.js', array(), null , false );
	}
	add_action( 'wp_enqueue_scripts', 'rp_register_custom_js' );



//------------------------ CUSTOM LOGIN PAGE MESSAGE --------------------------------------------//	
		
function rpf_login_css() {
	wp_enqueue_style( 'plugin-styles', plugin_dir_url( __FILE__ ) . 'css/plugin.styles.css' );
	}
add_action('login_enqueue_scripts', 'rpf_login_css');

function rpf_login_errors(){
	return '';
	}
add_filter( 'login_errors', 'rpf_login_errors' );	

function rpf_login_message(){
	$lcmvalue = myprefix_get_theme_option( 'login-custom-message' );
	$clogourl = myprefix_get_theme_option( 'custom-logo-url' );
	
	if( $GLOBALS['clogourl'] != '') {
	$lmessage .='<div id="custom-login-logo"><img src="'. $GLOBALS['clogourl'] .'" alt="" id="custom-logo" /></div>'; }
	$lmessage .='<div id="custom-login-message">'. $GLOBALS['lcmvalue'] .'</div>';
	if( $lmessage != '' ) { return $lmessage; }
	}
add_filter( 'login_message', 'rpf_login_message' );	

//------------------------ REMOVE DASHBOARD WIDGETS --------------------------------------------//	
	

if( $GLOBALS['removedwidgets'] == 'yes') {

function rpf_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_activity']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    remove_meta_box( 'dashboard_activity', 'dashboard', 'side' );
	}
	add_action('wp_dashboard_setup', 'rpf_dashboard_widgets' );
}	

//------------------------ EVENTS CALENDAR DETECT --------------------------------------------//	

function events_detect() {

	if( function_exists('tribe_is_event') ) {
	if (tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || tribe_is_view() || 'tribe_events' == get_post_type() || is_singular( 'tribe_events' ) || tribe_is_month() && !is_tax() ) {
		return true; }
	}
	}

// add_action('template_redirect', 'events_detect' );

if( function_exists('events_detect') ) { add_action('wp_head', 'events_detect' ); }



//--------------------------------------  CREATE DESCRIPTION & KEYWORDS META TAGS

function rp_create_metatags() { 
?>

	<meta name="description" content="<?php global $post; if(get_post_meta($post->ID, "Description", true) !='' ) { echo get_post_meta($post->ID, "Description", true); } else { bloginfo('description'); } ?>" />
	<?php global $post; if(get_post_meta($post->ID, "Keywords", true) !='' ) {?><meta name="keywords" content="<?php echo get_post_meta($post->ID, "Keywords", true); ?> " /><?php } ?>

	<?php 
	}

add_action( 'wp_head', 'rp_create_metatags' );

//--------------------------------------  REMOVE STYLES FROM TAG CLOUDS

if( $GLOBALS['removetagcloudstyles'] == 'yes') {
	function rp_remove_tagcloud_inline_style($input){  return preg_replace('/ style=("|\')(.*?)("|\')/','',$input); }
	add_filter('wp_generate_tag_cloud', 'rp_remove_tagcloud_inline_style',10,1);
	}

//--------------------------------------  TURN OFF SELF PINGBACKS

if( $GLOBALS['removeselfping'] == 'yes') {
	function rp_no_self_ping( $links ) { $home = get_option( 'home' ); foreach ( $links as $l => $link ) { if ( 0 === strpos( $link, $home ) ) { unset($links[$l]); } } }
	add_action( 'pre_ping', 'rp_no_self_ping' );
	}

//--------------------------------------  REMOVE WP LOGO FROM LOGIN SCREEN

function rp_css_remove_h1() {
	echo '<style>#login h1 {display:none !important;}</style>';
	
	}
add_action('login_head', 'rp_css_remove_h1');

//--------------------------------------  PASSWORD PROTECT PAGES/POSTS USING WP LOGIN


function rp_login() {
	if( !is_user_logged_in() && is_child($GLOBALS['pwppages']) ) { auth_redirect(); }
	}

add_action('template_redirect', 'rp_login');

//--------------------------------------  ADD CSS TO PLUGIN SETTINGS PAGE ONLY
// SOURCE: https://stackoverflow.com/questions/46320928/wordpress-load-custom-css-for-specific-plugin-admin-page


function rp_custom_admin_css($hook) {

    $current_screen = get_current_screen();

    if ( strpos($current_screen->base, 'ryans-useful-options') === false) { return; } 
	else {

	wp_enqueue_style( 'bootstrap-grid', plugin_dir_url( __FILE__ ) . 'css/bootstrap-grid.css' );
	wp_enqueue_style( 'custom-bootstrap', plugin_dir_url( __FILE__ ) . 'css/custom-bootstrap.css' );
	wp_enqueue_style( 'plugin-styles', plugin_dir_url( __FILE__ ) . 'css/plugin.styles.css' );
	wp_enqueue_script( 'ryans-jquery-upload', plugin_dir_url( __FILE__ ) . 'js/jquery.ryans.options.upload.js', array(), '1.0.0', true );

        }
		
    }
add_action('admin_enqueue_scripts', 'rp_custom_admin_css');
 




//------ ALLOW CONTRIBUTOR UPLOADS ----------------------//

if( $GLOBALS['contributoruploads'] == 'yes' ) {
	function rpf_contributor_uploads() { $contributor = get_role('contributor'); $contributor->add_cap('upload_files'); }
	if ( current_user_can('contributor') && !current_user_can('upload_files') ) { add_action('admin_init', 'allow_contributor_uploads'); }
	}

//------ DISABLE USER FROM VIEWING OTHERS UPLOADED MEDIA ----------------------//

if( $GLOBALS['disableothersmedia'] == 'yes' ) {
	
	function rpf_delete_other_user_attachments( $query ) { $user_id = get_current_user_id(); if ( $user_id && !current_user_can('activate_plugins') && !current_user_can('edit_others_posts')) { $query['author'] = $user_id; } return $query; } 
	add_filter( 'ajax_query_attachments_args', 'rpf_delete_other_user_attachments' );
	
	}

//------ ADD SEARCHBOX TO NAV MENU ----------------------//

if( $GLOBALS['addnavsearch'] == 'yes' ) {
	function rpf_nav_search_box($items, $args) { 
		ob_start(); get_search_form(); $searchform = ob_get_contents(); ob_end_clean(); 
		$items .= '<li>' . $searchform . '</li>'; 
 		return $items; 
	} 
	add_filter('wp_nav_menu_items','rpf_nav_search_box', 10, 2); 
	}

//------ DISABLE XMLRPC PING ----------------------//

if( $GLOBALS['disablexmlrpcping'] == 'yes' ) {

	function rpf_disable_xmlrpc_ping ($methods) {
		unset( $methods['pingback.ping'] );
		return $methods;
		}
	add_filter( 'xmlrpc_methods', 'rp_disable_xmlrpc_ping');

	}

//------ ADD GOOGLE ANALYTICS ----------------------//

if( $GLOBALS['addganalytics'] != '' ) {

	function rpf_add_analytics() { ?>


		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $GLOBALS['addganalytics']; ?>"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
 		function gtag(){dataLayer.push(arguments);}
 		gtag('js', new Date());
		gtag('config', '<?php echo $GLOBALS['addganalytics']; ?>');
		</script>

		<?php }
	add_action( 'wp_footer', 'rpf_add_analytics');

	}

//------ ADD GOOGLE ANALYTICS ----------------------//

if( $GLOBALS['addgjquery'] != '' ) {

	//Making jQuery Google API
function rpf_modify_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('googlejquery', 'https://ajax.googleapis.com/ajax/libs/jquery/'. $GLOBALS['addgjquery'] .'/jquery.min.js', false, ''. $GLOBALS['addgjquery'] .'');
        wp_enqueue_script('googlejquery');
    }
}
add_action('init', 'rpf_modify_jquery');

	}

//------ BLOCK USER ENUMERATION ----------------------//

if( $GLOBALS['blockuenumeration'] == 'yes' ) {

	if (!is_admin()) {
		if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) { die(); }
		add_filter('redirect_canonical', 'rpf_block_user_enumeration', 10, 2);
		}

	function rpf_block_user_enumeration($redirect, $request) {
		if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) { die(); }
		else { return $redirect; }
		}

	}

//------ DISABLE USER ARCHIVES ----------------------//

if( $GLOBALS['disableaarchives'] == 'yes' ) {

function rpf_disable_user_archives() {
	
	if (is_author()) { global $wp_query; $wp_query->set_404(); status_header(404); } 
	else { redirect_canonical(); }
	
	}
	remove_filter('template_redirect', 'redirect_canonical');
	add_action('template_redirect', 'rpf_disable_user_archives');

	}




//------ ADD LINK TO OPTIONS PAGE IN MENU BAR ----------------------//

function rpf_add_toolbar_link($admin_bar){ $admin_bar->add_menu( array( 'id'    => 'ryans-useful-options', 'title' => 'Configure Ryan\'s Useful Options', 'href'  => get_admin_url() .'options-general.php?page=ryans-useful-options', 'meta'  => array( 'title' => __('Configure Ryan\'s Useful Options'), ), ));
	}
add_action('admin_bar_menu', 'rpf_add_toolbar_link', 100);