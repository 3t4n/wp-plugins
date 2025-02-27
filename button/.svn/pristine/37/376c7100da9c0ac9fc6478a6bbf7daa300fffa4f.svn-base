<?php 
// cpt
add_action( 'init', 'button_cpt' );
function button_cpt(){
	register_post_type( 'wd_button',
		array('labels' =>array(
			'name' => __('Button','button'),
			'add_new' => __('Add New Button', 'button'),
			'add_new_item' => __('Add New Button','button'),
			'edit_item' => __('Add New Button','button'),
			'new_item' => __('New Link','button'),
			'all_items' => __('All Buttons','button'),
			'view_item' => __('View Link','button'),
			'search_items' => __('Search Links','button'),
			'not_found' =>  __('No Links found','button'),
			'not_found_in_trash' => __('No Links found in Trash','button')),
		'supports' => array('title'),
		'hierarchical' => false,
		'show_in' => true,
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'show_in_menu' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' =>true,
		'menu_position' => 67,		
		'public' => true,
		'capability_type' => 'post',
		'menu_icon' => esc_url( BUTTON_URL.'assets/images/button-icon.png' )
	));
}

add_filter( 'manage_edit-wd_button_columns',  'wd_button_columns' ) ;
add_action( 'manage_wd_button_posts_custom_column', 'wd_button_manage_columns', 10, 2 );

function wd_button_columns($columns){
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title' ),
		'button_style' => __( 'Button Layouts' ),
		'shortcode' => __( 'Shortcode' ),
		'date' => __( 'Date' )
	);
	return $columns;
}


function wd_button_manage_columns( $columns,$post_id ){
	global $post;

	$custom_data = json_decode(get_post_meta(get_the_ID(),'button_custom_setting_'.$post_id, true));

	switch( $columns ) {
		case 'shortcode' :
		echo '<input type="text" value="', esc_attr(' [WD_Button  id='.$post_id.']' ), '" onclick="'. esc_js( 'jQuery(this).select()' ) . '" readonly="readonly" />';
		break;
		case 'button_style' :			
		if($custom_data->button_layout == "simple_button"){ 
			?><img src="<?php echo esc_url(BUTTON_URL.'assets/images/layouts/layout-1.png') ?>"> <?php
		}
		
		break;
		default :
		break;
	}
}

/**
 * Register meta box(es).
 */
function button_register_meta_boxes(){

	add_meta_box('button_layout',  __('Button Layouts', 'button'),'button_layout_callback',
		'wd_button','normal','low');

	add_meta_box('button_setting', __('Button Settings', 'button'),'button_setting_callback',
		'wd_button','normal','low');


	add_meta_box('button_shortcode', __('Shortcode', 'button'),'button_shortcode_callback',
		'wd_button','side','low');

	add_meta_box('button_phpcode', __('PHP Code', 'button-pro'),'button_phpcode_callback',
		'wd_button','side','low');

	add_meta_box('button_feedback', __('Feedback', 'button'), 'button_feedback_callback', 'wd_button', 'side', 'low');
}
add_action('add_meta_boxes','button_register_meta_boxes');

/**
 * Meta box button layout callback.
 *
 * @param WP_Post $post Current post object.
 */
function button_layout_callback($post){ 
	require_once( BUTTON_PATH.'/inc/cpt/button-layouts.php' );
}

/**
 * Meta box button setting callback.
 *
 * @param WP_Post $post Current post object.
 */
function button_setting_callback($post){ 
	require_once( BUTTON_PATH.'/inc/cpt/button-setting.php' );		
}	

/**
 * Meta box button shortcode callback.
 *
 * @param WP_Post $post Current post object.
 */
function button_shortcode_callback($post){	?>	
	<div class="shortcode_meta_box">
		<input type="text" value="<?php echo esc_attr("[WD_Button id=".get_the_ID()."]"); ?>" onclick="<?php echo esc_js( 'jQuery(this).select()' ); ?>" readonly/>	
	</div>
<?php } ?>
<?php 
/**
 * Meta box button php code callback.
 *
 * @param WP_Post $post Current post object.
 */
function button_phpcode_callback( $post ){ ?>
	<p><?php esc_html_e('Copy the below code & paste it in HTML Tag where you want to display the button.', 'button') ?></p>
	<input type="text" value="<?php echo esc_html("<?php echo do_shortcode('[WD_Button id=".get_the_ID()."'); ?>"); ?>" onclick="<?php echo esc_js( 'jQuery(this).select()' ); ?>" readonly/>
<?php } ?>
<?php
/**
* Meta box button rating callback.
*
* @param WP_Post $post Current post object.
*/

