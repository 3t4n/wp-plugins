<?php
/*
Plugin Name: Info List Slideshow
Plugin URL: http://beautiful-module.com/demo/info-list-slideshow/
Description: A simple Responsive Info List Slideshow
Version: 1.0
Author: Module Express
Author URI: http://beautiful-module.com
Contributors: Module Express
*/
/*
 * Register CPT ils_gallery.slider
 *
 */
if(!class_exists('Info_List_Slideshow')) {
	class Info_List_Slideshow {

		function __construct() {
		    if(!function_exists('add_shortcode')) {
		            return;
		    }
			add_action ( 'init' , array( $this , 'ils_responsive_gallery_setup_post_types' ));

			/* Include style and script */
			add_action ( 'wp_enqueue_scripts' , array( $this , 'ils_register_style_script' ));
			
			/* Register Taxonomy */
			add_action ( 'init' , array( $this , 'ils_responsive_gallery_taxonomies' ));
			add_action ( 'add_meta_boxes' , array( $this , 'ils_rsris_add_meta_box_gallery' ));
			add_action ( 'save_post' , array( $this , 'ils_rsris_save_meta_box_data_gallery' ));
			register_activation_hook( __FILE__, 'ils_responsive_gallery_rewrite_flush' );


			// Manage Category Shortcode Columns
			add_filter ( 'manage_responsive_ils_slider-category_custom_column' , array( $this , 'ils_responsive_gallery_category_columns' ), 10, 3);
			add_filter ( 'manage_edit-responsive_ils_slider-category_columns' , array( $this , 'ils_responsive_gallery_category_manage_columns' ));
			require_once( 'ils_gallery_admin_settings_center.php' );
		    add_shortcode ( 'ils_gallery.slider' , array( $this , 'ils_responsivegallery_shortcode' ));
		}


		function ils_responsive_gallery_setup_post_types() {

			$responsive_gallery_labels =  apply_filters( 'ils_gallery_slider_labels', array(
				'name'                => 'Info List Slideshow',
				'singular_name'       => 'Info List Slideshow',
				'add_new'             => __('Add New', 'ils_gallery_slider'),
				'add_new_item'        => __('Add New Image', 'ils_gallery_slider'),
				'edit_item'           => __('Edit Image', 'ils_gallery_slider'),
				'new_item'            => __('New Image', 'ils_gallery_slider'),
				'all_items'           => __('All Images', 'ils_gallery_slider'),
				'view_item'           => __('View Image', 'ils_gallery_slider'),
				'search_items'        => __('Search Image', 'ils_gallery_slider'),
				'not_found'           => __('No Image found', 'ils_gallery_slider'),
				'not_found_in_trash'  => __('No Image found in Trash', 'ils_gallery_slider'),
				'parent_item_colon'   => '',
				'menu_name'           => __('Info List Slideshow', 'ils_gallery_slider'),
				'exclude_from_search' => true
			) );


			$responsiveslider_args = array(
				'labels' 			=> $responsive_gallery_labels,
				'public' 			=> true,
				'publicly_queryable'		=> true,
				'show_ui' 			=> true,
				'show_in_menu' 		=> true,
				'query_var' 		=> true,
				'capability_type' 	=> 'post',
				'has_archive' 		=> true,
				'hierarchical' 		=> false,
				'menu_icon'   => 'dashicons-format-gallery',
				'supports' => array('title','editor','thumbnail')
				
			);
			register_post_type( 'ils_gallery_slider', apply_filters( 'sp_faq_post_type_args', $responsiveslider_args ) );

		}
		
		function ils_register_style_script() {
		    wp_enqueue_style( 'ils_responsiveimgslider',  plugin_dir_url( __FILE__ ). 'css/responsiveimgslider.css' );
			/*   REGISTER ALL CSS FOR SITE */
			wp_enqueue_style( 'ils_main',  plugin_dir_url( __FILE__ ). 'css/sangarSlider.css' );			
			wp_enqueue_style( 'ils_demo',  plugin_dir_url( __FILE__ ). 'css/info-list-slideshow.css' );
			wp_enqueue_style( 'ils_default',  plugin_dir_url( __FILE__ ). 'themes/default/default.css' );

			/*   REGISTER ALL JS FOR SITE */	
			wp_enqueue_script( 'ils_sangarBase', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarBaseClass.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_sangarSetup', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarSetupLayout.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_sangarSize', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarSizeAndScale.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_sangarShift', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarShift.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_sangarSetupBullet', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarSetupBulletNav.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_sangarSetupNavigation', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarSetupNavigation.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_sangarSetupSwipeTouch', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarSetupSwipeTouch.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_sangarSetupTimer', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarSetupTimer.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_sangarBeforeAfter', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarBeforeAfter.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_sangarLock', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarLock.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_sangarResponsiveClass', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarResponsiveClass.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_sangarResetSlider', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarResetSlider.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_sangarTextbox', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarTextbox.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_sangarVideo', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarVideo.js', array( 'jquery' ));
			
			wp_enqueue_script( 'ils_touchSwipe', plugin_dir_url( __FILE__ ) . 'js/touchSwipe.min.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_imagesloaded', plugin_dir_url( __FILE__ ) . 'js/imagesloaded.min.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_sangarSlider', plugin_dir_url( __FILE__ ) . 'js/sangarSlider.js', array( 'jquery' ));
			wp_enqueue_script( 'ils_velocity', plugin_dir_url( __FILE__ ) . 'js/velocity.min.js', array( 'jquery' ));
			
		}
		
		
		function ils_responsive_gallery_taxonomies() {
		    $labels = array(
		        'name'              => _x( 'Category', 'taxonomy general name' ),
		        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		        'search_items'      => __( 'Search Category' ),
		        'all_items'         => __( 'All Category' ),
		        'parent_item'       => __( 'Parent Category' ),
		        'parent_item_colon' => __( 'Parent Category:' ),
		        'edit_item'         => __( 'Edit Category' ),
		        'update_item'       => __( 'Update Category' ),
		        'add_new_item'      => __( 'Add New Category' ),
		        'new_item_name'     => __( 'New Category Name' ),
		        'menu_name'         => __( 'Gallery Category' ),
		    );

		    $args = array(
		        'hierarchical'      => true,
		        'labels'            => $labels,
		        'show_ui'           => true,
		        'show_admin_column' => true,
		        'query_var'         => true,
		        'rewrite'           => array( 'slug' => 'responsive_ils_slider-category' ),
		    );

		    register_taxonomy( 'responsive_ils_slider-category', array( 'ils_gallery_slider' ), $args );
		}

		function ils_responsive_gallery_rewrite_flush() {  
				ils_responsive_gallery_setup_post_types();
		    flush_rewrite_rules();
		}


		function ils_responsive_gallery_category_manage_columns($theme_columns) {
		    $new_columns = array(
		            'cb' => '<input type="checkbox" />',
		            'name' => __('Name'),
		            'gallery_ils_shortcode' => __( 'Gallery Category Shortcode', 'ils_slick_slider' ),
		            'slug' => __('Slug'),
		            'posts' => __('Posts')
					);

		    return $new_columns;
		}

		function ils_responsive_gallery_category_columns($out, $column_name, $theme_id) {
		    $theme = get_term($theme_id, 'responsive_ils_slider-category');

		    switch ($column_name) {      
		        case 'title':
		            echo get_the_title();
		        break;
		        case 'gallery_ils_shortcode':
					echo '[ils_gallery.slider cat_id="' . $theme_id. '"]';			  	  

		        break;
		        default:
		            break;
		    }
		    return $out;   

		}

		/* Custom meta box for slider link */
		function ils_rsris_add_meta_box_gallery() {
			add_meta_box('custom-metabox',__( 'LINK URL', 'link_textdomain' ),array( $this , 'ils_rsris_gallery_box_callback' ),'ils_gallery_slider');			
		}
		
		function ils_rsris_gallery_box_callback( $post ) {
			wp_nonce_field( 'ils_rsris_save_meta_box_data_gallery', 'rsris_meta_box_nonce' );
			$value = get_post_meta( $post->ID, 'rsris_ils_link', true );
			echo '<input type="url" id="rsris_ils_link" name="rsris_ils_link" value="' . esc_attr( $value ) . '" size="80" /><br />';
			echo 'ie http://www.google.com';
		}
		
		function ils_truncate($string, $length = 100, $append = "&hellip;")
		{
			$string = trim($string);
			if (strlen($string) > $length)
			{
				$string = wordwrap($string, $length);
				$string = explode("\n", $string, 2);
				$string = $string[0] . $append;
			}

			return $string;
		}
			
		function ils_rsris_save_meta_box_data_gallery( $post_id ) {
			if ( ! isset( $_POST['rsris_meta_box_nonce'] ) ) {
				return;
			}
			if ( ! wp_verify_nonce( $_POST['rsris_meta_box_nonce'], 'ils_rsris_save_meta_box_data_gallery' ) ) {
				return;
			}
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}
			if ( isset( $_POST['post_type'] ) && 'ils_gallery_slider' == $_POST['post_type'] ) {

				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
			} else {

				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
			}
			if ( ! isset( $_POST['rsris_ils_link'] ) ) {
				return;
			}
			$link_data = sanitize_text_field( $_POST['rsris_ils_link'] );
			update_post_meta( $post_id, 'rsris_ils_link', $link_data );
		}
		
		/*
		 * Add [ils_gallery.slider] shortcode
		 *
		 */
		function ils_responsivegallery_shortcode( $atts, $content = null ) {
			
			extract(shortcode_atts(array(
				"limit"  => '',
				"cat_id" => '',
				"autoplay" => ''
			), $atts));
			
			if( $limit ) { 
				$posts_per_page = $limit; 
			} else {
				$posts_per_page = '-1';
			}
			if( $cat_id ) { 
				$cat = $cat_id; 
			} else {
				$cat = '';
			}
			
			if( $autoplay ) { 
				$autoplay_slider = $autoplay; 
			} else {
				$autoplay_slider = 'true';
			}
						

			ob_start();
			// Create the Query
			$post_type 		= 'ils_gallery_slider';
			$orderby 		= 'post_date';
			$order 			= 'DESC';
						
			 $args = array ( 
		            'post_type'      => $post_type, 
		            'orderby'        => $orderby, 
		            'order'          => $order,
		            'posts_per_page' => $posts_per_page,  
		           
		            );
			if($cat != ""){
		            	$args['tax_query'] = array( array( 'taxonomy' => 'responsive_ils_slider-category', 'field' => 'id', 'terms' => $cat) );
		            }        
		      $query = new WP_Query($args);

			$post_count = $query->post_count;
			$i = 1;

			if( $post_count > 0) :
			
			$list_collection = array(); 
			?>
			<div class='ils_gallery_slider'>
				<?php			
					  while ($query->have_posts()) : $query->the_post();
							include('designs/template.php');
							$content = get_the_title();
							$content = strip_tags($content);
							$title = $this->ils_truncate($content, 20);
							$list_collection[$i-1] = '"'.$title.'"';
					  $i++;
					  endwhile;	

				  ?>
			</div>
			
			<?php
				endif;
				// Reset query to prevent conflicts
				wp_reset_query();
			?>							
			<script type="text/javascript">
				jQuery(document).ready(function($) {				
					var sangar = $('.ils_gallery_slider').sangarSlider({
						carousel : true, // carousel mode
						carouselWidth : 60, // width in percent
						timer :  <?php if($autoplay_slider == "false") { echo 'false';} else { echo 'true'; } ?>, // true or false to have the timer
						pagination : 'content-horizontal', // bullet, content, none
						paginationContent : [<?php echo implode(',',$list_collection)?>], // can be text, image, or something
						paginationContentType : 'text', // text, image
						paginationContentWidth : 220, // pagination content width in pixel
						width : 1000, // slideshow width
						height : 500, // slideshow height
						fullWidth : false, // slideshow width (and height) will scale to the container size
						maxHeight : 600, // slideshow max height, set to '0' (zero) to make it unlimited        
					});
				});

			</script>
			<?php
			return ob_get_clean();
		}		
	}
}
	
function ils_master_gallery_images_load() {
        global $mfpd;
        $mfpd = new Info_List_Slideshow();
}
add_action( 'plugins_loaded', 'ils_master_gallery_images_load' );
?>