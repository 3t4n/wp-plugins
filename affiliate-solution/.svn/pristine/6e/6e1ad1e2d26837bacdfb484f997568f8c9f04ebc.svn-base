<?php
/**
 * Plugin Name: Affiliate Solution 
 * Plugin URI: https://www.essitco.com
 * Description: Affiliate Solution for Commission Junction, Linkshare, Vglink
 * Version: 1.0
 * Author: Essitco
 * Author URI: https://profiles.wordpress.org/essitco
 * Developer: Brij Mohan, Rajat kumar
 */
add_action( 'admin_menu', 'ESSITCO_AMS_admin_default_setup' );

function ESSITCO_AMS_admin_default_setup() {
	add_options_page( __( 'Affiliate Solution', 'ESSITCO_affiliate_solution' ), __( 'Affiliate Solution', 'ESSITCO_affiliate_solution' ), 'manage_options', 'essitco_manage_channels', 'ESSITCO_AMS_manage_channels' );
}

function ESSITCO_AMS_manage_channels() {
	include('admin/features.php');
}


//links in plugin description
if (is_admin()) {
	add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'ESSITCO_affiliate_solution');
}

include('admin/AMS_Widget.php');
include('admin/AMS_shortcodes.php');

add_action('wp_enqueue_scripts', 'ESSITCO_AMS_add_script');
function ESSITCO_AMS_add_script() {
    wp_enqueue_style('ams-script',  plugin_dir_url( __FILE__ ). 'css/ams_style.css');
    wp_enqueue_style('maxcdn-css', plugin_dir_url( __FILE__ ). 'css/bootstrap.min.css');
    wp_enqueue_script('maxcdn-css', plugin_dir_url( __FILE__ ). 'js/bootstrap.min.js');
}

function ESSITCO_affiliate_solution($links) {
	$links[] = '<a href="admin.php?page=essitco_manage_channels">Settings</a>';
	return $links;
}

add_action( "admin_init", "ESSITCO_AMS_admin_init" );
function ESSITCO_AMS_admin_init() {
	wp_enqueue_style( 'stylesheet', plugins_url( 'css/affiliate.css', __FILE__ ) );
}

function ESSITCO_AMS_store_init() {    
	//store
	$store_args = array(
		'labels' => array(
			'name' => __( 'Stores', 'ESSITCO_AMS_affiliate_solution' ),
			'singular_name' => __( 'Store', 'ESSITCO_AMS_affiliate_solution' ),
			'add_new_item'	=> __('Add New Store','ESSITCO_AMS_affiliate_solution'),
			'add_new' => __('Add Store', 'ESSITCO_AMS_affiliate_solution'),
			'not_found' => __('No Stores found.'),
		),
		'menu_icon'		=> 'dashicons-store',
		'rewrite'		=> array('slug' => 'store'),
		'supports'		=> array('title', 'editor', 'thumbnail'),
		'taxonomies'    => array('store_category'),		
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
	);
	
	// offers
	$offer_args = array(
		'labels' => array(
			'name' => __( 'Offers', 'ESSITCO_AMS_affiliate_solution' ),
			'singular_name' => __( 'Offer', 'ESSITCO_AMS_affiliate_solution' ),
			'add_new_item'	=> __('Add New Offer','ESSITCO_AMS_affiliate_solution'),
			'add_new' => __('Add Offer', 'ESSITCO_AMS_affiliate_solution'),
			'not_found' => __('No Offers found.'),
		),
		'public'		=> true,
		'menu_icon'		=> 'dashicons-megaphone',
		'has_archive'	=> true,
		'rewrite'		=> array( 'slug' => 'offer' ),
		'supports'		=> array('title', 'editor', 'thumbnail'),
		'taxonomies'    => array('offer_category'),
	);
	register_post_type( 'store', $store_args ); //store
	register_post_type( 'offer', $offer_args ); //offers
	
	/* Store Category taxonomy */
	$labels = array(
		'name' => _x( 'Store Category', 'taxonomy general name' ),
		'singular_name' => _x( 'Store Category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Category' ),
		'popular_items' => __( 'Popular Category' ),
		'all_items' => __( 'All Category' ),
		'parent_item' => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item' => __( 'Edit Category' ),
		'update_item' => __( 'Update Category' ),
		'add_new_item' => __( 'Add New Category' ),
		'new_item_name' => __( 'New Category Name' ),
	);
	register_taxonomy('store_category',array('store'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'store_category' ),
	));
	
	/* offer Category taxonomy */
	$labels = array(
		'name' => _x( 'Offer Category', 'taxonomy general name' ),
		'singular_name' => _x( 'Store Category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Category' ),
		'popular_items' => __( 'Popular Category' ),
		'all_items' => __( 'All Category' ),
		'parent_item' => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item' => __( 'Edit Category' ),
		'update_item' => __( 'Update Category' ),
		'add_new_item' => __( 'Add New Category' ),
		'new_item_name' => __( 'New Category Name' ),
	);
	register_taxonomy('offer_category',array('offer'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'offer_category' ),
	));
	flush_rewrite_rules(true);
}
 
