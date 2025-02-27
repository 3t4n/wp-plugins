<?php

require_once(ABSPATH.'wp-includes/pluggable.php');
$CFPoption = CFPgetOptions();

if ($CFPoption['cfp_home_results_check'] == 1){
function cfp_home_results_per_page( $query ) {
$CFPoption = CFPgetOptions();
    if ( is_home() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', $CFPoption['cfp_home_results_per_page'] );
    }
}
add_action( 'pre_get_posts', 'cfp_home_results_per_page' );
}

if ($CFPoption['cfp_search_results_check'] == 1){
function cfp_search_results_per_page( $query ) {
	global $wp_the_query;
	$CFPoption = CFPgetOptions();
	if ( ( ! is_admin() ) && ( $query === $wp_the_query ) && ( $query->is_search() ) ) {
	$query->set( 'posts_per_page', $CFPoption['cfp_search_results_per_page'] );
	}
	return $query;
}
add_action( 'pre_get_posts',  'cfp_search_results_per_page'  );
}

if ($CFPoption['cfp_excerpt_length_check'] == 1){
//custom excerpt length
function cfp_excerpt_length( $length ) {
$CFPoption = CFPgetOptions();
	//the amount of words to return
	return $CFPoption['cfp_excerpt_length'];
}
add_filter( 'excerpt_length', 'cfp_excerpt_length');
}

if ($CFPoption['cfp_url_spam_check'] == 1){
//This code will automatically mark as spam all comments with an url longer than set chars. This can be changed on line 2.
function cfp_url_spamcheck_length( $approved , $commentdata ) {
$CFPoption = CFPgetOptions();
    return ( strlen( $commentdata['comment_author_url'] ) > $CFPoption['cfp_url_spamcheck_length'] ) ? 'spam' : $approved;
  }

  add_filter( 'pre_comment_approved', 'cfp_url_spamcheck_length', 99, 2 );
  }

if ($CFPoption['cfp_post_revision'] == 1){  
$CFPoption = CFPgetOptions();
  /** * Set the post revisions unless the constant was set in wp-config.php */ 
if (!defined('WP_POST_REVISIONS')) 
define('WP_POST_REVISIONS', $CFPoption['cfp_post_revisions']);
}

if ($CFPoption['cfp_publish_later_on_feed'] == 1){ 
function cfp_publish_later_on_feed($where) {
$CFPoption = CFPgetOptions();
global $wpdb;

if ( is_feed() ) {
// timestamp in WP-format
$now = gmdate('Y-m-d H:i:s');

// value for wait; + device
$wait = $CFPoption['cfp_minutes_later_on_feed']; // integer

// http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_timestampdiff
$device = 'MINUTE'; //MINUTE, HOUR, DAY, WEEK, MONTH, YEAR

// add SQL-sytax to default $where
$where .= " AND TIMESTAMPDIFF($device, $wpdb->posts.post_date_gmt, '$now') > $wait ";
}
return $where;
}

add_filter('posts_where', 'cfp_publish_later_on_feed');
}

if ($CFPoption['cfp_empty_trash'] == 1){
$CFPoption = CFPgetOptions();
/* Automatically delete WordPress trash after set days */
if (!defined('EMPTY_TRASH_DAYS'))
define( 'EMPTY_TRASH_DAYS', $CFPoption['cfp_empty_trash_days'] );
}

	if ($CFPoption['cfp_admin_footer'] == 1){
// Customise the footer in admin area
function cfp_admin_footer () {
$CFPoption = CFPgetOptions();
	echo 'Theme designed and developed by <a href="'.get_bloginfo('wpurl').'" target="_blank">'.$CFPoption['cfp_admin_footer_name'].'</a> and powered by <a href="http://wordpress.org" target="_blank">WordPress</a>.';
}
add_filter('admin_footer_text', 'cfp_admin_footer');
}

	if ($CFPoption['cfp_add_favicon'] == 1){
	function cfp_add_favicon() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="'.site_url().'/favicon.ico" />' . "\n";
}
add_action( 'wp_head', 'cfp_add_favicon' );
}

if ($CFPoption['cfp_remove_head_link'] == 1){
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
}

if ($CFPoption['cfp_redirect_after_login'] == 1){
function cfp_redirect_after_login() {
if ( isset( $_REQUEST['redirect_to'] ) ) 
$redirect_to = $_REQUEST['redirect_to'];
	else 
$redirect_to = site_url();
	return $redirect_to;
}
add_filter( 'login_redirect', 'cfp_redirect_after_login' );
}

if ($CFPoption['cfp_hide_admin_bar'] == 1){
if (!current_user_can('administrator')) {
	add_filter('show_admin_bar', '__return_false');
}

function cfp_hideAdminBar() { ?>
<style type="text/css">.show-admin-bar { display: none; }</style>
<?php }
add_action('admin_print_scripts-profile.php', 'cfp_hideAdminBar');
}

