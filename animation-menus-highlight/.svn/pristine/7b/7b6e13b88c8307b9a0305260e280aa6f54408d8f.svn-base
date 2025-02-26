<?php
/*
Plugin Name: Animation Menus Highlight
Plugin URL: http://beautiful-module.com/demo/animation-menus-highlight/
Description: A simple Responsive Animation Menus Highlight
Version: 1.0
Author: Module Express
Author URI: http://beautiful-module.com
Contributors: Module Express
*/
/*
 * Register CPT amh_gallery.slider
 *
 */
if(!class_exists('Animation_Menus_Highlight')) {
	class Animation_Menus_Highlight {

		function __construct() {
		    if(!function_exists('add_shortcode')) {
		            return;
		    }
			add_action ( 'init' , array( $this , 'amh_responsive_gallery_setup_post_types' ));

			/* Include style and script */
			add_action ( 'wp_enqueue_scripts' , array( $this , 'amh_register_style_script' ));
			
			/* Register Taxonomy */
			add_action ( 'init' , array( $this , 'amh_responsive_gallery_taxonomies' ));
			add_action ( 'add_meta_boxes' , array( $this , 'amh_rsris_add_meta_box_gallery' ));
			add_action ( 'save_post' , array( $this , 'amh_rsris_save_meta_box_data_gallery' ));
			register_activation_hook( __FILE__, 'amh_responsive_gallery_rewrite_flush' );


			// Manage Category Shortcode Columns
			add_filter ( 'manage_responsive_amh_slider-category_custom_column' , array( $this , 'amh_responsive_gallery_category_columns' ), 10, 3);
			add_filter ( 'manage_edit-responsive_amh_slider-category_columns' , array( $this , 'amh_responsive_gallery_category_manage_columns' ));
			require_once( 'amh_gallery_admin_settings_center.php' );
		    add_shortcode ( 'amh_gallery.slider' , array( $this , 'amh_responsivegallery_shortcode' ));
		}


		function amh_responsive_gallery_setup_post_types() {

			$responsive_gallery_labels =  apply_filters( 'amh_gallery_slider_labels', array(
				'name'                => 'Animation Menus Highlight',
				'singular_name'       => 'Animation Menus Highlight',
				'add_new'             => __('Add New', 'amh_gallery_slider'),
				'add_new_item'        => __('Add New Image', 'amh_gallery_slider'),
				'edit_item'           => __('Edit Image', 'amh_gallery_slider'),
				'new_item'            => __('New Image', 'amh_gallery_slider'),
				'all_items'           => __('All Images', 'amh_gallery_slider'),
				'view_item'           => __('View Image', 'amh_gallery_slider'),
				'search_items'        => __('Search Image', 'amh_gallery_slider'),
				'not_found'           => __('No Image found', 'amh_gallery_slider'),
				'not_found_in_trash'  => __('No Image found in Trash', 'amh_gallery_slider'),
				'parent_item_colon'   => '',
				'menu_name'           => __('Animation Menus Highlight', 'amh_gallery_slider'),
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
			register_post_type( 'amh_gallery_slider', apply_filters( 'sp_faq_post_type_args', $responsiveslider_args ) );

		}
		
		function amh_register_style_script() {
		    wp_enqueue_style( 'amh_responsiveimgslider',  plugin_dir_url( __FILE__ ). 'css/responsiveimgslider.css' );
			/*   REGISTER ALL CSS FOR SITE */
			wp_enqueue_style( 'amh_demo',  plugin_dir_url( __FILE__ ). 'css/animation-menus-highlight.css' );			
		}
		
		
		function amh_responsive_gallery_taxonomies() {
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
		        'rewrite'           => array( 'slug' => 'responsive_amh_slider-category' ),
		    );

		    register_taxonomy( 'responsive_amh_slider-category', array( 'amh_gallery_slider' ), $args );
		}

		function amh_responsive_gallery_rewrite_flush() {  
				amh_responsive_gallery_setup_post_types();
		    flush_rewrite_rules();
		}


		function amh_responsive_gallery_category_manage_columns($theme_columns) {
		    $new_columns = array(
		            'cb' => '<input type="checkbox" />',
		            'name' => __('Name'),
		            'gallery_amh_shortcode' => __( 'Gallery Category Shortcode', 'amh_slick_slider' ),
		            'slug' => __('Slug'),
		            'posts' => __('Posts')
					);

		    return $new_columns;
		}

		function amh_responsive_gallery_category_columns($out, $column_name, $theme_id) {
		    $theme = get_term($theme_id, 'responsive_amh_slider-category');

		    switch ($column_name) {      
		        case 'title':
		            echo get_the_title();
		        break;
		        case 'gallery_amh_shortcode':
					echo '[amh_gallery.slider cat_id="' . $theme_id. '"]';			  	  

		        break;
		        default:
		            break;
		    }
		    return $out;   

		}

		/* Custom meta box for slider link */
		function amh_rsris_add_meta_box_gallery() {
			add_meta_box('custom-metabox',__( 'LINK URL', 'link_textdomain' ),array( $this , 'amh_rsris_gallery_box_callback' ),'amh_gallery_slider');			
		}
		
		function amh_rsris_gallery_box_callback( $post ) {
			wp_nonce_field( 'amh_rsris_save_meta_box_data_gallery', 'rsris_meta_box_nonce' );
			$value = get_post_meta( $post->ID, 'rsris_amh_link', true );
			echo '<input type="url" id="rsris_amh_link" name="rsris_amh_link" value="' . esc_attr( $value ) . '" size="80" /><br />';
			echo 'ie http://www.google.com';
		}
		
		function amh_truncate($string, $length = 100, $append = "&hellip;")
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
			
		function amh_rsris_save_meta_box_data_gallery( $post_id ) {
			if ( ! isset( $_POST['rsris_meta_box_nonce'] ) ) {
				return;
			}
			if ( ! wp_verify_nonce( $_POST['rsris_meta_box_nonce'], 'amh_rsris_save_meta_box_data_gallery' ) ) {
				return;
			}
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}
			if ( isset( $_POST['post_type'] ) && 'amh_gallery_slider' == $_POST['post_type'] ) {

				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
			} else {

				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
			}
			if ( ! isset( $_POST['rsris_amh_link'] ) ) {
				return;
			}
			$link_data = sanitize_text_field( $_POST['rsris_amh_link'] );
			update_post_meta( $post_id, 'rsris_amh_link', $link_data );
		}
		
		/*
		 * Add [amh_gallery.slider] shortcode
		 *
		 */
		function amh_responsivegallery_shortcode( $atts, $content = null ) {
			
			extract(shortcode_atts(array(
				"limit"  => '',
				"cat_id" => ''
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
								

			ob_start();
			// Create the Query
			$post_type 		= 'amh_gallery_slider';
			$orderby 		= 'post_date';
			$order 			= 'DESC';
						
			 $args = array ( 
		            'post_type'      => $post_type, 
		            'orderby'        => $orderby, 
		            'order'          => $order,
		            'posts_per_page' => $posts_per_page,  
		           
		            );
			if($cat != ""){
		            	$args['tax_query'] = array( array( 'taxonomy' => 'responsive_amh_slider-category', 'field' => 'id', 'terms' => $cat) );
		            }        
		      $query = new WP_Query($args);

			$post_count = $query->post_count;
			$i = 1;

			if( $post_count > 0) :
			
			?>
			<div class="animation-menus-highlight">
			   <ul>
				  <?php			
					  while ($query->have_posts()) : $query->the_post();
							include('designs/template.php');
					  $i++;
					  endwhile;	

				  ?>
			   </ul>
			</div>
			<?php
				endif;
				// Reset query to prevent conflicts
				wp_reset_query();
			?>
			<?php
			return ob_get_clean();
		}		
	}
}
	
function amh_master_gallery_images_load() {
        global $mfpd;
        $mfpd = new Animation_Menus_Highlight();
}
add_action( 'plugins_loaded', 'amh_master_gallery_images_load' );
?>