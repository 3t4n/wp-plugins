<?php

define( 'PW_SPE_ASSETS_URL', plugin_dir_url( __FILE__ ) . 'assets' ) ;

if( is_admin() ) {

	require_once dirname( __FILE__ ) . '/inc/metabox-expire.php';
	require_once dirname( __FILE__ ) . '/inc/settings-expire.php';

}


/**
 * Load our plugin's text domain to allow it to be translated
 *
 * @access  public
 * @since   1.0
*/
function pw_spe_text_domain() {

	// Load the default language files
	load_plugin_textdomain( 'pw-spe', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

}
add_action( 'init', 'pw_spe_text_domain' );

/**
 * Determines if a post is expired
 *
 * @access public
 * @since 1.0
 * @return bool
 */
function pw_spe_is_expired( $post_id = 0 ) {

	$expires = get_post_meta( $post_id, 'pw_spe_expiration', true );

	if( ! empty( $expires ) ) {

		// Get the current time and the post's expiration date
		$current_time = current_time( 'timestamp' );
		$expiration   = strtotime( $expires, current_time( 'timestamp' ) );

		// Determine if current time is greater than the expiration date
		if( $current_time >= $expiration ) {

			return true;

		}

	}

	return false;

}

/**
 * Filters the post titles
 *
 * @access public
 * @since 1.0
 * @return void
 */
function pw_spe_filter_title( $title = '', $post_id = 0 ) {

	if( pw_spe_is_expired( $post_id ) ) {
		// Post is expired so attach the prefix
		global $post;
		$prefix = get_option( 'pw_spe_prefix', __( 'Expired :', 'pw-spe' ) );
		$title  = $prefix . '&nbsp;' . $title;
		$status= get_post_meta( $post_id, 'status_value', true );   //The post status pending | draft | trash.
   		 $current_post = get_post( $post_id, 'ARRAY_A' );
   		 $current_post['post_status'] = $status;
   		 wp_update_post($current_post);

	}

	return $title;

}
add_filter( 'the_title', 'pw_spe_filter_title', 100, 2 );

//add column to post type text_ads
function column_status($defaults){
    $defaults['expire'] =__( 'Status', 'pw-spe' );
    return $defaults;
}
add_filter('manage_text_ads_posts_columns', 'column_status');

//add value to column of post type text_ads
function column_status_value($column_name, $post_id = 0){
    if($column_name === 'expire'){
        if( pw_spe_is_expired( $post_id ) ) {
        	$prefix = get_option( 'pw_spe_prefix', __( 'Expired', 'pw-spe' ) );
        	echo '<div style="color: red;font-weight: bold;">'; echo $prefix; echo'</div>';
        }
        else{
        	echo '<div style="color: green;font-weight: bold;">'; echo __( 'Active', 'pw-spe' ); echo'</div>';
        }
    }
}
add_action('manage_text_ads_posts_custom_column', 'column_status_value',5,2);

//add column to post type text_ads
function date_expire_column($defaults){
    $defaults['date_expire'] =__( 'Date Expired', 'pw-spe' );
    return $defaults;
}
add_filter('manage_text_ads_posts_columns', 'date_expire_column');

//add value to column of post type text_ads
function date_expire_column_value($column_name, $post_id = 0){
    if($column_name === 'date_expire'){
      global $post;
      $date_expire = get_post_meta( $post->ID, 'pw_spe_expiration', true );
      if ($date_expire != NULL){
             echo $date_expire;
	}
	else{
		echo _e('No Date','pw-spe');

	}
    }
}
add_action('manage_text_ads_posts_custom_column', 'date_expire_column_value',10,3);

//add column to post type text_ads
function custumer_contact_column($defaults){
    $defaults['custumer_contact'] =__( 'Custumer Contact', 'pw-spe' );
    return $defaults;
}
add_filter('manage_text_ads_posts_columns', 'custumer_contact_column');

//add value to column of post type text_ads
function custumer_contact_column_value($column_name, $post_id = 0){
    if($column_name === 'custumer_contact'){
      global $post;
      $cus_con = get_post_meta( $post->ID, 'cus_contact', true );
      if ($cus_con != NULL){
             echo'<div style="color:#D54E21;font-weight: bold;">'.$cus_con.' </div>';
	}
	else{
		echo _e('No Information','pw-spe');

	}
    }
}
add_action('manage_text_ads_posts_custom_column', 'custumer_contact_column_value',5,2);



 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', __( 'Parsi Text ADS', 'pw-spe' ), 'custom_dashboard_help');
}
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function custom_dashboard_help() {


query_posts(array( 
        'post_type' => 'text_ads',
        'showposts' => 6 ,
		'orderby' => 'date',
		'order'   => 'DESC'
    ) );  
	
 $flag_ads=0;

 while (have_posts()) : the_post(); 

		$expires = get_post_meta( get_the_ID(), 'pw_spe_expiration', true );
		$current_time = current_time( 'timestamp' );
		$expiration   = strtotime( $expires, current_time( 'timestamp' ) );
		
		if( $current_time >= $expiration && $expires != NULL ) {
		
echo "<p>";
echo '★ <a href="post.php?post=';echo get_the_ID();echo '&action=edit" '; echo 'title="';echo _e('Edit ADS','pw-spe');  echo '">';
the_title();
echo '</a>';
echo"</p>";
$flag_ads++;
 
 }
 
endwhile;

if($flag_ads==0){
	 echo '<div style="color:green;font-weight: bold;padding-bottom: 10px;">';echo _e('All ADS Is Active','pw-spe'); echo "</div>";
}

echo '<div style="border-top: 1px solid #eee;padding-top: 10px;text-align: center;">';
echo '<a href="edit.php?post_type=text_ads">'; echo _e('Show All ADS','pw-spe'); echo '</a></div>';   

}