if ($CFPoption['cfp_back_access'] == 1){
add_action('admin_init', 'cfp_back_access');
function cfp_back_access() {
  if (!current_user_can('manage_options') && $_SERVER['DOING_AJAX'] != '/wp-admin/admin-ajax.php') {
  wp_redirect(home_url()); 
  exit;
  }
}}


if ($CFPoption['cfp_login_with_email'] == 1){
	function cfp_login_with_email($username) {
	$user = get_user_by('email',$username);
	if(!empty($user->user_login))
	$username = $user->user_login;
	return $username;
	}
	add_action('wp_authenticate','cfp_login_with_email');
	}
	
if ($CFPoption['cfp_own_media_only'] == 1){	

function cfp_own_media_only( $where ){
	global $current_user;
	
	if( !current_user_can( 'manage_options' ) ){
		if( isset( $_POST['action'] ) ){
			// library query
			if( $_POST['action'] == 'query-attachments' ){
			//restrict the query to current user
				$where .= ' AND post_author='.$current_user->data->ID;
			}
		}
	}

	return $where;
}
	add_filter( 'posts_where', 'cfp_own_media_only' );
}

if ($CFPoption['cfp_restrict_media_upload'] == 1){	

if( !current_user_can( 'manage_options' ) ){
add_filter('upload_mimes','cfp_restrict_media_upload');

function cfp_restrict_media_upload($mimes) {
$mimes = array(
                'jpg|jpeg|jpe' => 'image/jpeg',
                'gif' => 'image/gif',
				'png' => 'image/png',
);
return $mimes;
}
}
}

if ($CFPoption['cfp_remove_img_ptags'] == 1){
// Stop images getting wrapped up in p tags when they get dumped out with the_content() for easier theme styling
function cfp_remove_img_ptags($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'cfp_remove_img_ptags');
}

if ($CFPoption['cfp_front_jquery_enqueue'] == 1){
function cfp_front_jquery_enqueue() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
	wp_enqueue_script('jquery');
}
if (!is_admin()) add_action("wp_enqueue_scripts", "cfp_front_jquery_enqueue", 11);
}

if ($CFPoption['cfp_IEhtml5_shim'] == 1){
// Call Googles HTML5 Shim, but only for users on old versions of IE
function cfp_IEhtml5_shim () {
	global $is_IE;
	if ($is_IE)
	echo '<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
}
add_action('wp_head', 'cfp_IEhtml5_shim');
}

if ($CFPoption['cfp_login_error_mgs'] == 1){
// Obscure login screen error messages
function cfp_login_error_mgs(){ 
return '<strong>Sorry</strong>: Think you have gone wrong somwhere!';
}
add_filter( 'login_errors', 'cfp_login_error_mgs' );
}

if ($CFPoption['cfp_rss_post_thumbnail'] == 1){
function cfp_rss_post_thumbnail($content) {
    global $post;
    if(has_post_thumbnail($post->ID)) {
        $content = '<p>' . get_the_post_thumbnail($post->ID) .
        '</p>' . get_the_content();
    }

    return $content;
}
add_filter('the_excerpt_rss', 'cfp_rss_post_thumbnail');
add_filter('the_content_feed', 'cfp_rss_post_thumbnail');
}

if ($CFPoption['cfp_disable_feed'] == 1){
function cfp_disable_feed() {
	wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('wpurl') .'">homepage</a>!') );
	}
	 
	add_action('do_feed', 'cfp_disable_feed', 1);
	add_action('do_feed_rdf', 'cfp_disable_feed', 1);
	add_action('do_feed_rss', 'cfp_disable_feed', 1);
	add_action('do_feed_rss2', 'cfp_disable_feed', 1);
	add_action('do_feed_atom', 'cfp_disable_feed', 1);
	}
	
if ($CFPoption['cfp_comment_count'] == 1){	
	add_filter('get_comments_number', 'cfp_comment_count', 0);
function cfp_comment_count( $count ) {
if ( ! is_admin() ) {
global $id;
$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
return count($comments_by_type['comment']);
} else {
return $count;
}
}
}
if ($CFPoption['cfp_all_settings_link'] == 1){	
// CUSTOM ADMIN MENU LINK FOR ALL SETTINGS   
function cfp_all_settings_link() {
    add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
	   }   
	   add_action('admin_menu', 'cfp_all_settings_link');
	   }
	   
if ($CFPoption['cfp_custom_background'] == 1){
// Enable admin to set custom background images in 'appearance > background'
global $wp_version;
if ( version_compare( $wp_version, '3.4', '>=' ) ) 
	add_theme_support( 'custom-background' ); 
else
	add_custom_background( $args );
}