add_action( 'init', 'ESSITCO_AMS_store_init' );

/* store management*/
function ESSITCO_AMS_store_metaboxes_add() {
	global $wp_meta_boxes;
	add_meta_box('store-information', __('Store information','ESSITCO_AMS_affiliate_solution'), 'ESSITCO_AMS_store_metaboxes_html', 'store', 'normal', 'low');
	
	include('admin/store_fields.php');
}
add_action( 'add_meta_boxes_store', 'ESSITCO_AMS_store_metaboxes_add' );

function ESSITCO_AMS_store_save_post()
{
    if(empty($_POST)) return;
    global $post;
	if( current_user_can( 'administrator' ) ){	
		if ( ! wp_verify_nonce( $_POST["meta-box-nonce"], 'store-nonce' ) ){
			die ( 'Invalid nonce!');
		}
		update_post_meta($post->ID, "store_url", sanitize_text_field($_POST["store_url"]));
		update_post_meta($post->ID, "store_facebook", sanitize_text_field($_POST["store_facebook"]));
		update_post_meta($post->ID, "store_twitter", sanitize_text_field($_POST["store_twitter"]));
		update_post_meta($post->ID, "store_google", sanitize_text_field($_POST["store_google"]));
		update_post_meta($post->ID, "store_guidelines", sanitize_text_field($_POST["store_guidelines"]));
		update_post_meta($post->ID, "channel_name", sanitize_text_field($_POST["channel_name"]));
		update_post_meta($post->ID, "advertiser_id", sanitize_text_field($_POST["advertiser_id"]));
		update_post_meta($post->ID, "store_tracking_url", sanitize_text_field($_POST["store_tracking_url"]));
		update_post_meta($post->ID, "is_featured", sanitize_text_field($_POST["is_featured"]));
	}
}

add_action( 'save_post_store', 'ESSITCO_AMS_store_save_post' );
add_filter( 'manage_edit-store_columns', 'ESSITCO_AMS_set_Store_columns' );
add_action( 'manage_store_posts_custom_column' , 'ESSITCO_AMS_store_columns', 10, 2 );

function ESSITCO_AMS_set_Store_columns( $columns ) {

    $columns['store_logo']	= __('Store Logo','ESSITCO_AMS_affiliate_solution');
    $columns['channel_name']	= __('Channel','ESSITCO_AMS_affiliate_solution');
    // $columns['store_url']	= __('Store Url','ESSITCO_AMS_affiliate_solution');
    $columns['store_tracking_url']	= __('Tracking Url','ESSITCO_AMS_affiliate_solution');
    $columns['is_featured']	= __('Featured','ESSITCO_AMS_affiliate_solution');

    return $columns;
}

function ESSITCO_AMS_store_columns( $column, $post_id ) {
    switch ( $column ) {
        case 'store_logo' :
            echo ESSITCO_AMS_store_logo( $post_id );
            break;

        case 'channel_name' :
            echo ucwords(str_replace('_', ' ', get_post_meta( $post_id, 'channel_name', true)));
            break;

        case 'store_url' :
            echo get_post_meta( $post_id, 'store_url', true );
            break;
			
        case 'store_tracking_url' :
			$store_tracking_url = get_post_meta( $post_id, 'store_tracking_url', true );
            echo '<a href="'.$store_tracking_url.'" title="'.$store_tracking_url.'" target="_blank">Link</a>';
            break;
			
        case 'is_featured' :
			echo get_post_meta( $post_id, 'is_featured', true );
            break;
    }
}

add_filter( 'manage_edit-store_sortable_columns', 'set_ESSITCO_AMS_store_sortable_columns' );
function set_ESSITCO_AMS_store_sortable_columns($columns){
	$columns["is_featured"]='is_featured';
	return $columns;
}

function ESSITCO_AMS_store_logo( $store_id = '', $echo = true ) {
	if ( empty( $store_id ) ) {
		$store_id = get_the_ID();
	}
	if ( has_post_thumbnail( $store_id ) ) {
		if ( $echo ) {
			echo get_the_post_thumbnail( $store_id, 'shop_logo', array( 'class' => 'img-responsive img-style' ) );
		} else {
			return get_the_post_thumbnail( $store_id, 'shop_logo', array( 'class' => 'img-responsive img-style' ) );
		}
	}
}

/* offers management */
function ESSITCO_AMS_offer_metaboxes_add() {
	global $wp_meta_boxes;
	add_meta_box('offer-information', __('Offer information','ESSITCO_AMS_affiliate_solution'), 'ESSITCO_AMS_offer_metaboxes_html', 'offer', 'normal', 'low');
	
	include('admin/offer_fields.php');
}
add_action( 'add_meta_boxes_offer', 'ESSITCO_AMS_offer_metaboxes_add' );