function button_feedback_callback(){ ?>	
	<h3><?php esc_html_e('Rate Us', 'button') ?></h3>
	<h6><?php esc_html_e('If you like button plugin then please give us your feedback on wordpress.', 'button') ?></h6>
	<p>
		<a class="wpsm-rate-us" style=" text-decoration: none; height: 40px; width: 40px;" href="<?php echo esc_url('https://wordpress.org/plugins/button/'); ?>
		" target="_blank">
		<span class="dashicons dashicons-star-filled"></span>
		<span class="dashicons dashicons-star-filled"></span>
		<span class="dashicons dashicons-star-filled"></span>
		<span class="dashicons dashicons-star-filled"></span>
		<span class="dashicons dashicons-star-filled"></span>
	</a>
</p>
<p><a href="<?php echo esc_url('https://wordpress.org/plugins/button/'); ?>" target="_blank" class="button button-primary button-hero "><?php esc_html_e('RATE HERE', 'button') ?></a></p>	

<?php } ?>
<?php 
// admin header
add_action('in_admin_header','button_admin_header');
function button_admin_header(){
	if(get_post_type()=="wd_button") {
		?>
		<style type="text/css">
			.wdbutton_ac_h_i{
				background:url('<?php echo esc_url( BUTTON_URL.'assets/images/admin-header.jpg' ); ?>') 50% 0 repeat fixed;
				}

			</style>
			<div class="wdbutton_ac_h_i ">
				<div class="wdbutton_container">
					<a href="<?php echo esc_url('http://webdzier.com/plugins/button-pro/');?>" target="_blank">
						<a class="wdbutton-rate-us" style=" text-decoration: none; height: 40px; width: 40px;" href="<?php echo esc_url('https://wordpress.org/plugins/button/'); ?>" target="_blank">
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
						</a>
						<div class="link_wdbutton">
							<a href="<?php echo esc_url('https://webdzier.com/demo/plugins/wd-button-pro/'); ?>" class="view_demo_btn"><?php esc_html_e( 'View Demo','button' ) ?></a>
							<a href="<?php echo esc_url('https://webdzier.com/amember/signup/button-pro'); ?>" class="buynow_btn"><?php esc_html_e( '$15 Buy Now','button' ) ?></a>					
							<a href="<?php echo esc_url('https://wordpress.org/support/plugin/button/'); ?>" class="get_support_btn"><?php esc_html_e( 'Get Support','button' ) ?></a>
						</div>

					</a>
				</div>
			</div>
			<?php
		}
	}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
add_action('save_post','button_save_meta_box');	
function button_save_meta_box( $post ){
	if(isset($_POST['_mywpnonce']) && wp_verify_nonce($_POST['_mywpnonce'],'button-setting-nonce')){

		if(isset($post) && isset($_POST['button_layout'])){
			$data =array();
			$key_array = array('button_layout', 'button_text', 'button_link','selector' ,'attribute_id', 'attribute_value', 'button_target', 'padding_top', 'padding_right', 'padding_bottom', 'padding_left', 'button_width', 'button_height', 'button_text_color', 'button_text_hover_color', 'font_family', 'font_size', 'text_bold', 'text_italic', 'text_align', 'button_circle', 'border_top_left', 'border_top_right', 'border_bottom_left', 'border_bottom_right', 'border_style', 'border_width', 'border_color', 'border_hover_color', 'border_shadow_color', 'border_shadow_hover_color', 'border_shadow_offset_left', 'border_shadow_offset_top', 'border_shadow_blur', 'button_bg_color_start', 'button_bg_color_end', 'button_bg_hover_color_start', 'button_bg_hover_color_end', 'opacity_start', 'opacity_end', 'hover_opacity_start', 'hover_opacity_end', 'gradient_stop', 'container_use', 'container_center', 'container_width', 'button_align', 'margin_top', 'margin_right', 'margin_bottom', 'margin_left', 'shadow_offset_left', 'shadow_offset_top', 'shadow_blur', 'shadow_color', 'shadow_hover_color', 'custom_css');

			foreach ($key_array as $value){
				if(isset($_POST[$value])){
					if($value == "button_text"){
						$_POST[$value] = sanitize_text_field(stripslashes($_POST[$value]));
					}
					$data[$value] = sanitize_text_field( $_POST[$value] );
				}
			}			
			//$data = serialize($data);
			$data = json_encode($data);
			update_post_meta($post,'button_custom_setting_'.$post, $data);
		}
	}
}