if ($CFPoption['cfp_no_self_ping'] == 1){  
	   //remove pings to self
function cfp_no_self_ping( &$links ) {
    $home = get_option( 'home' );
	    foreach ( $links as $l => $link )
		        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]); 
			} 
add_action( 'pre_ping', 'cfp_no_self_ping' );
}

if ($CFPoption['cfp_ajx_sharpen_resize'] == 1){ 
//This function sharpening resized jpg images.
function cfp_ajx_sharpen_resize( $resized_file ) {
    $image = wp_load_image( $resized_file );
	    if ( !is_resource( $image ) )
		        return new WP_Error( 'error_loading_image', $image, $file );
    $size = @getimagesize( $resized_file );
	    if ( !$size )
        return new WP_Error('invalid_image', __('Could not read image size'), $file);
		    list($orig_w, $orig_h, $orig_type) = $size;
    switch ( $orig_type ) {
        case IMAGETYPE_JPEG:
            $matrix = array(
	                array(-1, -1, -1),
	                array(-1, 16, -1),
	                array(-1, -1, -1),
		            );
            $divisor = array_sum(array_map('array_sum', $matrix));
            $offset = 0;
            imageconvolution($image, $matrix, $divisor, $offset);
            imagejpeg($image, $resized_file,apply_filters( 'jpeg_quality', 90, 'edit_image' ));
            break;
        case IMAGETYPE_PNG:
            return $resized_file;
        case IMAGETYPE_GIF:
            return $resized_file;
			    }
    return $resized_file;
	 }   
add_filter('image_make_intermediate_size','cfp_ajx_sharpen_resize',900);
}

if ($CFPoption['cfp_enable_gzip'] == 1){
//Enable Gzip
if(extension_loaded("zlib") && (ini_get("output_handler") != "ob_gzhandler"))
   add_action('wp', create_function('', '@ob_end_clean();@ini_set("zlib.output_compression", 1);'));
   }
 
 if ($CFPoption['cfp_prevent_email_change'] == 1) { 
  add_action( 'user_profile_update_errors', 'cfp_prevent_email_change', 10, 3 );

function cfp_prevent_email_change( $errors, $update, $user ) {

    $old = get_user_by('id', $user->ID);

    if( $user->user_email != $old->user_email )
        $user->user_email = $old->user_email;
}
}

 if ($CFPoption['cfp_check_referrer'] == 1) {
//Block comments with no-referrer
function cfp_check_referrer() {
	if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == '') {
		wp_die(__('Please do not access this file directly.'));
	}
}
add_action('check_comment_flood', 'cfp_check_referrer');
}

 if ($CFPoption['cfp_remove_word_private'] == 1) {
function cfp_remove_word_private($string) {
$string = str_replace('Private: ', '', $string);
return $string;
}
add_filter('the_title', 'cfp_remove_word_private');
}

 if ($CFPoption['cfp_disallow_file_edit'] == 1) {
// Disable the theme / plugin text editor in Admin
if (!defined('DISALLOW_FILE_EDIT'))
define('DISALLOW_FILE_EDIT', true);
}

 if ($CFPoption['cfp_disallow_file_mods'] == 1) {
/** Disallow anything that creates, deletes, or updates core, plugin, or theme files.
* Files in uploads are excepted.
*/
if (!defined('DISALLOW_FILE_MODS'))
define( 'DISALLOW_FILE_MODS', true);
}

 if ($CFPoption['cfp_no_more_jumping'] == 1) {
// no more jumping for read more link
function cfp_no_more_jumping($post) {
	return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
}
add_filter('excerpt_more', 'cfp_no_more_jumping');
}

 if ($CFPoption['cfp_custom_breadcrumbs'] == 1) {
//Breadcrumbs
/* you have to add <?php if (function_exists('cfp_custom_breadcrumbs')) cfp_custom_breadcrumbs(); ?> where you want to show breadcrumbs */
function cfp_custom_breadcrumbs() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} // end cfp_custom_breadcrumbs()
}


 if ($CFPoption['cfp_disable_wp_search'] == 1) {
function cfp_disable_wp_search( $query, $error = true ) {

if ( is_search() ) {
$query->is_search = false;
$query->query_vars[s] = false;
$query->query[s] = false;

// to error
if ( $error == true )
$query->is_404 = true;
}
}

add_action( 'parse_query', 'cfp_disable_wp_search' );
add_filter( 'get_search_form', create_function( '$a', "return null;" ) );
}

 if ($CFPoption['cfp_disable_admin_nag'] == 1) {
// kill the admin nag
if (!current_user_can('manage_options')) {
	add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
	add_filter('pre_option_update_core', create_function('$a', "return null;"));
}
}

 if ($CFPoption['cfp_remove_version'] == 1) {
function cfp_remove_version() {
return '';
}
add_filter('the_generator', 'cfp_remove_version');
}
?>
