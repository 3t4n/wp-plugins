<?php
/*
Plugin Name: Banner Display Thumbnail
Plugin URL: http://beautiful-module.com/demo/banner-display-thumbnail/
Description: A simple Responsive Banner Display Thumbnail
Version: 1.0
Author: Module Express
Author URI: http://beautiful-module.com
Contributors: Module Express
*/
/*
 * Register CPT bdt_gallery.slider
 *
 */
if(!class_exists('Banner_Display_Thumbnail')) {
	class Banner_Display_Thumbnail {

		function __construct() {
		    if(!function_exists('add_shortcode')) {
		            return;
		    }
			add_action ( 'init' , array( $this , 'bdt_responsive_gallery_setup_post_types' ));

			/* Include style and script */
			add_action ( 'wp_enqueue_scripts' , array( $this , 'bdt_register_style_script' ));
			
			/* Register Taxonomy */
			add_action ( 'init' , array( $this , 'bdt_responsive_gallery_taxonomies' ));
			add_action ( 'add_meta_boxes' , array( $this , 'bdt_rsris_add_meta_box_gallery' ));
			add_action ( 'save_post' , array( $this , 'bdt_rsris_save_meta_box_data_gallery' ));
			register_activation_hook( __FILE__, 'bdt_responsive_gallery_rewrite_flush' );


			// Manage Category Shortcode Columns
			add_filter ( 'manage_responsive_bdt_slider-category_custom_column' , array( $this , 'bdt_responsive_gallery_category_columns' ), 10, 3);
			add_filter ( 'manage_edit-responsive_bdt_slider-category_columns' , array( $this , 'bdt_responsive_gallery_category_manage_columns' ));
			require_once( 'bdt_gallery_admin_settings_center.php' );
		    add_shortcode ( 'bdt_gallery.slider' , array( $this , 'bdt_responsivegallery_shortcode' ));
		}


		function bdt_responsive_gallery_setup_post_types() {

			$responsive_gallery_labels =  apply_filters( 'bdt_gallery_slider_labels', array(
				'name'                => 'Banner Display Thumbnail',
				'singular_name'       => 'Banner Display Thumbnail',
				'add_new'             => __('Add New', 'bdt_gallery_slider'),
				'add_new_item'        => __('Add New Image', 'bdt_gallery_slider'),
				'edit_item'           => __('Edit Image', 'bdt_gallery_slider'),
				'new_item'            => __('New Image', 'bdt_gallery_slider'),
				'all_items'           => __('All Images', 'bdt_gallery_slider'),
				'view_item'           => __('View Image', 'bdt_gallery_slider'),
				'search_items'        => __('Search Image', 'bdt_gallery_slider'),
				'not_found'           => __('No Image found', 'bdt_gallery_slider'),
				'not_found_in_trash'  => __('No Image found in Trash', 'bdt_gallery_slider'),
				'parent_item_colon'   => '',
				'menu_name'           => __('Banner Display Thumbnail', 'bdt_gallery_slider'),
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
			register_post_type( 'bdt_gallery_slider', apply_filters( 'sp_faq_post_type_args', $responsiveslider_args ) );

		}
		
		function bdt_register_style_script() {
		    wp_enqueue_style( 'bdt_responsiveimgslider',  plugin_dir_url( __FILE__ ). 'css/responsiveimgslider.css' );
			/*   REGISTER ALL CSS FOR SITE */
			wp_enqueue_style( 'bdt_main',  plugin_dir_url( __FILE__ ). 'css/sangarSlider.css' );			
			wp_enqueue_style( 'bdt_demo',  plugin_dir_url( __FILE__ ). 'css/demo.css' );
			wp_enqueue_style( 'bdt_default',  plugin_dir_url( __FILE__ ). 'themes/default-big/default-big.css' );

			/*   REGISTER ALL JS FOR SITE */	
			wp_enqueue_script( 'bdt_sangarBase', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarBaseClass.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_sangarSetup', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarSetupLayout.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_sangarSize', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarSizeAndScale.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_sangarShift', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarShift.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_sangarSetupBullet', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarSetupBulletNav.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_sangarSetupNavigation', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarSetupNavigation.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_sangarSetupSwipeTouch', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarSetupSwipeTouch.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_sangarSetupTimer', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarSetupTimer.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_sangarBeforeAfter', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarBeforeAfter.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_sangarLock', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarLock.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_sangarResponsiveClass', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarResponsiveClass.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_sangarResetSlider', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarResetSlider.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_sangarTextbox', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarTextbox.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_sangarVideo', plugin_dir_url( __FILE__ ) . 'js/sangarSlider/sangarVideo.js', array( 'jquery' ));
			
			wp_enqueue_script( 'bdt_touchSwipe', plugin_dir_url( __FILE__ ) . 'js/touchSwipe.min.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_imagesloaded', plugin_dir_url( __FILE__ ) . 'js/imagesloaded.min.js', array( 'jquery' ));
			wp_enqueue_script( 'bdt_sangarSlider', plugin_dir_url( __FILE__ ) . 'js/sangarSlider.js', array( 'jquery' ));
		}
		
		
		function bdt_responsive_gallery_taxonomies() {
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
		        'rewrite'           => array( 'slug' => 'responsive_bdt_slider-category' ),
		    );

		    register_taxonomy( 'responsive_bdt_slider-category', array( 'bdt_gallery_slider' ), $args );
		}

		function bdt_responsive_gallery_rewrite_flush() {  
				bdt_responsive_gallery_setup_post_types();
		    flush_rewrite_rules();
		}


		function bdt_responsive_gallery_category_manage_columns($theme_columns) {
		    $new_columns = array(
		            'cb' => '<input type="checkbox" />',
		            'name' => __('Name'),
		            'gallery_bdt_shortcode' => __( 'Gallery Category Shortcode', 'bdt_slick_slider' ),
		            'slug' => __('Slug'),
		            'posts' => __('Posts')
					);

		    return $new_columns;
		}

		function bdt_responsive_gallery_category_columns($out, $column_name, $theme_id) {
		    $theme = get_term($theme_id, 'responsive_bdt_slider-category');

		    switch ($column_name) {      
		        case 'title':
		            echo get_the_title();
		        break;
		        case 'gallery_bdt_shortcode':
					echo '[bdt_gallery.slider cat_id="' . $theme_id. '"]';			  	  

		        break;
		        default:
		            break;
		    }
		    return $out;   

		}

		/* Custom meta box for slider link */
		function bdt_rsris_add_meta_box_gallery() {
			add_meta_box('custom-metabox',__( 'LINK URL', 'link_textdomain' ),array( $this , 'bdt_rsris_gallery_box_callback' ),'bdt_gallery_slider');			
		}
		
		function bdt_rsris_gallery_box_callback( $post ) {
			wp_nonce_field( 'bdt_rsris_save_meta_box_data_gallery', 'rsris_meta_box_nonce' );
			$value = get_post_meta( $post->ID, 'rsris_bdt_link', true );
			echo '<input type="url" id="rsris_bdt_link" name="rsris_bdt_link" value="' . esc_attr( $value ) . '" size="80" /><br />';
			echo 'ie http://www.google.com';
		}
		
		function bdt_truncate($string, $length = 100, $append = "&hellip;")
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
			
		function bdt_rsris_save_meta_box_data_gallery( $post_id ) {
			if ( ! isset( $_POST['rsris_meta_box_nonce'] ) ) {
				return;
			}
			if ( ! wp_verify_nonce( $_POST['rsris_meta_box_nonce'], 'bdt_rsris_save_meta_box_data_gallery' ) ) {
				return;
			}
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}
			if ( isset( $_POST['post_type'] ) && 'bdt_gallery_slider' == $_POST['post_type'] ) {

				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
			} else {

				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
			}
			if ( ! isset( $_POST['rsris_bdt_link'] ) ) {
				return;
			}
			$link_data = sanitize_text_field( $_POST['rsris_bdt_link'] );
			update_post_meta( $post_id, 'rsris_bdt_link', $link_data );
		}
		
		/*
		 * Add [bdt_gallery.slider] shortcode
		 *
		 */
		function bdt_responsivegallery_shortcode( $atts, $content = null ) {
			
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
			$post_type 		= 'bdt_gallery_slider';
			$orderby 		= 'post_date';
			$order 			= 'DESC';
						
			 $args = array ( 
		            'post_type'      => $post_type, 
		            'orderby'        => $orderby, 
		            'order'          => $order,
		            'posts_per_page' => $posts_per_page,  
		           
		            );
			if($cat != ""){
		            	$args['tax_query'] = array( array( 'taxonomy' => 'responsive_bdt_slider-category', 'field' => 'id', 'terms' => $cat) );
		            }        
		      $query = new WP_Query($args);

			$post_count = $query->post_count;
			$i = 1;

			if( $post_count > 0) :
			
			$list = array(); 

			?>
			
			<div class='bdt_gallery_slider'>
				<?php			
					  while ($query->have_posts()) : $query->the_post();
							include('designs/template.php');
							$thumb_url =wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), 'medium' ) );
							$list[$i-1] = '"'.$thumb_url.'"';
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
					var sangar = $('.bdt_gallery_slider').sangarSlider({
			        timer :  <?php if($autoplay_slider == "false") { echo 'false';} else { echo 'true'; } ?>, // true or false to have the timer
			        pagination : 'content-horizontal', // bullet, content, none
			        paginationContent : [<?php echo implode(',',$list)?>], // can be text, image, or something			        
			        paginationContentType : 'image', // text, image
			        paginationContentWidth : 120, // pagination content width in pixel
			        paginationImageHeight : 90, // pagination image height
			        width : 850, // slideshow width
        			height : 500, // slideshow height
			        themeClass : 'default-big',
			        fullWidth : false, // slider will scale to the container size
        			fullHeight : false, // slideshow height will resize to browser height
				});
				});

			</script>
			<?php
			return ob_get_clean();
		}		
	}
}
	
function bdt_master_gallery_images_load() {
        global $mfpd;
        $mfpd = new Banner_Display_Thumbnail();
}
add_action( 'plugins_loaded', 'bdt_master_gallery_images_load' );
?>