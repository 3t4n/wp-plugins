<?php
/**
Plugin Name: Service Provider Profile CPT
Plugin URI: http://wordpress.org/plugins/service-provider-profile-cpt
Description: Creates "Staff", "Services" custom post type for FREE SetMore Themes.
Version: 1.1
Author: SetMore Appointments
Author URI: http://www.setmore.com/
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/**************************************************************************
 * Register the "Staff" "Services" custom post type for FREE SetMore Themes
 **************************************************************************/

function wpds_people_profile_cpt() {
	
	$labels = array(
		'name'               => _x( 'People', 'post type general name', 'wpds-people-cpt' ),
		'singular_name'      => _x( 'People', 'post type singular name', 'wpds-people-cpt' ),
		'add_new'            => _x( 'Add New', 'book', 'wpds-people-cpt' ),
		'add_new_item'       => __( 'Add New People', 'wpds-people-cpt' ),
		'edit_item'          => __( 'Edit People', 'wpds-people-cpt' ),
		'new_item'           => __( 'New People', 'wpds-people-cpt' ),
		'all_items'          => __( 'All People', 'wpds-people-cpt' ),
		'view_item'          => __( 'View People', 'wpds-people-cpt' ),
		'search_items'       => __( 'Search People', 'wpds-people-cpt' ),
		'not_found'          => __( 'No People found', 'wpds-people-cpt' ),
		'not_found_in_trash' => __( 'No People found in the Trash', 'wpds-people-cpt' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Staff'
	);
	
	$args = array(
		'labels'        => $labels,
		'description'   => __('Holds our people and people specific data', 'wpds-people-cpt'),
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => false,
		
	);
	register_post_type( 'people', $args );	
}
add_action( 'init', 'wpds_people_profile_cpt' );



/* Flush your rewrite rules */
function wpds_people_cpt_flush_rewrite_rules() {
	global $pagenow;
	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
		flush_rewrite_rules();
}
/* Flush rewrite rules for custom post types. */
add_action( 'load-themes.php', 'wpds_people_cpt_flush_rewrite_rules' );



/* Custom Taxonomies for Menu Item */
function wpds_people_cpt_taxonomies() {
	$labels = array(
		'name'              => _x( 'People Categories', 'taxonomy general name', 'wpds-people-cpt' ),
		'singular_name'     => _x( 'People Category', 'taxonomy singular name', 'wpds-people-cpt' ),
		'search_items'      => __( 'Search People Categories', 'wpds-people-cpt' ),
		'all_items'         => __( 'All People Categories', 'wpds-people-cpt' ),
		'parent_item'       => __( 'Parent People Category', 'wpds-people-cpt' ),
		'parent_item_colon' => __( 'Parent People Category:', 'wpds-people-cpt' ),
		'edit_item'         => __( 'Edit People Category', 'wpds-people-cpt' ), 
		'update_item'       => __( 'Update People Category', 'wpds-people-cpt' ),
		'add_new_item'      => __( 'Add New People Category', 'wpds-people-cpt' ),
		'new_item_name'     => __( 'New People Category', 'wpds-people-cpt' ),
		'menu_name'         => __( 'People Categories', 'wpds-people-cpt' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'people_category', 'people', $args );
}
add_action( 'init', 'wpds_people_cpt_taxonomies', 0 );


/* Job Title Meta Box */

function wpds_people_cpt_job_title() {
    add_meta_box( 
        'people_job_title_box',
        __( 'Job Title', 'wpds-people-cpt' ),
        'wpds_people_cpt_job_title_content',
        'people',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'wpds_people_cpt_job_title' );

function wpds_people_cpt_job_title_content( $people_job_title ) {

	$wpds_people_title = get_post_meta( $people_job_title->ID, 'job_title', true );
	echo '<input type="hidden" name="wpds_people_noncename" id="wpds_people_noncename" value="' . wp_create_nonce( 'wpdevshed-nonce' ) . '" />';
	echo '<label for="people_job_title">' . __('Enter the Job Title', 'wpds-people-cpt') . '</label>';
	echo '<input id=people_job_title" name="people_job_title" style="width: 100%" type="text" value="'.$wpds_people_title.'" />';
}


/* Phone Number Meta Box */

function wpds_people_cpt_phone_number() {
    add_meta_box( 
        'people_phone_number_box',
        __( 'Phone Number', 'wpds-people-cpt' ),
        'wpds_people_cpt_phone_number_content',
        'people',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'wpds_people_cpt_phone_number' );

function wpds_people_cpt_phone_number_content( $people_phone_number) {

	$wpds_people_phone = get_post_meta( $people_phone_number->ID, 'phone_number', true );
	echo '<label for="people_phone_number">' . __('Enter Phone Number', 'wpds-people-cpt') . '</label>';
	echo '<input id="people_phone_number" name="people_phone_number" style="width: 100%" type="text" value="'.$wpds_people_phone.'" />';
}

/* Email Meta Box */

function wpds_people_cpt_email() {
    add_meta_box( 
        'people_email_box',
        __( 'Email', 'wpds-people-cpt' ),
        'wpds_people_cpt_email_content',
        'people',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'wpds_people_cpt_email' );

function wpds_people_cpt_email_content( $people_email ) {

	$wpds_people_email = get_post_meta( $people_email->ID, 'email', true );
	echo '<label for="people_email">' . __('Enter Staff Email Address', 'wpds-people-cpt') . '</label>';
	echo '<input id="people_email" name="people_email" style="width: 100%" type="text" value="'.$wpds_people_email.'" />';
}

/* Staff Short booking page */

function wpds_people_cpt_bookingpage() {
    add_meta_box( 
        'people_bookingpage_box',
        __( 'StaffBookingPage', 'wpds-people-cpt' ),
        'wpds_people_cpt_bookingpage_content',
        'people',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'wpds_people_cpt_bookingpage' );

function wpds_people_cpt_bookingpage_content( $people_bookingpage ) {

	$people_bookingpage = get_post_meta( $people_bookingpage->ID, 'staffbookingpage', true );
	echo '<label for="people_bookingpage">' . __('Enter Staff Key', 'wpds-people-cpt') . '</label>';
	echo '<input id="people_bookingpage" name="people_bookingpage" style="width: 100%" type="text" value="'.$people_bookingpage.'" />';
}



/* LinkedIn Meta Box */

function wpds_people_cpt_linkedin() {
    add_meta_box( 
        'people_linkedin_box',
        __( 'LinkedIn', 'wpds-people-cpt' ),
        'wpds_people_cpt_linkedin_content',
        'people',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'wpds_people_cpt_linkedin' );

function wpds_people_cpt_linkedin_content( $people_linkedin ) {

	$wpds_people_linkedin = get_post_meta( $people_linkedin->ID, 'linkedin', true );
	echo '<label for="people_linkedin">' . __('Enter LinkedIn Profile URL', 'wpds-people-cpt') . '</label>';
	echo '<input id="people_linkedin" name="people_linkedin" style="width: 100%" type="text" value="'.$wpds_people_linkedin.'" />';
}



/* Twitter Meta Box */

function wpds_people_cpt_twitter() {
    add_meta_box( 
        'people_twitter_box',
        __( 'Twitter', 'wpds-people-cpt' ),
        'wpds_people_cpt_twitter_content',
        'people',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'wpds_people_cpt_twitter' );

function wpds_people_cpt_twitter_content( $people_twitter ) {

	$wpds_people_twitter = get_post_meta( $people_twitter->ID, 'twitter', true );
	echo '<label for="people_twitter">' . __('Enter Twitter Profile URL', 'wpds-people-cpt') . '</label>';
	echo '<input id="people_twitter" name="people_twitter" style="width: 100%" type="text" value="'.$wpds_people_twitter.'" />';
}



/* Facebook Meta Box */

function wpds_people_cpt_facebook() {
    add_meta_box( 
        'people_facebook_box',
        __( 'Facebook', 'wpds-people-cpt' ),
        'wpds_people_cpt_facebook_content',
        'people',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'wpds_people_cpt_facebook' );

function wpds_people_cpt_facebook_content( $people_facebook ) {

	$wpds_people_facebook = get_post_meta( $people_facebook->ID, 'facebook', true );
	echo '<label for="people_facebook">' . __('Enter Facebook Profile URL', 'wpds-people-cpt') . '</label>';
	echo '<input id="people_facebook" name="people_facebook" style="width: 100%" type="text" value="'.$wpds_people_facebook.'" />';
}



/* Google+ Meta Box */

function wpds_people_cpt_googleplus() {
    add_meta_box( 
        'people_googleplus_box',
        __( 'Google+', 'wpds-people-cpt' ),
        'wpds_people_cpt_googleplus_content',
        'people',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'wpds_people_cpt_googleplus' );

function wpds_people_cpt_googleplus_content( $people_googleplus ) {

	$wpds_peole_googleplus = get_post_meta( $people_googleplus->ID, 'googleplus', true );
	echo '<label for="people_googleplus">' . __('Enter Google+ Profile URL', 'wpds-people-cpt') . '</label>';
	echo '<input id="people_googleplus" name="people_googleplus" style="width: 100%" type="text" value="'.$wpds_peole_googleplus.'" />';
}

/* YouTube Meta Box */

function wpds_people_cpt_youtube() {
    add_meta_box( 
        'people_youtube_box',
        __( 'Youtube', 'wpds-people-cpt' ),
        'wpds_people_cpt_youtube_content',
        'people',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'wpds_people_cpt_youtube' );

function wpds_people_cpt_youtube_content( $people_youtube ) {

	$wpds_peole_youtube = get_post_meta( $people_youtube->ID, 'youtube', true );
	echo '<label for="people_youtube">' . __('Enter Youtube URL', 'wpds-people-cpt') . '</label>';
	echo '<input id="people_youtube" name="people_youtube" style="width: 100%" type="text" value="'.$wpds_peole_youtube.'" />';
}


/* Save */

function wpds_people_cpt_meta_save($post_id) {

	// If it is our form has not been submitted, so we dont want to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return;
    }
	
	// verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (isset($_POST['wpds_people_noncename'])){
        if ( !wp_verify_nonce( $_POST['wpds_people_noncename'], 'wpdevshed-nonce' ) )
            return;
    }else{return;}
	
	
	// Check permissions
	 if ( 'page' == $_POST['post_type'] ||  'post' == $_POST['post_type']) {
        if ( !current_user_can( 'edit_page', $post_id ) || !current_user_can( 'edit_post', $post_id ))
          return $post_id;
      } 
	
	
	// Update meta values
	update_post_meta( $post_id, 'job_title', $_POST['people_job_title'] );
	update_post_meta( $post_id, 'phone_number', $_POST['people_phone_number'] );
	update_post_meta( $post_id, 'linkedin', $_POST['people_linkedin'] );
	update_post_meta( $post_id, 'twitter', $_POST['people_twitter'] );
	update_post_meta( $post_id, 'facebook', $_POST['people_facebook'] );
	update_post_meta( $post_id, 'googleplus', $_POST['people_googleplus'] );
	update_post_meta( $post_id, 'email', $_POST['people_email'] );
	update_post_meta( $post_id, 'staffbookingpage', $_POST['people_bookingpage'] );
	update_post_meta( $post_id, 'youtube', $_POST['people_youtube'] );
}
add_action( 'save_post', 'wpds_people_cpt_meta_save' );



	/**
	 * Service Section - custom post
	 */
function wpds_service_profile_cpt() {
	
	$labels = array(
		'name'               => _x( 'Service', 'post type general name', 'wpds-service-cpt' ),
		'singular_name'      => _x( 'Service', 'post type singular name', 'wpds-service-cpt' ),
		'add_new'            => _x( 'Add New', 'book', 'wpds-service-cpt' ),
		'add_new_item'       => __( 'Add New Service', 'wpds-service-cpt' ),
		'edit_item'          => __( 'Edit Service', 'wpds-service-cpt' ),
		'new_item'           => __( 'New Service', 'wpds-service-cpt' ),
		'all_items'          => __( 'All Service', 'wpds-service-cpt' ),
		'view_item'          => __( 'View Service', 'wpds-service-cpt' ),
		'search_items'       => __( 'Search Service', 'wpds-service-cpt' ),
		'not_found'          => __( 'No Service found', 'wpds-service-cpt' ),
		'not_found_in_trash' => __( 'No Service found in the Trash', 'wpds-service-cpt' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Services'
	);
	
	$args = array(
		'labels'        => $labels,
		'description'   => __('Holds our service and service specific data', 'wpds-service-cpt'),
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => false,
		
	);
	register_post_type( 'service', $args );	
}
add_action( 'init', 'wpds_service_profile_cpt' );



/* Flush your rewrite rules */
function wpds_service_cpt_flush_rewrite_rules() {
	global $pagenow;
	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
		flush_rewrite_rules();
}
/* Flush rewrite rules for custom post types. */
add_action( 'load-themes.php', 'wpds_service_cpt_flush_rewrite_rules' );



/* Custom Taxonomies for Menu Item */
function wpds_service_cpt_taxonomies() {
	$labels = array(
		'name'              => _x( 'Service Categories', 'taxonomy general name', 'wpds-service-cpt' ),
		'singular_name'     => _x( 'Service Category', 'taxonomy singular name', 'wpds-service-cpt' ),
		'search_items'      => __( 'Search Service Categories', 'wpds-service-cpt' ),
		'all_items'         => __( 'All Service Categories', 'wpds-service-cpt' ),
		'parent_item'       => __( 'Parent Service Category', 'wpds-service-cpt' ),
		'parent_item_colon' => __( 'Parent Service Category:', 'wpds-service-cpt' ),
		'edit_item'         => __( 'Edit Service Category', 'wpds-service-cpt' ), 
		'update_item'       => __( 'Update Service Category', 'wpds-service-cpt' ),
		'add_new_item'      => __( 'Add New Service Category', 'wpds-service-cpt' ),
		'new_item_name'     => __( 'New Service Category', 'wpds-service-cpt' ),
		'menu_name'         => __( 'Service Categories', 'wpds-service-cpt' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'service_category', 'service', $args );
}
add_action( 'init', 'wpds_service_cpt_taxonomies', 0 );


/* Cost Meta Box */

function wpds_service_cpt_service_cost() {
    add_meta_box( 
        'service_cost_box',
        __( 'Service Cost', 'wpds-service-cpt' ),
        'wpds_service_cpt_service_cost_content',
        'service',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'wpds_service_cpt_service_cost' );

function wpds_service_cpt_service_cost_content( $service_cost ) {

	$wpds_service_cost = get_post_meta( $service_cost->ID, 'service_cost', true );
	echo '<input type="hidden" name="wpds_service_noncename" id="wpds_service_noncename" value="' . wp_create_nonce( 'wpdevshed-nonce' ) . '" />';
	echo '<label for="service_cost">' . __('Enter Service Cost', 'wpds-service-cpt') . '</label>';
	echo '<input id=service_cost" name="service_cost" style="width: 100%" type="text" value="'.$wpds_service_cost.'" />';
}
/* Duration Meta Box */

function wpds_service_cpt_service_duration() {
    add_meta_box( 
        'service_duration_box',
        __( 'Service Duation', 'wpds-service-cpt' ),
        'wpds_service_cpt_service_duration_content',
        'service',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'wpds_service_cpt_service_duration' );

function wpds_service_cpt_service_duration_content( $service_duration) {

	$wpds_service_duration = get_post_meta( $service_duration->ID, 'service_duration', true );
	echo '<label for="service_duration">' . __('Enter Service Duration', 'wpds-service-cpt') . '</label>';
	echo '<input id="service_duration" name="service_duration" style="width: 100%" type="text" value="'.$wpds_service_duration.'" />';
}

/* Save */

function wpds_service_cpt_meta_save($post_id) {

	// If it is our form has not been submitted, so we dont want to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return;
    }
	
	// verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (isset($_POST['wpds_service_noncename'])){
        if ( !wp_verify_nonce( $_POST['wpds_service_noncename'], 'wpdevshed-nonce' ) )
            return;
    }else{return;}
	
	
	// Check permissions
	 if ( 'page' == $_POST['post_type'] ||  'post' == $_POST['post_type']) {
        if ( !current_user_can( 'edit_page', $post_id ) || !current_user_can( 'edit_post', $post_id ))
          return $post_id;
      } 
	
	
	// Update meta values
	update_post_meta( $post_id, 'service_cost', $_POST['service_cost'] );
	update_post_meta( $post_id, 'service_duration', $_POST['service_duration'] );

	
}
add_action( 'save_post', 'wpds_service_cpt_meta_save' );

function setmore_spasalon_theme_settings_register_custom_js( $wp_customize ) {
	
	$wp_customize->add_section( 'custom_css_js', array(
	    'priority' => 16,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom CSS & JS', 'setmore-spasalon' ),
	    'description' => '',
	    'panel' => 'theme_settings',
	) );

	$wp_customize->add_setting( 'custom_css', array(
		'default' => '',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_control( 'custom_css', array(
	    'type' => 'textarea',
	    'priority' => 44,
	    'section' => 'custom_css_js',
	    'label' => __( 'Custom CSS code', 'setmore-spasalon' ),
	    'description' => 'Provide your own CSS code here',
	    
	) );
	
	$wp_customize->add_setting( 'custom_js', array(
		'default' => '',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_control( 'custom_js', array(
	    'type' => 'textarea',
	    'priority' => 45,
	    'section' => 'custom_css_js',
	    'label' => __( 'Custom JS code', 'setmore-spasalon' ),
	    'description' => 'Provide your own JS code here',
	    
	) );
	
	$wp_customize->add_setting( 'google_tracking_code', array(
		'default' => '',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'prefix_iframe_section',
	) );

	$wp_customize->add_control( 'google_tracking_code', array(
	    'type' => 'textarea',
	    'priority' => 45,
	    'section' => 'custom_css_js',
	    'label' => __( 'Tracking Code', 'setmore-spasalon' ),
	    'description' => 'Provide your own JS code here',
	    
	) );
	
	$wp_customize->add_setting( 'google_map', array(
		'default' => '/* enter google code here */',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'prefix_iframe_section',
	) );

	$wp_customize->add_control( 'google_map', array(
	    'type' => 'textarea',
	    'priority' => 25,
	    'section' => 'contact_page',
	    'label' => __( 'Google Map Code', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	// Custom Iframe section 
	
	$wp_customize->add_section( 'frame_booking_page', array(
	    'priority' => 15,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'iFrame - Booking Page', 'setmore-spasalon' ),
	    'description' => '',
	    'panel' => 'theme_settings',
	) );

	$wp_customize->add_setting( 'frame_service_booking_page', array(
		'default' => '',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'prefix_iframe_section',
	) );

	$wp_customize->add_control( 'frame_service_booking_page', array(
	    'type' => 'textarea',
	    'priority' => 42,
	    'section' => 'frame_booking_page',
	    'label' => __( 'iFrame Booking Page - Services', 'setmore-spasalon' ),
	    'description' => 'Check this Article: <a target="_blank" href="http://support.setmore.com/article/213-embedding-the-booking-page">http://support.setmore.com/article/213-embedding-the-booking-page</a>',
	    
	) );
	
	$wp_customize->add_setting( 'frame_class_booking_page', array(
		'default' => '',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'prefix_iframe_section',
	) );

	$wp_customize->add_control( 'frame_class_booking_page', array(
	    'type' => 'textarea',
	    'priority' => 43,
	    'section' => 'frame_booking_page',
	    'label' => __( 'iFrame Booking Page - Classes', 'setmore-spasalon' ),
	    'description' => 'Check this Article: <a target="_blank" href="http://support.setmore.com/article/213-embedding-the-booking-page">http://support.setmore.com/article/213-embedding-the-booking-page</a>',
	    
	) );
}
add_action( 'customize_register', 'setmore_spasalon_theme_settings_register_custom_js' );

function prefix_iframe_section($input){
	return $input;
}
if ( ! function_exists( 'setmore_spasalon_plugin_google_map' ) ) :
  function setmore_spasalon_plugin_google_map() {
  		  echo get_option('google_map');
	} 
endif;
if ( ! function_exists( 'setmore_spasalon_plugin_custom_css' ) ) :
  function setmore_spasalon_plugin_custom_css() {
  		  echo get_option('custom_css');
	} 
endif;
if ( ! function_exists( 'setmore_spasalon_plugin_custom_js' ) ) :
  function setmore_spasalon_plugin_custom_js() {
  		  echo get_option('custom_js');
	} 
endif;
if ( ! function_exists( 'setmore_spasalon_plugin_google_tracking_code' ) ) :
  function setmore_spasalon_plugin_google_tracking_code() {
  		  echo get_option('google_tracking_code');
	} 
endif;
if ( ! function_exists( 'setmore_spasalon_plugin_frame_service_booking_page' ) ) :
  function setmore_spasalon_plugin_frame_service_booking_page() {
  		  echo get_option('frame_service_booking_page');
	} 
endif;
if ( ! function_exists( 'setmore_spasalon_plugin_frame_class_booking_page' ) ) :
  function setmore_spasalon_plugin_frame_class_booking_page() {
  		  echo get_option('frame_service_booking_page');
	} 
endif;
?>
<?php
if ( ! function_exists( 'setmore_spasalon_header_js_and_google_file' ) ) :
  function setmore_spasalon_header_js_and_google_file() {
  		?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
					if ( $('.contact-us-map').children().length > 0 ) {
     						$('#contact-us-info').show();
					}else{
						$('.contact-us-gm').hide();
					}
					if ( $('.map-wraper-content-map').children().length > 0 ) {
     						$('.map-wraper-content').show();
					}else{
						$('.map-wraper-content').hide();
					}
			});
		</script>
		<?php 
		if (function_exists( 'setmore_spasalon_plugin_custom_js' ) ){
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				<?php setmore_spasalon_plugin_custom_js();?>
			});
		</script>
		<?php
		}
		if (function_exists( 'setmore_spasalon_plugin_google_tracking_code' ) ){
            ?>
		<script type="text/javascript">
				<?php setmore_spasalon_plugin_google_tracking_code();?>
		</script>
		<?php
		}
	} 
endif;
add_action( 'wp_head', 'setmore_spasalon_header_js_and_google_file' );
?>