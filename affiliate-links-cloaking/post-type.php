<?php

if ( ! defined( 'ABSPATH' ) ) exit;

add_action('init', 'afflc_register_types');
function afflc_register_types(){
register_taxonomy('afflc_category', array('afflc_link'), array(
		'label'                 => esc_html__('Links', 'affiliate-links-cloaking'),
		'labels'                => array(
			'name'              => esc_html__('Link Categories', 'affiliate-links-cloaking'),
			'singular_name'     => esc_html__('Link Categories', 'affiliate-links-cloaking'),
			'search_items'      => esc_html__('Find link', 'affiliate-links-cloaking'),
			'all_items'         => esc_html__('All links', 'affiliate-links-cloaking'),
			'edit_item'         => esc_html__('Edit', 'affiliate-links-cloaking'),
			'update_item'       => esc_html__('Update', 'affiliate-links-cloaking'),
			'add_new_item'      => esc_html__('Add link category', 'affiliate-links-cloaking'),
			'new_item_name'     => esc_html__('Name', 'affiliate-links-cloaking'),
			'menu_name'         => esc_html__('Link Categories', 'affiliate-links-cloaking'),
		),
		'description'           => esc_html__('Link Categories', 'affiliate-links-cloaking'),
		'public'                => false,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_tagcloud'         => false,
		'hierarchical'          => true,
		'rewrite'               => array( 'hierarchical' => true ),
		'show_admin_column'     => true,
	) );

register_post_type('afflc_link', array(
		'label'  => 'Cloaked Link',
		'labels' => array(
			'name'               => esc_html__('Cloaked Links', 'affiliate-links-cloaking'),
			'singular_name'      => esc_html__('Cloaked Link', 'affiliate-links-cloaking'),
			'add_new'            => esc_html__('Add new link', 'affiliate-links-cloaking'),
			'add_new_item'       => esc_html__('Add new link', 'affiliate-links-cloaking'),
			'edit_item'          => esc_html__('Edit', 'affiliate-links-cloaking'),
			'new_item'           => esc_html__('Add new link', 'affiliate-links-cloaking'),
			'view_item'          => esc_html__('View', 'affiliate-links-cloaking'),
			'search_items'       => esc_html__('Find', 'affiliate-links-cloaking'),
			'not_found'          => esc_html__('Not found', 'affiliate-links-cloaking'),
			'not_found_in_trash' => esc_html__('Trash is empty', 'affiliate-links-cloaking'),
			'parent_item_colon'  => '',
			'menu_name'          => esc_html__('Cloaked Links', 'affiliate-links-cloaking'),
		),
		'description'         => __('Links', 'affiliate-links-cloaking'),
		'public'              => false,
		'publicly_queryable'  => false,
		'exclude_from_search' => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 11,
		'menu_icon'           => 'dashicons-admin-links', 
		'capability_type'   => 'post',
		'map_meta_cap'      => true,
		'hierarchical'        => true,
		'supports'            => array('title'),
		'taxonomies'          => array('afflc_category' /*, 'localcat'*/),
		'has_archive'         => true,
		'rewrite'             => array('slug' => 'post-link-button', 'with_front' => false),
		'query_var'           => true,
	) );
}

// CUSTOM fields
add_action( 'add_meta_boxes', 'afflc_meta_box', 1 );
function afflc_meta_box() {
	add_meta_box( 'extra_fields', esc_html__('Link Settings', 'affiliate-links-cloaking'), 'afflc_show_extrabox', 'afflc_link', 'normal', 'high' );
}
function afflc_show_extrabox( $post ) {
	?>

	<p>
		<?php echo esc_html__('Text on the button:', 'affiliate-links-cloaking');?>
		<label>
			<input type="text" name="afflc_extra[button_text]"
				   value="<?php echo esc_attr(get_post_meta( $post->ID, 'button_text', 1 )) ?>"
				   style="width:50%"/>
		</label>
	</p>
	<p>
		<?php echo esc_html__('Cloaked Link URL:', 'affiliate-links-cloaking');?>
		<label>
			<input type="text" name="afflc_extra[button_link]"
				   value="<?php echo esc_attr(get_post_meta( $post->ID, 'button_link', 1 )) ?>"
				   style="width:50%"/>
		</label>
	</p>	
	<p>
		<?php echo esc_html__('CSS Class:', 'affiliate-links-cloaking');?>
		<label>
			<input type="text" name="afflc_extra[css_class]"
				   value="<?php echo esc_attr(get_post_meta( $post->ID, 'css_class', 1 )) ?>"
				   style="width:50%"/>
		</label>
		<br />
	</p>

	<input type="hidden" name="extra_fields_nonce" value="<?php echo esc_attr(wp_create_nonce( 'extra_fields_nonce_id' )) ?>"/>
	<?php
	if(strlen(get_post_meta( $post->ID, 'button_text', 1 )) > 1) 
	     echo "<p>".esc_html__('For inserting button to the post, use the shortcode:', 'affiliate-links-cloaking'). " [AFFLCLink id=\"".intval($post->ID)."\"]</p>";
}

add_action( 'save_post', 'afflc_save_on_update', 0 );

function afflc_save_on_update( $post_id ) {
	
	if(
		empty( $_POST['afflc_extra'] ) || empty($_POST['extra_fields_nonce'])
		|| ! wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['extra_fields_nonce'])), 'extra_fields_nonce_id' )
		|| wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) || !current_user_can( 'edit_post_meta', $post_id )
	){
		return false;
	}

	$extra = wp_unslash($_POST['afflc_extra']);
	$extra = array_map( 'sanitize_text_field', $extra );

	foreach( $extra as $key => $value ){
		// delete the field if the value is empty
		if( ! $value ){
			delete_post_meta( $post_id, $key );
		}
		else {
			update_post_meta( $post_id, $key, $value ); // add_post_meta() work automaticly
		}
	}

	return $post_id;
}
