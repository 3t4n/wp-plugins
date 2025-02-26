<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class Smuzisf_Feed {

	function __construct(){

		$this->_init();
		$this->_hooks();
		$this->_filters();

	}

	function _init(){
		

	}

	function _hooks(){
		
		add_action( 'init', array( $this, 'wsisf_register_feed_post_type' ) );
		
		add_action( 'admin_enqueue_scripts', array( $this, 'wsisf_admin_scripts' ));

		add_action('edit_form_after_title' ,array( $this, 'wsisf_custom_UI_without_metabox' ));

		add_action('add_meta_boxes',array($this,'wsisf_add_metaboxes'));
	}

	function _filters(){

	}




function wsisf_register_feed_post_type() {

	$labels = array(
		'name'                => __( 'Instagram Feed', 'wssf-feed-cpt' ),
		'singular_name'       => __( 'Instagram Feed', 'wssf-feed-cpt' ),
		'add_new'             => _x( 'Add New Instagram Feed', 'wssf-feed-cpt', 'wssf-feed-cpt' ),
		'add_new_item'        => __( 'Add New Instagram Feed', 'wssf-feed-cpt' ),
		'edit_item'           => __( 'Edit Instagram Feed', 'wssf-feed-cpt' ),
		'new_item'            => __( 'New Instagram Feed', 'wssf-feed-cpt' ),
		'view_item'           => __( 'View Instagram Feed', 'wssf-feed-cpt' ),
		'search_items'        => __( 'Search Instagram Feeds', 'wssf-feed-cpt' ),
		'not_found'           => __( 'No Instagram Feeds found', 'wssf-feed-cpt' ),
		'not_found_in_trash'  => __( 'No Instagram Feeds found in Trash', 'wssf-feed-cpt' ),
		'parent_item_colon'   => __( 'Parent Instagram Feed:', 'wssf-feed-cpt' ),
		'menu_name'           => __( 'Instagram Feeds', 'wssf-feed-cpt' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'Add Instagram Feeds',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => null,
		'menu_icon'           => plugins_url( '/images/instagram-round-menu.png', __FILE__),
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title'
			)
	);

	register_post_type( 'wsinsta_social_feed', $args );
}



function wsisf_admin_scripts( ) {

	$screen_id = get_current_screen();
	
	if ($screen_id->post_type !== 'wsinsta_social_feed') return;

    wp_enqueue_script( 'wp-color-picker'  );
    wp_enqueue_style( 'wp-color-picker' );
  
    wp_enqueue_script( 'wp-color-picker-script', plugins_url('/js/wspcolorpicker.js',__FILE__), array( 'wp-color-picker' ), false, true );
}

function wsisf_add_metaboxes(){

	add_meta_box('wssf_premium_version' ,'Get Amazing Features',array($this,'wsisf_premium_version_metabox'), 'wsinsta_social_feed','side','high');

	add_meta_box('wssf_install_other_version' ,'Install Other Social Plugins',array($this,'wsisf_other_version_metabox'), 'wsinsta_social_feed','side','low');
}

function wsisf_custom_UI_without_metabox($post){
	global $post;

	$screen_id = get_current_screen();
	
	if ($screen_id->post_type === 'wsinsta_social_feed') {
		
		$plugin_dir_wssf = plugin_dir_path(__FILE__);
		
		include ($plugin_dir_wssf.'wssf_add_feed_page.php');
	
	}
	
}

function wsisf_premium_version_metabox($post){
	global $post;

	$screen_id = get_current_screen();
	
	if ($screen_id->post_type === 'wsinsta_social_feed') {
		
		$plugin_dir_wssf = plugin_dir_path(__FILE__);
		
		include ($plugin_dir_wssf.'wssf_premium_version_metabox.php');
	
	}

}

function wsisf_other_version_metabox($post){
	global $post;

	$screen_id = get_current_screen();
	
	if ($screen_id->post_type === 'wsinsta_social_feed') {
		$fbfeed = 'add-facebook';
  		$fbfeed_install_link =  esc_url( network_admin_url('plugin-install.php?tab=plugin-information&plugin=' . $fbfeed . '&TB_iframe=true&width=950&height=800' ) );
		$twfeed = 'page-builder-add';
  		$twfeed_install_link =  esc_url( network_admin_url('plugin-install.php?tab=plugin-information&plugin=' . $twfeed . '&TB_iframe=true&width=950&height=800' ) );

  		$fbpfeed = 'contact-form-add';
  		$fbpfeed_install_link =  esc_url( network_admin_url('plugin-install.php?tab=plugin-information&plugin=' . $fbpfeed . '&TB_iframe=true&width=950&height=800' ) );

		?>
		<br>
		Install the Free Facebook feed plugin.
		<br>
		<br>
		<a style='text-decoration: none;' href="<?php  echo $fbfeed_install_link; ?>" target='_blank'><div id='rate_button' style='background: #3B5998; border: 0; '>Install Facebook Feed</div></a>
		<br>
		<br>
		Install the Form Builder Premium plugin for free (Limited Time Only).
		<br>
		<br>
		<a style='text-decoration: none;' href="<?php  echo $fbpfeed_install_link; ?>" target='_blank'><div id='rate_button' style='background: #55ACEF; border: 0;'>Install Form Builder</div></a>
		<br>
		<br>
		Install the Page Builder Premium plugin for free (Limited Time Only).
		<br>
		<br>
		<a style='text-decoration: none;' href="<?php  echo $twfeed_install_link; ?>" target='_blank'><div id='rate_button' style='background: #55ACEF; border: 0;'>Install Page Builder Premium</div></a>
		<?php
	}

}


} //class ends