function ESSITCO_AMS_offer_save_post()
{
    if(empty($_POST)) return;
    global $post;
	if( current_user_can( 'administrator' ) ){	
		if ( ! wp_verify_nonce( $_POST["offer-meta-box-nonce"], 'offer-nonce' ) ){
			die ( 'Invalid nonce!');
		}
		update_post_meta($post->ID, "store", sanitize_text_field($_POST["store"]));
		update_post_meta($post->ID, "offer_type", sanitize_text_field($_POST["offer_type"]));
		update_post_meta($post->ID, "coupon_type", sanitize_text_field($_POST["coupon_type"]));
		update_post_meta($post->ID, "coupon_code", sanitize_text_field($_POST["coupon_code"]));
		update_post_meta($post->ID, "coupon_sale_link", sanitize_text_field($_POST["coupon_sale_link"]));
		update_post_meta($post->ID, "coupon_affiliate_link", sanitize_text_field($_POST["coupon_affiliate_link"]));
		update_post_meta($post->ID, "coupon_store_link_with_code", sanitize_text_field($_POST["coupon_store_link_with_code"]));
		update_post_meta($post->ID, "offer_start_date", sanitize_text_field(strtotime($_POST["offer_start_date"])));
		update_post_meta($post->ID, "offer_expire_date", sanitize_text_field(strtotime($_POST["offer_expire_date"])));
		update_post_meta($post->ID, "is_featured", sanitize_text_field($_POST["is_featured"]));	
		update_post_meta($post->ID, "deal_affiliate_link", sanitize_text_field($_POST["deal_affiliate_link"]));
		update_post_meta($post->ID, "deal_store_list_price", sanitize_text_field($_POST["deal_store_list_price"]));
		update_post_meta($post->ID, "deal_store_sale_price", sanitize_text_field($_POST["deal_store_sale_price"]));
	}
}

add_action( 'save_post_offer', 'ESSITCO_AMS_offer_save_post' );
add_filter( 'manage_edit-offer_columns', 'ESSITCO_AMS_set_Offer_columns' );
add_action( 'manage_offer_posts_custom_column' , 'ESSITCO_AMS_offer_columns', 10, 2 );

function ESSITCO_AMS_set_Offer_columns( $columns ) {

    $columns['store']	= __('Store','ESSITCO_AMS_affiliate_solution');
    $columns['offer_type']	= __('Offer Type','ESSITCO_AMS_affiliate_solution');
    $columns['affiliate_link']	= __('Affiliate Link','ESSITCO_AMS_affiliate_solution');
    $columns['shortcode']	= __('Shortcode','ESSITCO_AMS_affiliate_solution');

    return $columns;
}

function ESSITCO_AMS_offer_columns( $column, $post_id ) {
    switch ( $column ) {
        case 'store' :
            echo get_the_title(get_post_meta( $post_id, 'store', true ));
            break;

        case 'offer_type' :
            echo get_post_meta( $post_id, 'offer_type', true );
            break;

        case 'affiliate_link' :
            $offer_type = get_post_meta( $post_id, 'offer_type', true );
            if($offer_type == 'deal'){
				$link = get_post_meta( $post_id, 'deal_affiliate_link', true );
			} else if($offer_type == 'coupon'){
				$coupon_type = get_post_meta( $post_id, 'coupon_type', true );
				if($coupon_type == 'code'){
					$link = get_post_meta( $post_id, 'coupon_store_link_with_code', true );
				} else if($coupon_type == 'sale'){
					$link = get_post_meta( $post_id, 'coupon_sale_link', true );
				} else {
					$link = get_post_meta( $post_id, 'coupon_affiliate_link', true );
				}				
			} else {
				$link = get_post_meta( $post_id, 'coupon_affiliate_link', true );
			}
			echo '<a href='.$link.'>Link</a>';
			break;
			
        case 'store_tracking_url' :
			$store_tracking_url = get_post_meta( $post_id, 'store_tracking_url', true );
            echo '<a href="'.$store_tracking_url.'" title="'.$store_tracking_url.'" target="_blank">Link</a>';
            break;
			
        case 'shortcode' :
			echo '<input type="text" onfocus="this.select();" readonly="readonly" value="[AMS-offer offer_id='.$post_id.']">';
            break;
    }
}

add_filter( 'manage_edit-offer_sortable_columns', 'set_ESSITCO_AMS_offer_sortable_columns' );
function set_ESSITCO_AMS_offer_sortable_columns($columns){
	$columns["is_featured"]='is_featured';
	return $columns;
}

add_filter( 'template_include', 'ESSITCO_AMS_store_template_function', 1 );

function ESSITCO_AMS_store_template_function( $template_path ) {
    if ( get_post_type() == 'store' ) {
        if ( is_single() ) {
            if ( $theme_file = locate_template( array ( 'single-store.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/templates/single-store.php';
            }
        }else{
            if ( $theme_file = locate_template( array ( 'archive-store.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/templates/archive-store.php';
            }
		}
    }
	
    if ( get_post_type() == 'offer' ) {
        if ( is_single() ) {
            if ( $theme_file = locate_template( array ( 'single.php' ) ) ) {
                $template_path = $theme_file;
            }
        }else{
            if ( $theme_file = locate_template( array ( 'archive-offer.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/templates/archive-offer.php';
            }
		}
    }
    return $template_path;
}

?>