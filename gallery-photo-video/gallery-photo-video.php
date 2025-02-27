<?php 
/*
* Plugin Name: Gallery Photo Video
* Version: 2.8
* Description: Gallery Photo Video is an advanced responsive plugin with highly customizable features. You can use this plugin multiple times in posts and pages.
* Author: @webdzier
* Author URI: http://webdzier.com/
* Plugin URI: http://webdzier.com/plugins/gallery-photo-video-pro/
* Text Domain: gallery-photo-video
* Domain Path: /languages
* License :GPL2 or later
*/
define("GPV_URL", plugin_dir_url(__FILE__));
define("GPV_TEXTDOMAIN", 'gallery-photo-video');
define('GPV_PATH',plugin_dir_path(__FILE__));
define('documentation_link', 'http://webdzier.com/gallery-photo-video-pro-documentation/');
define('live_demo_link', 'https://webdzier.com/demo/plugins/gallery-photo-video-pro/');
define('pro_version_link', 'https://webdzier.com/plugins/gallery-photo-video-pro/');
define('video_get_url', 'https://vimeo.com');

add_image_size('gpv_img_300',300, 300, array( 'top', 'center' ));
add_image_size( 'gpv_img_500', 550, 550, array( 'top', 'center' ));

class GPV_classs{
	function __construct() {
		global $post_type;		
		register_activation_hook(__FILE__, array(&$this,'GPV_default_setting'));
		register_deactivation_hook(__FILE__, array(&$this,'GPV_deactivation_setting'));

		add_action('wp_enqueue_scripts', array(&$this,'GPV_frant_scripts'));
		add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array(&$this,'GPV_add_settings_link'), 10, 2 );
		if(is_admin()){			
			add_action('admin_enqueue_scripts', array(&$this,'GPV_admin_scripts'));
			add_action( 'init', array(&$this,'GPV_cpt'));

			add_action('media_buttons_context', array(&$this,'GPV_custom_button'),17);
			add_action('admin_footer', array(&$this,'GPV_popup_content'));
			add_action('add_meta_boxes',array(&$this, 'GPV_meta_box_function'));

			add_action('wp_ajax_GPV_get_thumbnail', array(&$this,'GPV_GET_THUMBNAIL'));
			add_action('save_post',array(&$this,'GPV_save_image_record'));		
			
			add_action('save_post',array(&$this,'GPV_custom_setting'));			
		}
	}
	
	public function GPV_add_settings_link( $links) {
		$arr = '<a href="'. esc_url( get_admin_url(null, 'post-new.php?post_type=gpv_gallery') ) .'">Settings</a>';
		array_unshift( $links, $arr);
		return $links;
	}
	public function GPV_default_setting(){
		$setting_array=serialize(array(
			'GPV_setting_title'=>'Yes',
			'gpv_template'=>'gallery1',
			'GPV_setting_title_position'=>'left',
			'GPV_setting_title_color'=>'#3d3d3d',
			'GPV_setting_label'=>'Yes',
			'GPV_setting_label_position'=>'left',
			'GPV_setting_description'=>'Yes',
			'GPV_setting_link_open'=>'Yes',
			'GPV_setting_icon_open'=>'No',	
			'GPV_setting_close_icon_color'=>'Yes',		
			'GPV_setting_image_layout'=>'rec',
			'GPV_setting_img_border_show'=>'no',
			'GPV_setting_img_border_size'=>'2',
			'GPV_setting_img_border_color'=>'#444444',
			'GPV_setting_open_img_background_color'=>'#e5e5e5',			
			'GPV_setting_container_background_color'=>'#edf1f2',
			'GPV_setting_button_background_color'=>'#cdcdcd',
			'GPV_setting_button_position'=>'left',
			'GPV_setting_button_text_color'=>'#333333',
			'GPV_setting_button_border_color'=>'#333333',
			'GPV_setting_container_open_color'=>'#000000',
			'GPV_setting_hover_effect_show'=>'Yes',
			'GPV_setting_hover_effect'=>'bottom-to-top',			
			'GPV_setting_description_char'=>'400',
			'GPV_setting_description_text_color'=>'#3f3f3f',
			'GPV_setting_column_layout'=>'3',
			'GPV_setting_font_style'=>'Arial',
			'GPV_setting_lightbox'=>'Swipe_Box',			
			'GPV_setting_Custom_CSS'=>'',
		));
		add_option("GPV_Default_Setting",$setting_array);

	}	
	public function GPV_deactivation_setting(){
		delete_option('GPV_Default_Setting');
	}

	public function GPV_admin_scripts(){
		global $typenow; 					
		if ($typenow=='gpv_gallery'){
			wp_enqueue_script( 'jquery');
			wp_enqueue_media();	
			wp_enqueue_script('media-upload');	
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'picker_script', GPV_URL.'js/color_picker.js', array( 'wp-color-picker' ), false, true );
			wp_enqueue_style('GPV-main-style',GPV_URL.'css/style.css');
			wp_enqueue_script( 'GPV-uplod-image',GPV_URL.'js/upload-image.js');
			wp_enqueue_script( 'GPV-script',GPV_URL.'js/script.js');
		}
	}

	public function GPV_frant_scripts(){
		$pluginurl = array('home'  => GPV_URL);
		global $post;
		if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'GPV') ) {
			wp_enqueue_script( 'jquery');
			wp_enqueue_style('bootstrap-style',GPV_URL.'css/bootstrap.css');
			wp_enqueue_style('front-style',GPV_URL.'css/front-style.css');
			wp_enqueue_style('front-hover-style',GPV_URL.'css/hover-style.css');

			/**grid folio**/		
			wp_enqueue_style('grid-folio-style',GPV_URL.'js/folio/GPV_grid.css');
			wp_enqueue_script('grid-folio-script',GPV_URL.'js/folio/GPV_grid.js', array(), false, true );
			/**grid folio**/

			/**swipe box**/
			wp_enqueue_style('swipe-style',GPV_URL.'lightbox/swipebox/swipebox.css');
			wp_enqueue_script('swipe-script',GPV_URL.'lightbox/swipebox/jquery.swipebox.js', array(), false, true );
			/**swipe box end**/
		}

	}

	public function GPV_meta_box_function(){

		add_meta_box('rate_us_meta_box', esc_html__( 'We need your reviews in order to improve our services', 'gallery-photo-video'),array(&$this, 'rate_us_meta_box'),
			'gpv_gallery','side','low');

		add_meta_box('shortcode_meta_box', esc_html__('Gallery Photo Video shortcode paste post/page','gallery-photo-video'),array(&$this, 'gpv_shortcode_meta_box'),
			'gpv_gallery','side','low');	

		add_meta_box('addimage_meta_box', esc_html__('Add images/Videos', 'gallery-photo-video'),array(&$this, 'Addimage_meta_box'),
			'gpv_gallery','normal','low');

		add_meta_box('GVP_setting_meta_box', esc_html__('Gallery Photo Video Setting','gallery-photo-video'),array(&$this, 'GVP_setting_meta_box'),
			'gpv_gallery','normal','low');
	}

	public function gpv_shortcode_meta_box() 
	{ 
		?>	
		<input onClick="this.select();" type="text" style="background: #23282d; color:#FFF;" value="<?php echo "[GPV id=".get_the_ID()."]"; ?>" readonly/>
		<?php 
	}
	public function rate_us_meta_box(){

		?>
		<img src="<?php echo GPV_URL; ?>images/rate-us.png" alt="<?php echo _e('Rateus','gallery-photo-video') ?>">
		<div class="gpv-rate-us-div">
			<?php printf( __('<a href="%s" class="gpv-rate-us-button button button-primary button-large" target="_blank">RATE US</a>',
			GPV_TEXTDOMAIN),'https://wordpress.org/support/view/plugin-reviews/gallery-photo-video'); ?>		
		</div>
		<?php
	}
	public function Addimage_meta_box($post){
		require_once(GPV_PATH.'include/GPV-addimages.php');
	}

	public function GPV_THUMBNAIL($post){
		require_once(GPV_PATH.'include/get-thumbnil.php');
	}

	public function GPV_GET_THUMBNAIL()
	{
		echo $this->GPV_THUMBNAIL($_POST['IMAGEARRAY']);
		die();
	}

	public function GPV_save_image_record($post)
	{
		if(isset($post) && isset($_POST['GPVaction'])){
			
			$img_url = $_POST['GPV_img_url'];

			if(isset($img_url)){

				$TOTAL_coun_image=count($_POST['GPV_img_url']);			
				if($TOTAL_coun_image){
					for($i=0; $i < $TOTAL_coun_image; $i++){
						$unique_id =$_POST['GPV_li_id'][$i];
						$GPV_image_array[]=array(
							'GPV_li_id'=>sanitize_text_field($_POST['GPV_li_id'][$i]),
							'GPV_image_title'=>sanitize_text_field($_POST['GPV_image_title'][$i]),
							'GPV_select'=>sanitize_text_field($_POST['GPV_select'][$i]),
							'GPV_video_url'=>sanitize_text_field($_POST['GPV_video_url'][$i]),
							'GPV_video_iframe'=>sanitize_text_field($_POST['GPV_video_iframe'][$i]),
							'GPV_link'=>sanitize_text_field($_POST['GPV_link'][$i]),
							'GPV_button_text'=>sanitize_text_field($_POST['GPV_button_text'][$i]),					
							'GPV_description'=>sanitize_text_field(stripcslashes($_POST['GPV_description'][$i])),
							'GPV_img_url'=>esc_url_raw($_POST['GPV_img_url'][$i]),
							'gpv_img_300'=>esc_url_raw($_POST['gpv_img_300'][$i]),
							'gpv_img_500'=>esc_url_raw($_POST['gpv_img_500'][$i]),						
						);
						update_post_meta($post, 'GPV_photos_details', base64_encode(serialize($GPV_image_array)));
						update_post_meta($post, 'GPV_images_count', $TOTAL_coun_image);
					}
				}else{

					$TOTAL_coun_image=0;
					$GPV_image_array[]=array();
					update_post_meta($post, 'GPV_photos_details', base64_encode(serialize($GPV_image_array)));
					update_post_meta($post, 'GPV_images_count', $TOTAL_coun_image);
				}
			}

			
		}
	}

	public function GVP_setting_meta_box($post){
		require_once(GPV_PATH.'include/GPV-setting.php');
	}

	public function GPV_cpt(){
		register_post_type( 'gpv_gallery',
			array(
				'labels' => array(
					'name' => __('GPV Gallery',GPV_TEXTDOMAIN),
					'add_new' => __('Add New Gallery', GPV_TEXTDOMAIN),
					'add_new_item' => __('Add New Gallery',GPV_TEXTDOMAIN),
					'edit_item' => __('Add New Gallery',GPV_TEXTDOMAIN),
					'new_item' => __('New Link',GPV_TEXTDOMAIN),
					'all_items' => __('All Galleres',GPV_TEXTDOMAIN),
					'view_item' => __('View Link',GPV_TEXTDOMAIN),
					'search_items' => __('Search Links',GPV_TEXTDOMAIN),
					'not_found' =>  __('No Links found',GPV_TEXTDOMAIN),
					'not_found_in_trash' => __('No Links found in Trash',GPV_TEXTDOMAIN), 
				),
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
				'menu_icon' =>GPV_URL.'images/GPVbutton.png',
			)
		);
		add_filter( 'manage_edit-gpv_gallery_columns', array(&$this, 'gpv_gallery_columns' )) ;
		add_action( 'manage_gpv_gallery_posts_custom_column', array(&$this, 'gpv_gallery_manage_columns' ), 10, 2 );
	}

	public function gpv_gallery_columns( $columns ){
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Gallery' ),
			'shortcode' => __( 'Shortcode' ),
			'date' => __( 'Date' )
		);
		return $columns;
	}

	public function gpv_gallery_manage_columns($column, $post_id ){
		global $post;
		switch( $column ) {
			case 'shortcode' :
			echo '<input onClick="this.select();" style="background: #23282d; color:#FFF;" type="text" value="[GPV id='.$post_id.']" readonly="readonly" />';
			break;
			default :
			break;
		}
	}

	public function GPV_custom_button($context){		
		$context .= '<a class="button thickbox"  title="'."Select GPV Title to insert into post".'"  
		href="#TB_inline?width=400&inlineId=GPV_div">
		<span class="wp-media-buttons-icon" style="background: url('.GPV_URL.'/images/GPVbutton.png); background-repeat: no-repeat; background-position: left bottom;"></span>
		GPV Shortcode</a>';
		return $context;
	}

	public function GPV_popup_content(){
		?>
		<div id="GPV_div" style="display:none;">
			<h2 align="center"><?php _e( 'Gallery Photo Video Shortcode', GPV_TEXTDOMAIN ); ?></h2>
			<?php 
			$All_posts = wp_count_posts('gpv_gallery')->publish;
			$ARGSM= array('post_type'=>'gpv_gallery','posts_per_page'=>$All_posts);			
			$GPV_short=new wp_Query($ARGSM);
			if($GPV_short->have_posts()){?>
				<label><?php _e('Gallery Title :',GPV_TEXTDOMAIN); ?></label><br>
				<select id="select_box_GPV" style="margin:15px 0;">
					<?php 
					while($GPV_short->have_posts()):$GPV_short->the_post();
						?>
						<option value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>
						<?php
					endwhile;
					?>
				</select><br>
				<button class="button-primary GPV_shortcode_btn_print"><?php _e('Print Shortcode',GPV_TEXTDOMAIN); ?></button>
			<?php }else{
				?>
				<h2 align="center"><?php printf(__('<a href="%s" style="color:orange;" title="Create new Gallery">Before Create Gallery</a>',GPV_TEXTDOMAIN),admin_url('post-new.php?post_type=gpv_gallery')); ?></h2>
				<?php
			}
			?>			
		</div>
		<script type="text/javascript">
			jQuery(function(){
				jQuery(".GPV_shortcode_btn_print").click(function(){
					var id_GPV=jQuery("#select_box_GPV option:selected").val();
					window.send_to_editor('<p>[GPV id='+id_GPV+']</p>');
					tb_remove();
				}); 				
			});
		</script>

		<?php
	}	
	public function GPV_custom_setting($post)
	{
		if(isset($post) && isset($_POST['GPVaction']))
		{
			$setting_array =array();
			$key_array=array('GPV_setting_action','gpv_template','GPV_setting_open_img_background_color','GPV_setting_title','GPV_setting_title_position','GPV_setting_title_color','GPV_setting_label','GPV_setting_label_position','GPV_setting_description','GPV_setting_link_open','GPV_setting_icon_open','GPV_setting_close_icon_color','GPV_setting_image_layout','GPV_setting_img_border_show','GPV_setting_img_border_size','GPV_setting_img_border_color','GPV_setting_container_background_color','GPV_setting_button_position','GPV_setting_button_background_color','GPV_setting_button_text_color','GPV_setting_button_border_color','GPV_setting_container_open_color','GPV_setting_hover_effect','GPV_setting_hover_effect_show','GPV_setting_description_char','GPV_setting_description_text_color','GPV_setting_column_layout','GPV_setting_font_style','GPV_setting_lightbox','GPV_setting_Custom_CSS');
			foreach ($key_array as $value) 
			{
				$setting_array[$value] =sanitize_text_field($_POST[$value]);
			}
			$setting_array = serialize($setting_array);			
			update_post_meta($post,'GPV_custom_setting_'.$post,$setting_array);
		}
	}
}
new GPV_classs();


function GPV_add_to_submenu() {
	if (is_admin()) {

		$productpage=add_submenu_page('edit.php?post_type=gpv_gallery', 'wdproduct', 'Our Products', 10, 'ourproduct-list', 'GPV_ourproduct_page' );
		add_action('admin_print_styles-'.$productpage, 'GPV_admin_bootstrap');
	}
}
add_action('admin_menu', 'GPV_add_to_submenu');

function GPV_ourproduct_page(){
	require_once( GPV_PATH . '/include/our_product.php' );
}

function GPV_admin_bootstrap(){
	wp_enqueue_style('bootstrap_admin',get_template_directory_uri() . '/css/bootstrap.css');
}

require_once(GPV_PATH.'include/shortcode.php');
?>